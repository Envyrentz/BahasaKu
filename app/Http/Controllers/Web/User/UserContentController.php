<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\UserAssesment;
use App\Models\UserContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserContentController extends Controller
{
    public function index()
    {
        $datas = Content::whereHas('user_contents', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->get();

        return view('user.content.content-index', compact('datas'));
    }

    public function add(Request $request)
    {
        try {
            $content = Content::where('code', $request->code)->get();

            if(count($content) > 0) {
                $store = UserContent::create([
                    'user_id' => auth()->user()->id,
                    'content_id' => $content[0]->id,
                ]);

                return redirect()->back()->with('success', 'Berhasil menambahkan materi');
            } else {
                return redirect()->back()->with('failed', 'Materi tidak ditemukan');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error:' . $th->getMessage());
        }
    }

    public function show($id)
    {
        $data = Content::whereHas('user_contents', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->find($id);

        if($data == null) {
            abort(404);
        }

        $assesment_work = UserAssesment::where('user_id', auth()->user()->id)->where('content_id', $id)->get();
        $user_assesments = $assesment_work;
        if(count($assesment_work) > 0) {
            $assesment_work = true;
        } else {
            $assesment_work = false;
        }

        return view('user.content.content-show', compact('data', 'assesment_work', 'user_assesments'));
    }

    public function assesment($id)
    {
        $data = Content::whereHas('user_contents', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->find($id);

        if($data == null) {
            abort(404);
        }

        $assesmentFile = Storage::disk('public')->get('materi/assesment/'.$data['question_file_path']);
        $datas = json_decode($assesmentFile);
        $total = count((array)$datas->soal);

        return view('user.content.content-assesment', compact('id', 'datas', 'total'));
    }

    public function submit($id, Request $request)
    {
        DB::beginTransaction();
        try {
            $data = Content::whereHas('user_contents', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })->find($id);

            if($data == null) {
                abort(404);
            }
            
            $assesmentFile = Storage::disk('public')->get('materi/assesment/'.$data['question_file_path']);
            $datas = json_decode($assesmentFile);
            $total = count((array)$datas->soal);
            $trueAnswer = 0;

            
            for ($i=1; $i <= $total; $i++) { 
                if((string)$request['answer'.$i] == (string)$datas->soal->{$i}->key) {
                    $trueAnswer = $trueAnswer + 1;
                }
            }

            $scoreMax = $datas->score;
            $bobot = (int)$scoreMax / (int)$total;
            $score = (int)$trueAnswer * (int)$bobot;


            $query = UserAssesment::create([
                'user_id' => auth()->user()->id,
                'content_id' => $id,
                'score' => $score,
                'date_time' => now(),
            ]);

            DB::commit();
            return redirect(route('materi.user.show', $id))->with('success', 'Berhasil mengerjakan kuis');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect(route('materi.user.show', $id))->withErrors('Terjadi kesalahan sistem' . $th->getMessage());
        }
    }
}

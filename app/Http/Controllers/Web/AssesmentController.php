<?php

namespace App\Http\Controllers\Web;

use App\Exports\UserAssesmentExport;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UserAssesment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AssesmentController extends Controller
{
    public function create($content_id)
    {
        return view('content.assesment.assesment-create', compact('content_id'));
    }

    public function store($content_id, Request $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'one_time_work' => 'required',
                'score' => 'required',
                'time' => 'required',
                'soal1' => 'required',
                'A1' => 'required',
                'B1' => 'required',
                'C1' => 'required',
                'D1' => 'required',
                'key1' => 'required',
            ]);

            $content = Content::find($content_id);
            $datas = $request->all();

            $assesmentTotal = (count($datas) - 4);
            $assesmentTotal = $assesmentTotal / 6;

            $soal = [];
            for ($i=1; $i <= $assesmentTotal; $i++) { 
                $soal[$i] = [
                    'soal' => $datas['soal'.$i],
                    'A' => $datas['A'.$i],
                    'B' => $datas['B'.$i],
                    'C' => $datas['C'.$i],
                    'D' => $datas['D'.$i],
                    'key' => $datas['key'.$i]
                ];
            }

            $jsonSchema = [
                'content' => $content->title,
                'total_assesment' => $assesmentTotal,
                'one_time_work' => $request->one_time_work,
                'score' => $request->score,
                'time' => $request->time,
                'soal' => $soal,
            ];

            $file_name = Str::random(10) . '.json';
            $dir = 'materi/assesment/' . $file_name;
            
            $storeFile = Storage::disk('public')->put($dir, json_encode($jsonSchema));

            $content->update([
                'one_time_work' => $datas['one_time_work'],
                'time_limit' => $datas['time'],
                'score' => $datas['score'],
                'question_file_path' => $file_name,
            ]);

            DB::commit();
            return redirect(route('materi.show', $content_id))->with('success', 'Berhasil menambahkan data');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function edit($content_id)
    {
        try {
            $data = Content::find($content_id);
            $assesmentFile = Storage::disk('public')->get('materi/assesment/'.$data['question_file_path']);
            $assesments = json_decode($assesmentFile);
            $assesmentTotal = count((array)$assesments->soal);

            return view('content.assesment.assesment-edit', compact('content_id', 'assesments', 'assesmentTotal'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function update($content_id, Request $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'one_time_work' => 'required',
                'score' => 'required',
                'time' => 'required',
                'soal1' => 'required',
                'A1' => 'required',
                'B1' => 'required',
                'C1' => 'required',
                'D1' => 'required',
                'key1' => 'required',
            ]);

            $content = Content::find($content_id);
            $datas = $request->all();

            $assesmentTotal = (count($datas) - 4);
            $assesmentTotal = $assesmentTotal / 6;

            $soal = [];
            for ($i=1; $i <= $assesmentTotal; $i++) { 
                $soal[$i] = [
                    'soal' => $datas['soal'.$i],
                    'A' => $datas['A'.$i],
                    'B' => $datas['B'.$i],
                    'C' => $datas['C'.$i],
                    'D' => $datas['D'.$i],
                    'key' => $datas['key'.$i]
                ];
            }

            $jsonSchema = [
                'content' => $content->title,
                'total_assesment' => $assesmentTotal,
                'one_time_work' => $request->one_time_work,
                'score' => $request->score,
                'time' => $request->time,
                'soal' => $soal,
            ];

            $dir = 'materi/assesment/' . $content->question_file_path;
            
            $storeFile = Storage::disk('public')->put($dir, json_encode($jsonSchema));

            $content->update([
                'one_time_work' => $datas['one_time_work'],
                'time_limit' => $datas['time'],
                'score' => $datas['score'],
            ]);

            DB::commit();
            return redirect(route('materi.show', $content_id))->with('success', 'Berhasil mengubah data');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function delete($id, $content_id)
    {
        $data = UserAssesment::find($id)->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }

    public function export($content_id) 
    {
        return Excel::download(new UserAssesmentExport($content_id), 'user-assesment-export.xlsx');
    }
}


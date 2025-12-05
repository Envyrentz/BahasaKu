<?php

namespace App\Http\Controllers\Web;

use App\Models\Content;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\UserAssesment;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\TryCatch;

class ContentController extends Controller
{
    public function index()
    {
        try {
            $datas = Content::where('user_id', auth()->user()->id)->get();
            return view('content.content-index', compact('datas'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $data = Content::find($id);
            $assesments = UserAssesment::where('content_id', $id)->get();

            return view('content.content-show', compact('data', 'assesments'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function create()
    {
        return view('content.content-create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'title' => 'required',
                'preview' => 'max:200',
                'body' => 'required',
                'thumbnail_path' => 'required', 'image|max:5120'
            ],
            [
                'thumbnail_path.image' => 'Banner harus berupa gambar',
                'thumbnail_path.required' => 'Banner wajib di isi',
                'thumbnail_path.max' => 'Banner maksimal berukuran 5MB',
            ]
        );

            $datas = array_merge([
                'user_id' => auth()->user()->id,
                'code' => '#' . Str::random(10),
            ],$request->all());

            $query = Content::create($datas);

            if($request->file('thumbnail_path')) {
                $file = $request->file('thumbnail_path');
                $file_name = Str::random(10) . '.' . $file->getClientOriginalExtension();
                $dir = 'materi/thumbnail/';

                $storeFile = $file->storeAs($dir, $file_name, 'public');

                $updateContent = $query->update([
                    'thumbnail_path' => $file_name
                ]);
                
            };

            DB::commit();
            return redirect(route('materi.index'))->with('success', 'Berhasil menambahkan data');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $data = Content::find($id);
            return view('content.content-edit', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'title' => 'required',
                'preview' => 'max:200',
                'body' => 'required',
                'thumbnail_path' => 'image|max:5120',
                'video_link' => 'max:50'
            ],
            [
                'thumbnail_path.image' => 'Banner harus berupa gambar',
            ]
        );
            $datas = $request->all();
            $data = Content::find($id);
            
            if($request->file('thumbnail_path')) {
                $file = $request->file('thumbnail_path');
                $file_name = $data['thumbnail_path'];
                $dir = 'materi/thumbnail/';
                
                $storeFile = $file->storeAs($dir, $file_name, 'public');
                $datas['thumbnail_path'] = $file_name;
            };
            
            $data->update($datas);

            DB::commit();
            return redirect(route('materi.index'))->with('success', 'Berhasil mengubah data');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $data = Content::find($id);

            if($data['thumbnail_path'] != null) {
                $deleteFile = Storage::disk('public')->delete('materi/thumbnail/'.$data['thumbnail_path']);
            }

            if($data['question_file_path']) {
                $assesmentFile = Storage::disk('public')->delete('materi/assesment/'.$data['question_file_path']);
            }

            $data->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Berhasil menghapus data');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
}


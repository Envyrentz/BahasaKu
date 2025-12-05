<?php

namespace App\Http\Controllers\Web;

use App\Models\Feedback;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FeedbackController extends Controller
{
    public function index()
    {
        try {
            $datas = Feedback::all();
            return view('feedback.feedback-index', compact('datas'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'body' => 'required',
            ]);

            $datas = array_merge(['user_id' => auth()->user()->id], $request->all());

            $query = Feedback::create($datas);

            DB::commit();
            return redirect(route('feedback.index'))->with('success', 'Berhasil menambahkan data');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'body' => 'required',
            ]);
            $datas = $request->all();
            $data = Feedback::find($id);
            
            $data->update($datas);

            DB::commit();
            return redirect(route('feedback.index'))->with('success', 'Berhasil mengubah data');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $data = Feedback::find($id);

            $data->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Berhasil menghapus data');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
}

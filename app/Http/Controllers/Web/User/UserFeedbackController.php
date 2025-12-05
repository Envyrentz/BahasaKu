<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class UserFeedbackController extends Controller
{
    public function index()
    {
        return view('user.feedback.feedback-index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required'
        ],
        [
            'body.required' => 'Pesan tidak boleh kosong'
        ]
    );
        try {
            $query = Feedback::create([
                'user_id' => auth()->user()->id,
                'body' => $request->body,
                'created_by' => auth()->user()->id,
            ]);

            return redirect()->back()->with('success', 'Berhasil mengirim masukan');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Terjadi kesalahan sistem' . $th->getMessage());
        }
    }
}

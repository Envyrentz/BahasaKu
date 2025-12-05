<?php

namespace App\Http\Controllers\Web\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserPenggunaController extends Controller
{
    public function index()
    {
        return view('user.pengguna.pengguna-index');
    }

    public function update(Request $request)
    {
        try {
            $id = auth()->user()->id;
            if($request->filled('password')) {
                $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                    'email' => [
                        'required',
                        'string',
                        'lowercase',
                        'email',
                        'max:255',
                        Rule::unique(User::class)->ignore($id),
                    ],
                ]);

                $query = User::find($id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
            } else {
                $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'email' => [
                        'required',
                        'string',
                        'lowercase',
                        'email',
                        'max:255',
                        Rule::unique(User::class)->ignore($id),
                    ],
                ]);

                $query = User::find($id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
            }

            return redirect()->back()->with('success', 'Berhasil mengubah profile');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error: ' . $th->getMessage());
        }
    }
}

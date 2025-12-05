<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class PenggunaController extends Controller
{
    public function index()
    {
        try {
            $datas = User::whereNot('id', auth()->user()->id)->get();
            return view('pengguna.pengguna-index', compact('datas'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function create()
    {
        $roles = Role::all();
        
        return view('pengguna.pengguna-create', compact('roles'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'role_id' => 'required',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $datas =[
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role_id,
                'password' => Hash::make($request->password),
            ];
            $datas = array_merge([
                    'created_by' => auth()->user()->id,
                    'role_id' => 1,
                ], $datas);

            $query = User::create($datas);

            DB::commit();
            return redirect(route('pengguna.index'))->with('success', 'Berhasil menambahkan data');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $data = User::find($id);
            $roles = Role::all();

            return view('pengguna.pengguna-edit', compact('data', 'roles'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        DB::beginTransaction();
        try {
            $data = User::find($id);

            if($request->filled('password')) {
                $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'role_id' => 'required',
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                    'email' => [
                        'required',
                        'string',
                        'lowercase',
                        'email',
                        'max:255',
                        Rule::unique(User::class)->ignore($data->id),
                    ],
                ]);
            } else {
                $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'role_id' => 'required',
                    'email' => [
                        'required',
                        'string',
                        'lowercase',
                        'email',
                        'max:255',
                        Rule::unique(User::class)->ignore($data->id),
                    ],
                ]);
            } 

            $datas =[
                'name' => $request->name,
                'role_id' => $request->role_id,
                'email' => $request->email,
            ];

            if($request->filled('password')) {
                $datas = array_merge(['password' => Hash::make($request->password)], $datas);
            }

            $datas = array_merge(['created_by' => auth()->user()->id], $datas);

            $query = $data->update($datas);

            DB::commit();
            return redirect(route('pengguna.index'))->with('success', 'Berhasil menambahkan data');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $data = User::find($id);

            $data->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Berhasil menghapus data');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
}

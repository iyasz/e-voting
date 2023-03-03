<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = User::all()->where('role_id', 2);
        return view('siswa.siswa', ['siswa' => $siswa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = [
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'name' => 'required'
        ];
        $message = [
            'email.required' => 'Email Tidak Boleh Kosong!',
            'email.email' => 'Harus bertipe Email!',
            'email.unique' => ' Email Sudah Terdaftar!',

            'name.required' => 'Nama Tidak Boleh Kosong!',
            'password.required' => 'Password Tidak Boleh Kosong!',
        ];
        $validate = $request->validate($validate, $message);

        $request['role_id'] = 2;
        $request['token_vote'] = 2;
        $request['password'] = password_hash($request->password, PASSWORD_DEFAULT, ['cost' => 7]);
        User::create($request->except('_token',));
        return redirect('/siswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = User::find($id);
        // dd($siswa);
        return view('siswa.edit', ['siswa' => $siswa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = User::find($id);
        $validate = [
            'email' => 'required',
            'password' => 'required',
            'name' => 'required'
        ];
        $message = [
            'email.required' => 'Email Tidak Boleh Kosong!',
            'email.email' => 'Harus bertipe Email!',

            'name.required' => 'Nama Tidak Boleh Kosong!',
            'password.required' => 'Password Tidak Boleh Kosong!',
        ];
        $validate = $request->validate($validate, $message);

        $request['role_id'] = 2;
        $request['token_vote'] = 2;
        $request['password'] = password_hash($request->password, PASSWORD_DEFAULT, ['cost' => 7]);
        $siswa->update($request->except('_token',));
        return redirect('/siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = User::find($id);
        $siswa->delete();
        return redirect('/siswa');
    }
}

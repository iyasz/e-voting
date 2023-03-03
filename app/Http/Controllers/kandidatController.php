<?php

namespace App\Http\Controllers;

use App\Models\kandidat;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class kandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kandidat = kandidat::with('user')->get();
        // dd($kandidat);
        return view('kandidat.kandidat', ['kandidat' => $kandidat]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all()->where('role_id', 2);
        // dd($kandidat);
        return view('kandidat.create', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        kandidat::create($request->except('_token'));
        $request['vote'] = 0;
        return redirect('/kandidat');
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
        $kandidat = kandidat::find($id);
        $user = User::all()->where('role_id', 2);

        return view('kandidat.edit', ['kandidat' => $kandidat, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kandidat = kandidat::find($id);

        $kandidat->update($request->except('_token'));
        return redirect('/kandidat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kandidat = kandidat::find($id);
        $kandidat->delete();
        return redirect('/kandidat');
    }
}

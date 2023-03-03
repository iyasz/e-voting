<?php

namespace App\Http\Controllers;

use App\Models\kandidat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class votingController extends Controller
{
    public function index()
    {
        $kandidat = kandidat::with("user")->get();
        $siswaCount = User::all()->where('token_vote', 1)->count();
        // $ad = kandidat::select('vote');
        // dd($siswaCount);


        return view('voting.voting', ['kandidat' => $kandidat, 'count' => $siswaCount]);
    }

    public function update($id, Request $request)
    {
        $kandidat = kandidat::find($id);
        $vote = $kandidat->vote + 1;
        $user = User::find(Auth::user()->id);

        $user->update([
            'token_vote' => 1
        ]);
        $kandidat->update([
            'vote' => $vote
        ]);

        return redirect('/voting');
    }
}

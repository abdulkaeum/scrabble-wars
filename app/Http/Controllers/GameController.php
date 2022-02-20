<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function create()
    {
        $users = User::all();

        return view('game.create', compact('users'));
    }

    public function store(Request $request)
    {
        dd($request->all());

        // validate the request data
        // create a game model
        // use the game model to attach a record for p1 and p2 along with the game id and score for each player
    }
}

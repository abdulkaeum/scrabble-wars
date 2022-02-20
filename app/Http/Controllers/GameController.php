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
    }
}

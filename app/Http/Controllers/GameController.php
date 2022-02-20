<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();

        return view('game.index', compact('games'));
    }

    public function create()
    {
        $users = User::all();

        return view('game.create', compact('users'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'player_one' => ['required', Rule::exists('users', 'id')],
            'score_one' => ['required', 'numeric'],
            'player_two' => ['required', Rule::exists('users', 'id'), 'different:player_one'],
            'score_two' => ['required', 'numeric']
        ]);

        $game = new Game;
        $game->save();

        $game->users()->attach([
            $attributes['player_one'] => [
                'score' => $attributes['score_one'],
                'winner' => $attributes['score_one'] > $attributes['score_two'],
                'game_id' => $game->id
            ],
            $attributes['player_two'] => [
                'score' => $attributes['score_two'],
                'winner' => $attributes['score_two'] > $attributes['score_one'],
                'game_id' => $game->id
            ]
        ]);

        return redirect()->route('game.index')->with('success', 'Game and score recorded');
    }
}

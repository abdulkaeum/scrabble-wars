<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $topMembers = DB::table('users')
            ->join('scores', 'users.id', 'scores.user_id')
            ->selectRaw('users.name, avg(scores.score) as average_score')
            ->groupBy('users.name')
            ->havingRaw('count(scores.user_id) >= 10')
            ->orderBy('average_score', 'DESC')
            ->limit(10)
            ->get();

        $currentHighest = DB::table('users')
            ->join('scores', 'users.id', 'scores.user_id')
            ->selectRaw('name, scores.created_at, score, user_id, game_id')
            ->orderBy('score', 'DESC')
            ->first();

        $currentHighestAgainst = DB::table('users')
            ->join('scores', 'users.id', 'scores.user_id')
            ->selectRaw('name')
            ->where([['game_id', $currentHighest->game_id], ['user_id', '!=', $currentHighest->user_id]])
            ->first();

        $currentHighestStats = [
            'currentHighestName' => $currentHighest->name,
            'currentHighestScore' => $currentHighest->score,
            'currentHighestDate' => Carbon::parse($currentHighest->created_at)->format('d/m/Y'),
            'currentHighestAgainst' => $currentHighestAgainst->name,
        ];

        $currentLowest = DB::table('users')
            ->join('scores', 'users.id', 'scores.user_id')
            ->selectRaw('name, scores.created_at, score, user_id, game_id')
            ->orderBy('score', 'ASC')
            ->first();

        $currentLowestAgainst = DB::table('users')
            ->join('scores', 'users.id', 'scores.user_id')
            ->selectRaw('name')
            ->where([['game_id', $currentLowest->game_id], ['user_id', '!=', $currentLowest->user_id]])
            ->first();

        $currentLowestStats = [
            'currentLowestName' => $currentLowest->name,
            'currentLowestScore' => $currentLowest->score,
            'currentLowestDate' => Carbon::parse($currentLowest->created_at)->format('d/m/Y'),
            'currentLowestAgainst' => $currentLowestAgainst->name,
        ];

        return view('welcome', compact('topMembers', 'currentHighestStats', 'currentLowestStats'));
    }
}

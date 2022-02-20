<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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

        return view('welcome', compact('topMembers'));
    }
}

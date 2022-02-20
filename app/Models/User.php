<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUserStats()
    {
        $highestScore = DB::table('scores')
            ->join('users', 'scores.user_id', '=', 'users.id')
            ->where('scores.user_id', $this->id)
            ->orderby('score', 'DESC')
            ->first();

        return [
            'won' =>
                DB::table('scores')
                    ->join('users', 'scores.user_id', '=', 'users.id')
                    ->where('scores.user_id', $this->id)
                    ->where('winner', 1)
                    ->count(),
            'lost' =>
                DB::table('scores')
                    ->join('users', 'scores.user_id', '=', 'users.id')
                    ->where('scores.user_id', $this->id)
                    ->where('winner', 0)
                    ->count(),
            'avgScore' =>
                DB::table('scores')
                    ->join('users', 'scores.user_id', '=', 'users.id')
                    ->where('scores.user_id', $this->id)
                    ->avg('score'),
            'highestScore' => $highestScore->score,
            'highestScoreDate' => Carbon::parse($highestScore->created_at)->format('d/m/y'),
            'highestScoreGame' => $highestScore->game_id,
            'highestScoreAgainst' => DB::table('scores')
                ->join('users', 'scores.user_id', '=', 'users.id')
                ->where('game_id', $highestScore->game_id)
                ->where('user_id', '!=', $this->id)
                ->first()
                ->name,
        ];
    }

    /**
     * The relationship/link between this model (User) and the model Game
     * A user can have many games and a game can have many users
     * return scores info from the pivot table 'scores'
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function games()
    {
        return $this->belongsToMany(Game::class, 'scores')
            ->withTimestamps()
            ->withPivot(['score', 'winner']);
    }
}

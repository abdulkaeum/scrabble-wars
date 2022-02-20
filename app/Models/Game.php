<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    /**
     * The relationship/link between this model (Game) and the model User
     * A game can have many users and a user can have many games
     * return scores info from the pivot table 'scores'
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'scores')
            ->withTimestamps()
            ->withPivot(['score', 'winner']);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();

        for ($i = 1; $i <= 60; $i++) {

            $game = Game::factory()->count(1)->create();

            $score_one = rand(10, 80);
            $score_two = rand(10, 80);

            $game[0]->users()->attach([
                rand(1, 10) => [
                    'score' => $score_one,
                    'winner' => $score_one > $score_two,
                    'game_id' => $game[0]->id
                ],
                rand(11, 20) => [
                    'score' => $score_two,
                    'winner' => $score_two > $score_one,
                    'game_id' => $game[0]->id
                ]
            ]);
        }
    }
}

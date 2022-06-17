<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Arcade;
use App\Models\Game;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Game::truncate();
        Arcade::truncate();
        
        User::factory()->count(0)->create();
        Game::factory()->count(0)->create();
        Arcade::factory()->count(0)->create();

    }
}


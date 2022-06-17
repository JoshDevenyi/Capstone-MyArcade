<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Game;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Arcade>
 */
class ArcadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random(),
            'game_id' => Game::all()->random(),
            'platform' => $this->faker->word(),
            'location' => $this->faker->address(),
            'playtime' => $this->faker->numberBetween($min = 0, $max = 10000),
            'date_obtained' => $this->faker->date(),
            'completed' => $this->faker->boolean(),
            'score' => $this->faker->numberBetween($min = 1, $max = 5),
        ];
    }
}

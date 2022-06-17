<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->word(),
            'platforms' => $this->faker->word(),
            'genres' => $this->faker->word(),
            'release_date' => $this->faker->date(),
            'companies' => $this->faker->word(),
            'cover' => $this->faker->imageUrl($width = 150, $height = 200),
            'summary' => $this->faker->sentence(),
            'age_ratings' => $this->faker->randomLetter(),
        ];
    }
}

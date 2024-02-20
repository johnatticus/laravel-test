<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(4),
            'tags' => 'fake tag 1, fake tag 2',
            'company' => fake()->company(),
            'location' => fake()->city(),
            'email' => fake()->unique()->safeEmail(),
            'website' => fake()->url(),
            'description' => fake()->paragraph(1),
        ];
    }
}

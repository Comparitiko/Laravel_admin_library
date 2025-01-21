<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->firstName,
            'isbn' => $this->faker->isbn13(),
            'cover' => $this->faker->imageUrl,
            'publication_year' => $this->faker->year,
            'state' => $this->faker->randomElement(['disponible', 'prestado', 'extraviado']),
            'author_id' => Author::all()->random()->id,
            'location_id' => Location::all()->random()->id,
        ];
    }
}

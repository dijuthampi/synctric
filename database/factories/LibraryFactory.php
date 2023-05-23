<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\Library;
use App\Models\Lentbook;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LibraryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->city
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Library $library) {
            $books = Book::factory()->count(rand(10,15))->create(['status' => 'In']);
            $library->books()->attach($books,[
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $books = Book::factory()->count(5)->create(['status' => 'Out']);
            $library->books()->attach($books,[
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });
    }
}

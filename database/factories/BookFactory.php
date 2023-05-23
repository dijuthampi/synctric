<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lentbook;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'name' => fake()->unique()->words(3,true)
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (\App\Models\Book $book) {
            // Create 3 Lentbook instances and associate them with the book
            if ($book->status == "Out") {
                Lentbook::factory()->create([
                    'book_id' => $book->id,
                    'return_date' => date("Y-m-d",strtotime(rand(2,10)." days")),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }            
        });
    }
}

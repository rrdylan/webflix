<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'title'=>fake()->sentence(3),
           'synopsis'=>fake()->text(),
           'duration'=>fake()->numberBetween(100,200),
           'youtube'=>Str::random(8),
           'cover'=> 'picsum.photos/id/'.rand(0,1084).'/400/400',
           'released_at'=>fake()->dateTimeBetween('-50 years','+50 years'),
        ];
    }
}

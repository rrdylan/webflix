<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Actor>
 */
class ActorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'=> fake()->numberBetween(0,100),
            //'gender'=> $actor["gender"],
            'name'=> fake()->sentence(10),
            //'original_name'=> $actor["original_name"],
            'pic'=>'picsum.photos/id/'.rand(0,1084).'/400/400',
        ];
    }
}

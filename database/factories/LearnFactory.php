<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Objective;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Learn>
 */
class LearnFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                      "name"=>$this->faker->title,
                      "description"=>$this->faker->text,
                      "type"=>$this->faker->text,
                      "objective_id"=>Objective::inRandomOrder()->first()->id
        ];
    }
}
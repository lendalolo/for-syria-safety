<?php

namespace Database\Factories;

use App\Models\Compaign;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Step>
 */
class StepFactory extends Factory
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
            "compaign_id"=>Compaign::inRandomOrder()->first()->id,
        ];
    }
}

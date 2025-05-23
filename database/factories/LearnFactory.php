<?php

namespace Database\Factories;

use App\Models\Compaign;
use App\Models\Step;
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
        ];
    }
}

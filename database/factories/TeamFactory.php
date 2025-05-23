<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Unit;
use App\Models\Teamposition;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
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
        "compaigns_num"=>$this->faker->randomNumber,
        "areas_examined"=>$this->faker->randomNumber,
        "unit_id"=>Unit::inRandomOrder()->first()->id,
        "teamposition_id"=>Teamposition::inRandomOrder()->first()->id,
        "status"=>"available",
        "level"=>$this->faker->randomNumber,
        ];
    }
}

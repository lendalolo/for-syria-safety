<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Step;
use App\Models\Location;
use App\Models\Team;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Compaign>
 */
class CompaignFactory extends Factory
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
        "start_date"=>$this->faker->date,
        "end_date"=>$this->faker->date,
        "article"=>$this->faker->text,
        "step_id"=>Step::inRandomOrder()->first()->id,
        "location_id"=>Location::inRandomOrder()->first()->id,
        "team_id"=>Team::inRandomOrder()->first()->id,
        ];
    }
}
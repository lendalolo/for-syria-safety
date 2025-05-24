<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Team;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
         "team_id"=>Team::inRandomOrder()->first()->id,
         "time"=>$this->faker->time,
         "mission"=>$this->faker->text,
         "statue"=>"assigned",
        ];
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Appointment;
use App\Models\Team;
class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Appointment::factory(20)->create();
           $appointments = [
           ["mission"=> ['ar' => 'موعد', 'en' => 'appointment'],
           "time"=>'20:13:22',
           "statue"=>'assigned',

            "team_id"=>Team::inRandomOrder()->first()->id
           ],
           ["mission"=> ['ar' => 'موعد', 'en' => 'appointment'],
           "time"=>'20:13:22',
           "statue"=>'optional',
            "team_id"=>Team::inRandomOrder()->first()->id
           ],
           ["mission"=> ['ar' => 'موعد', 'en' => 'appointment'],
           "time"=>'20:13:22',
           "statue"=>'optional',
            "team_id"=>Team::inRandomOrder()->first()->id
           ]




           ];


           foreach ($appointments as $appointment) {
           Appointment::create($appointment);
           }
    }
}

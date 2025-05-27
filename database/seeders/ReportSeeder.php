<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Report;
use App\Models\User;
use App\Models\Location;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //    Report::factory(10)->create();
      $reports = [
   [
          "description" => 'description',
          "statue"=>'processing',
          "user_id"=>User::inRandomOrder()->first()->id,
          "location_id"=>Location::inRandomOrder()->first()->id,

   ],
    [
           "description"=>'description',
           "statue"=>'verified',
           "user_id"=>User::inRandomOrder()->first()->id,
           "location_id"=>Location::inRandomOrder()->first()->id,


   ],
   [
          "description"=> 'description',
          "statue"=>'unverified',
          "user_id"=>User::inRandomOrder()->first()->id,
          "location_id"=>Location::inRandomOrder()->first()->id,


   ]




      ];


      foreach ($reports as $report) {
      Report::create($report);
      }
    }
}
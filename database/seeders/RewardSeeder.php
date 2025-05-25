<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reward;
use App\Models\Report;

class RewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //    Reward::factory(10)->create();
     $rewards = [
     [
     "description"=>['ar' => 'وصف', 'en' => 'description'],
             "report_id"=>Report::inRandomOrder()->first()->id,

     "point"=>"3"
     ],
     [
     "description"=>['ar' => 'وصف', 'en' => 'description'],
             "report_id"=>Report::inRandomOrder()->first()->id,

     "point"=>"3"


     ],
     [
     "description"=>['ar' => 'وصف', 'en' => 'description'],
             "report_id"=>Report::inRandomOrder()->first()->id,
     "point"=>"3"

     ]




     ];


     foreach ($rewards as $reward) {
     Reward::create($reward);
     }
    }
}

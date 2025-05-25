<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\Teamposition;
use App\Models\Unit;
class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    // Team::factory(20)->create();
            $teams = [
            [
            "name"=>['ar' => 'اسم', 'en' => 'name'],
            "level"=>['ar' => 'مستوى', 'en' => 'level'],
             "unit_id"=>Unit::inRandomOrder()->first()->id,
             "teamposition_id"=>Teamposition::inRandomOrder()->first()->id,

            "teamposition_id"=>1,
            "areas_examined"=>"22",
            "compaigns_num"=>"44",
            "status"=>"waiting",
            ],
            [
            "name"=>['ar' => 'اسم', 'en' => 'name'],
            "level"=>['ar' => 'مستوى', 'en' => 'level'],
            "status"=>"available",
           "unit_id"=>Unit::inRandomOrder()->first()->id,
           "teamposition_id"=>Teamposition::inRandomOrder()->first()->id,
            "areas_examined"=>"22",
            "compaigns_num"=>"44",

            ],
            [
            "name"=>['ar' => 'اسم', 'en' => 'name'],
            "level"=>['ar' => 'مستوى', 'en' => 'level'],
            "status"=>"busy",
               "unit_id"=>Unit::inRandomOrder()->first()->id,
               "teamposition_id"=>Teamposition::inRandomOrder()->first()->id,
              "areas_examined"=>"22",
              "compaigns_num"=>"44",

            ]
            ];


            foreach ($teams as $team) {
            Team::create($team);
            }
    }
}

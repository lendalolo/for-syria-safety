<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Compaign;
use App\Models\Location;
use App\Models\Team;

class CompaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //    Compaign::factory(12)->create();
     $compaigns = [
     ["name"=> ['ar' => 'اسم', 'en' => 'name'],
     "description"=>['ar' => 'وصف', 'en' => 'description'],
     "article"=>['ar' => 'مقالة', 'en' => 'article'],
        "video"=>"sddas",
                "start_date"=>'2025-1-22:20:13:22',
                "end_date"=>'2025-1-22:20:13:22',
            "location_id"=>Location::inRandomOrder()->first()->id,
            "team_id"=>Team::inRandomOrder()->first()->id,
            ],
            ["name"=> ['ar' => 'اسم', 'en' => 'name'],
            "article"=>['ar' => 'مقالة', 'en' => 'article'],
            "description"=>['ar' => 'وصف', 'en' => 'description'],
                "start_date"=>'2025-1-22:20:13:22',
                "end_date"=>'2025-1-22:20:13:22',
        "video"=>"sddas",

                "location_id"=>Location::inRandomOrder()->first()->id,
                "team_id"=>Team::inRandomOrder()->first()->id,

            ],
            ["name"=> ['ar' => 'اسم', 'en' => 'name'],
            "article"=>['ar' => 'مقالة', 'en' => 'article'],
            "description"=>['ar' => 'وصف', 'en' => 'description'],
                "start_date"=>'2025-1-22:20:13:22',
                "end_date"=>'2025-1-22:20:13:22',
        "video"=>"sddas",

                    "location_id"=>Location::inRandomOrder()->first()->id,
                    "team_id"=>Team::inRandomOrder()->first()->id,

     ]




     ];


     foreach ($compaigns as $compaign) {
     Compaign::create($compaign);
     }
    }
}

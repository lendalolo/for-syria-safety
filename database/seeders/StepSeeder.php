<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Step;
use App\Models\Compaign;

class StepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $steps = [
            ["name"=> ['ar' => 'تعليمي', 'en' => 'step'],
            "description"=>['ar' => 'تعليمي', 'en' => 'step'],
             "compaign_id"=>Compaign::inRandomOrder()->first()->id,

            ],
            ["name"=> ['ar' => 'انقاذ', 'en' => 'step'],
            "description"=>['ar' => 'تعليمي', 'en' => 'step'],
             "compaign_id"=>Compaign::inRandomOrder()->first()->id,


            ],
            ["name"=> ['ar' => 'استكشاف', 'en' => 'step'],
            "description"=>['ar' => 'تعليمي', 'en' => 'step'],
                      "compaign_id"=>Compaign::inRandomOrder()->first()->id,



            ]




            ];


            foreach ($steps as $step) {
            Step::create($step);
            }
          }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Objective;
use App\Models\Learn;

class ObjectiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // objective::factory(10)->create();
         $objectives = [
         ["name"=> ['ar' => 'هدف', 'en' => 'objective'],
         "learn_id"=>Learn::inRandomOrder()->first()->id,
         ],
         ["name"=> ['ar' => 'هدف', 'en' => 'objective'],
         "learn_id"=>Learn::inRandomOrder()->first()->id,
         ],
         ["name"=> ['ar' => 'هدف', 'en' => 'objective'],
         "learn_id"=>Learn::inRandomOrder()->first()->id,

         ]

         ];


         foreach ($objectives as $objective) {
         Objective::create($objective);
         }
    }
}

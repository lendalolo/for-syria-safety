<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teamposition;
class TeampositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     //  Teamposition::factory(10)->create();
        $categories = [
           ["name"=> ['ar' => 'تعليمي', 'en' => 'learn'],
            "description"=>['ar' => 'تعليمي', 'en' => 'learn']
            ],
           ["name"=> ['ar' => 'انقاذ', 'en' => 'resque'],
           "description"=>['ar' => 'انقاذ', 'en' => 'resque']
           ],
            ["name"=> ['ar' => 'استكشاف', 'en' => 'explorer'],
            "description"=>['ar' => 'استكشاف', 'en' => 'explorer']
            ]




    ];


        foreach ($categories as $category) {
            Teamposition::create($category);
            // Teamposition::create(['name' => $category,'description' =>"sdasd"]);
        }
    }
}

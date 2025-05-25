<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Learn;

class LearnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
     {
     $learns = [
     ["name"=> ['ar' => 'اسم', 'en' => 'name'],
     "description"=>['ar' => 'وصف', 'en' => 'description'],
     "type"=>['ar' => 'مقالة', 'en' => 'type'],

     ],
     ["name"=> ['ar' => 'اسم', 'en' => 'name'],
     "type"=>['ar' => 'مقالة', 'en' => 'type'],
     "description"=>['ar' => 'وصف', 'en' => 'description'],



     ],
     ["name"=> ['ar' => 'اسم', 'en' => 'name'],
     "type"=>['ar' => 'مقالة', 'en' => 'type'],
     "description"=>['ar' => 'وصف', 'en' => 'description'],



     ]




     ];


     foreach ($learns as $learn) {
     Learn::create($learn);
     }
     }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;
class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //  Unit::factory(5)->create();
         $units = [
      ["name"=> ['ar' => 'اسم', 'en' => 'name'],
      "description"=>['ar' => 'وصف', 'en' => 'description'],
      ],
      ["name"=> ['ar' => 'اسم', 'en' => 'name'],
      "description"=>['ar' => 'وصف', 'en' => 'description'],

      ],
      ["name"=> ['ar' => 'اسم', 'en' => 'name'],
      "description"=>['ar' => 'وصف', 'en' => 'description'],

      ]

         ];


         foreach ($units as $unit) {
         Unit::create($unit);
         }
    }
}

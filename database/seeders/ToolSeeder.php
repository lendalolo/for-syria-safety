<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tool;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           $tools = [
           ["name"=> ['ar' => 'أداة', 'en' => 'tool'],
           ],
           ["name"=> ['ar' => 'أداة', 'en' => 'tool'],
           ],
           ["name"=> ['ar' => 'أداة', 'en' => 'tool'],
           ]




           ];


           foreach ($tools as $tool) {
           Tool::create($tool);
           }
    }
}

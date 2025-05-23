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
            'resque',
            'explorer',
            'learn',

        ];
        foreach ($categories as $category) {
            Teamposition::create(['name' => $category,'description' => 'Description '.$category]);
        }
    }
}

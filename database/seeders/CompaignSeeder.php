<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Compaign;

class CompaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Compaign::factory(12)->create();
    }
}
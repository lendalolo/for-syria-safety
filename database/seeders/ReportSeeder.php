<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Report;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Report::create([
       "description"=>"description",
       "user_id"=>"1",
       "location_id"=>"1",
       ]);
    }
}

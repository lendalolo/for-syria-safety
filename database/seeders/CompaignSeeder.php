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
       Compaign::create([
       "name"=>"name",
       "compaigns_num"=>"1",
       "areas_examined"=>"1",
       "unit_id"=>"1",
       "teamposition_id"=>"1",
       "status"=>"free",
       "level"=>"2",
       ]);
    }
}

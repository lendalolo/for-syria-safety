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
          Learn::create([
          "title"=>"title",
          "type"=>"type",
          "description"=>"description",
          "objective_id"=>"1"
          ]);
    }
}

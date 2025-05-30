<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
     use WithoutModelEvents;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            AdminSeeder::class,
            LocationSeeder::class,
            UnitSeeder::class,
            ToolSeeder::class,
            LearnSeeder::class,
            ObjectiveSeeder::class,
            OrganizationSeeder::class,
            TeampositionSeeder::class,
            TeamSeeder::class,
            CompaignSeeder::class,
            StepSeeder::class,
            ReportSeeder::class,
            RewardSeeder::class,
            AppointmentSeeder::class,
        ]);
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
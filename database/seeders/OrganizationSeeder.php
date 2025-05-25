<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organization;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $organizations = [
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


    foreach ($organizations as $organization) {
    Organization::create($organization);
    }
    }
}

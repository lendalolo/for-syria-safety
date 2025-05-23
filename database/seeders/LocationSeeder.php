<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                "name"=>"حي الفردوس ",
                "lat"=>36.18191868913205,
                "lon"=>37.1521516817752,
                "status"=>"danger",
            ],
             [
             "name"=>"نزلة الزبدية",
             "lat"=>36.20209168615474,
             "lon"=> 37.133852608565284,
             "status"=>"warning",
             ],
              [
              "name"=>"الشيخ مقصود",
              "lat"=>36.23645314815767,
              "lon"=>37.14997569406198,
              "status"=>"danger",
              ]
              ,
              [
              "name"=>" السريان الجديدة, شارع الزهور",
              "lat"=>36.22193725566661,
              "lon"=> 37.14240132390621,
              "status"=>"warning",
              ],
               [
               "name"=>"شارع جبل الجودي",
               "lat"=>36.227087499737344,
               "lon"=> 37.12350302716437,
               "status"=>"safe",
               ],
               [
               "name"=>"شارع الخالديه",
               "lat"=>36.22763838562229,
               "lon"=> 37.11840933844172,
               "status"=>"safe",
               ],[
               "name"=>"شارع بابل",
               "lat"=>36.22953771951283,
               "lon"=> 37.1164074142066,
               "status"=>"danger",
               ],
               [
               "name"=>"شارع حطين",
               "lat"=>36.22011183790308,
               "lon"=> 37.1480852554675,
               "status"=>"danger",
               ],
        ];
        foreach($locations as $location){

            Location::create($location);
        }
    }
}

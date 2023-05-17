<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sports = [
            ["description" => "aaaaaaaaaaaaaa", "name_sport" => "Football"],
            ["description" => "aaaaaaaaaaaaaa", "name_sport" => "Basketball"],
            ["description" => "aaaaaaaaaaaaaa", "name_sport" => "Volleyball"],
            ["description" => "aaaaaaaaaaaaaa", "name_sport" => "Badminton"],
            ["description" => "aaaaaaaaaaaaaa", "name_sport" => "Golf"],
            ["description" => "aaaaaaaaaaaaaa", "name_sport" => "Tennis"],
            ["description" => "aaaaaaaaaaaaaa", "name_sport" => "Kun Khmer"],
            ["description" => "aaaaaaaaaaaaaa", "name_sport" => "Petanque"],
            ["description" => "aaaaaaaaaaaaaa", "name_sport" => "Taekwondo"],
            ["description" => "aaaaaaaaaaaaaa", "name_sport" => "Finswimming"],
        ];

        foreach ($sports as $sport) {
            Sport::create($sport);
        }
    }
}

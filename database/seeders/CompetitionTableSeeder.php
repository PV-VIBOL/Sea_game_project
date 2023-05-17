<?php

namespace Database\Seeders;

use App\Models\Competition;
use Illuminate\Database\Seeder;

class CompetitionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $competitions = [
            ["name" => "Semi final", "team_a" => "Cambodia", "Team_b" => "Myanmar", "time" => "05:00:00", "event_id" => 1],
            ["name" => "Semi final", "team_a" => "Vietnam", "Team_b" => "Thailand", "time" => "07:00:00", "event_id" => 1],
        ];

        foreach ($competitions as $competition) {
            Competition::create($competition);
        }
    }
}

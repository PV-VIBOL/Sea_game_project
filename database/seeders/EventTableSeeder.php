<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            ["date" => "2023-05-15", "sport_id" => 1, "address_id" => 1],
            ["date" => "2023-05-17", "sport_id" => 2, "address_id" => 1],
            ["date" => "2023-05-18", "sport_id" => 3, "address_id" => 1],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}

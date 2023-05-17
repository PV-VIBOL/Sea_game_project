<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TickertTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tickets = [
            ["zone" => "B", "event_id" => 1],
            ["zone" => "B", "event_id" => 1],
            ["zone" => "B", "event_id" => 1],
        ];

        foreach ($tickets as $ticket) {
            Ticket::create($ticket);
        }
    }
}

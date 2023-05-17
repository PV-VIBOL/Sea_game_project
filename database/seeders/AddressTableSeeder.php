<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addresses = [
            ["name_address" => "Morodok Techo National Stadium", "zone_a" => 5000, "zone_b" => 10000],
            ["name_address" => "Olympic National Stadium", "zone_a" => 3000, "zone_b" => 8000],
            ["name_address" => "Royal University of Phnom Penh", "zone_a" => 100, "zone_b" => 10000],
        ];
        foreach ($addresses as $address) {
            Address::create($address);
        }
    }
}

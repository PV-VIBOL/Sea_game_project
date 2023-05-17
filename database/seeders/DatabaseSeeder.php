<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Sport::factory(20)->create();
        // Competition::factory(20)->create();
        $this->call([AddressTableSeeder::class]);
        $this->call([SportTableSeeder::class]);
        $this->call([EventTableSeeder::class]);
        $this->call([CompetitionTableSeeder::class]);
        $this->call([TickertTableSeeder::class]);
        // Stadium::factory(5)->create();

    }
}

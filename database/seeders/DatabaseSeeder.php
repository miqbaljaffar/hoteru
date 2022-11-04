<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Room;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Room::create([
            'no' => 'TTY-1',
            'type' => 'Big family',
            'capacity' => 10,
            'price' => 400000,
            'status' => 'pending',
        ]);
        Room::create([
            'no' => 'SM-1',
            'type' => 'small',
            'capacity' => 3,
            'price' => 200000,
            'status' => 'pending',
        ]);
        Room::create([
            'no' => 'MD-1',
            'type' => 'medium',
            'capacity' => 6,
            'price' => 300000,
            'status' => 'pending',
        ]);
    }
}

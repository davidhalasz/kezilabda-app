<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'date' => '2023-06-23 15:30:00',
            'play_with' => 'FTC-RAIL CARGO HUNGÁRIA',
            'address' => 'Kaba varosi sportcsarknok'
        ]);

        Event::create([
            'date' => '2023-07-12 18:00:00',
            'play_with' => 'DVSC SCHAEFFLER',
            'address' => 'Debrecen Hodosi sportcsarnok, Kassai ut 1'
        ]);

        Event::create([
            'date' => '2023-09-23 10:30:00',
            'play_with' => 'GLORIA BISTRITA',
            'address' => 'Manchester, sport street 4'
        ]);

        Event::create([
            'date' => '2023-07-23 15:30:00',
            'play_with' => 'SUGAR GLIDERS (KOR)',
            'address' => 'Kaba varosi sportcsarknok'
        ]);

        Event::create([
            'date' => '2023-06-15 16:30:00',
            'play_with' => 'DVSC SCHAEFFLER',
            'address' => 'Hajduszoboszlo'
        ]);

        Event::create([
            'date' => '2023-05-29 15:30:00',
            'play_with' => 'GLORIA BUZAU',
            'address' => 'Kaba varosi sportcsarknok'
        ]);
    }
}

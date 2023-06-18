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
            'title' => 'Kaba - Tetétlen meccs',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ut urna accumsan, vulputate nisl non',
            'date' => '2023-06-23 15:30:00',
            'address' => 'Kaba varosi sportcsarknok, valamilyen utca 1'
        ]);

        Event::create([
            'title' => 'Kaba - Debrecen meccs',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ut urna accumsan, vulputate nisl non',
            'date' => '2023-07-12 18:00:00',
            'address' => 'Debrecen Hodosi sportcsarnok, Kassai ut 1'
        ]);

        Event::create([
            'title' => 'Kaba - Manchester meccs',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ut urna accumsan, vulputate nisl non',
            'date' => '2023-09-23 10:30:00',
            'address' => 'Manchester, sport street 4'
        ]);

        Event::create([
            'title' => 'Kaba - DVSC meccs',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ut urna accumsan, vulputate nisl non',
            'date' => '2023-07-23 15:30:00',
            'address' => 'Kaba varosi sportcsarknok, valamilyen utca 1'
        ]);

        Event::create([
            'title' => 'Kaba - Hajduszoboszlo meccs',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ut urna accumsan, vulputate nisl non',
            'date' => '2023-06-15 16:30:00',
            'address' => 'Hajduszoboszlo, Momo utca 1'
        ]);

        Event::create([
            'title' => 'Kaba - Tetétlen meccs',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ut urna accumsan, vulputate nisl non',
            'date' => '2023-05-29 15:30:00',
            'address' => 'Kaba varosi sportcsarknok, valamilyen utca 1'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Player;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Player::create([
            'name' => 'Player 1',
            'avatar' => 'players/avatar1.jpg',
            'gender' => 'férfi',
            'description' => 'LOrem ipsum dolor et cetera etcues mi truader postem hiur de ceawr.',
            'team_id' => 1,
    ]);
    Player::create([
            'name' => 'Player 2',
            'avatar' => 'players/avatar2.jpg',
            'gender' => 'nő',
            'description' => 'LOrem ipsum dolor et cetera etcues mi truader postem hiur de ceawr.',
            'team_id' => 1,
    ]);
    Player::create([
            'name' => 'Player 3',
            'avatar' => 'players/avatar3.jpg',
            'gender' => 'férfi',
            'description' => 'LOrem ipsum dolor et cetera etcues mi truader postem hiur de ceawr.',
            'team_id' => 1,
    ]);
    Player::create([
            'name' => 'Player 4',
            'avatar' => 'players/avatar4.jpg',
            'gender' => 'nő',
            'description' => '',
            'team_id' => 1,
    ]);
    Player::create([
            'name' => 'Player 5',
            'avatar' => 'players/avatar5.jpg',
            'gender' => 'férfi',
            'description' => 'LOrem ipsum dolor et cetera etcues mi truader postem hiur de ceawr.',
            'team_id' => 1,
    ]);
    Player::create([
            'name' => 'Player 6',
            'avatar' => 'players/avatar6.jpg',
            'gender' => 'nő',
            'description' => 'lorem ipsum dolor et cetera metera qwerty',
            'team_id' => 1,
    ]);
    Player::create([
            'name' => 'Player 7',
            'avatar' => 'players/avatar7.jpg',
            'gender' => 'férfi',
            'description' => 'LOrem ipsum dolor et cetera etcues mi truader postem hiur de ceawr.',
            'team_id' => 1,
    ]);
    Player::create([
            'name' => 'Player 8',
            'avatar' => 'players/avatar8.jpg',
            'gender' => 'nő',
            'description' => 'lorem ipsum dolor et cetera metera qwerty',
            'team_id' => 1,
    ]);

    Player::create([
        'name' => 'Player 11',
        'avatar' => 'players/avatar8.jpg',
        'gender' => 'férfi',
        'description' => 'LOrem ipsum dolor et cetera etcues mi truader postem hiur de ceawr.',
        'team_id' => 2,
    ]);
    Player::create([
            'name' => 'Player 12',
            'avatar' => 'players/avatar7.jpg',
            'gender' => 'nő',
            'description' => 'lorem ipsum dolor et cetera metera qwerty',
            'team_id' => 2,
    ]);
    Player::create([
            'name' => 'Player 13',
            'avatar' => 'players/avatar6.jpg',
            'gender' => 'férfi',
            'description' => 'LOrem ipsum dolor et cetera etcues mi truader postem hiur de ceawr.',
            'team_id' => 2,
    ]);
    Player::create([
            'name' => 'Player 14',
            'avatar' => 'players/avatar5.jpg',
            'gender' => 'nő',
            'description' => 'lorem ipsum dolor et cetera metera qwerty',
            'team_id' => 2,
    ]);
    Player::create([
            'name' => 'Player 15',
            'avatar' => 'players/avatar4.jpg',
            'gender' => 'férfi',
            'description' => 'LOrem ipsum dolor et cetera etcues mi truader postem hiur de ceawr.',
            'team_id' => 2,
    ]);
    Player::create([
            'name' => 'Player 16',
            'avatar' => 'players/avatar3.jpg',
            'gender' => 'nő',
            'description' => 'lorem ipsum dolor et cetera metera qwerty',
            'team_id' => 2,
    ]);
    Player::create([
            'name' => 'Player 17',
            'avatar' => 'players/avatar2.jpg',
            'gender' => 'férfi',
            'description' => 'LOrem ipsum dolor et cetera etcues mi truader postem hiur de ceawr.',
            'team_id' => 2,
    ]);
    Player::create([
            'name' => 'Player 18',
            'avatar' => 'players/avatar1.jpg',
            'gender' => 'nő',
            'description' => 'lorem ipsum dolor et cetera metera qwerty',
            'team_id' => 2,
    ]);
    }
}

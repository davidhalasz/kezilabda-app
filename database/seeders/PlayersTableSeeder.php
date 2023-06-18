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
            'position' => 'Forward',
            'team_id' => 4,
    ]);
    Player::create([
            'name' => 'Player 2',
            'avatar' => 'players/avatar2.jpg',
            'position' => 'Midfielder',
            'team_id' => 4,
    ]);
    Player::create([
            'name' => 'Player 3',
            'avatar' => 'players/avatar3.jpg',
            'position' => 'Forward',
            'team_id' => 4,
    ]);
    Player::create([
            'name' => 'Player 4',
            'avatar' => 'players/avatar4.jpg',
            'position' => 'Midfielder',
            'team_id' => 4,
    ]);
    Player::create([
            'name' => 'Player 5',
            'avatar' => 'players/avatar5.jpg',
            'position' => 'Forward',
            'team_id' => 4,
    ]);
    Player::create([
            'name' => 'Player 6',
            'avatar' => 'players/avatar6.jpg',
            'position' => 'Midfielder',
            'team_id' => 4,
    ]);
    Player::create([
            'name' => 'Player 7',
            'avatar' => 'players/avatar7.jpg',
            'position' => 'Forward',
            'team_id' => 4,
    ]);
    Player::create([
            'name' => 'Player 8',
            'avatar' => 'players/avatar8.jpg',
            'position' => 'Midfielder',
            'team_id' => 4,
    ]);

    Player::create([
        'name' => 'Player 11',
        'avatar' => 'players/avatar8.jpg',
        'position' => 'Forward',
        'team_id' => 5,
    ]);
    Player::create([
            'name' => 'Player 12',
            'avatar' => 'players/avatar7.jpg',
            'position' => 'Midfielder',
            'team_id' => 5,
    ]);
    Player::create([
            'name' => 'Player 13',
            'avatar' => 'players/avatar6.jpg',
            'position' => 'Forward',
            'team_id' => 5,
    ]);
    Player::create([
            'name' => 'Player 14',
            'avatar' => 'players/avatar5.jpg',
            'position' => 'Midfielder',
            'team_id' => 5,
    ]);
    Player::create([
            'name' => 'Player 15',
            'avatar' => 'players/avatar4.jpg',
            'position' => 'Forward',
            'team_id' => 5,
    ]);
    Player::create([
            'name' => 'Player 16',
            'avatar' => 'players/avatar3.jpg',
            'position' => 'Midfielder',
            'team_id' => 5,
    ]);
    Player::create([
            'name' => 'Player 17',
            'avatar' => 'players/avatar2.jpg',
            'position' => 'Forward',
            'team_id' => 5,
    ]);
    Player::create([
            'name' => 'Player 18',
            'avatar' => 'players/avatar1.jpg',
            'position' => 'Midfielder',
            'team_id' => 5,
    ]);
    }
}

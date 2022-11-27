<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create(['type_id' => '1', 'numero' => 'B1']);
        Room::create(['type_id' => '1', 'numero' => 'B2']);
        Room::create(['type_id' => '1', 'numero' => 'B3']);
        Room::create(['type_id' => '1', 'numero' => 'B4']);
        Room::create(['type_id' => '1', 'numero' => 'B5']);
        Room::create(['type_id' => '1', 'numero' => 'B6']);
        Room::create(['type_id' => '1', 'numero' => 'B7']);
        Room::create(['type_id' => '1', 'numero' => 'B8']);
        Room::create(['type_id' => '1', 'numero' => 'B9']);
        Room::create(['type_id' => '2', 'numero' => 'B10']);
        Room::create(['type_id' => '2', 'numero' => 'B11']);
        Room::create(['type_id' => '2', 'numero' => 'B12']);
        Room::create(['type_id' => '2', 'numero' => 'B13']);
        Room::create(['type_id' => '2', 'numero' => 'B14']);
        Room::create(['type_id' => '2', 'numero' => 'B15']);
    }
}

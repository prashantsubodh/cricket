<?php

use Illuminate\Database\Seeder;
use App\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::truncate();

        State::create(['name' => 'Delhi']);
        State::create(['name' => 'Mumbai']);
        State::create(['name' => 'Chennai']);
        State::create(['name' => 'Kolkata']);
        State::create(['name' => 'Punjab']);
        State::create(['name' => 'Rajesthan']);
    }
}

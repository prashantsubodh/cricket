<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::truncate();

        Country::create(['name' => 'India']);
        Country::create(['name' => 'Australia']);
        Country::create(['name' => 'England']);
        Country::create(['name' => 'South Africa']);
        Country::create(['name' => 'Sri Lanka']);
        Country::create(['name' => 'Bangladesh']);
    }
}

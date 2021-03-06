<?php

use Illuminate\Database\Seeder;
use App\user;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'name'      => 'Admin',
            'email'     => 'admin@localhost.com',
            'password'  => bcrypt('12345678'),    
        ]);
    }
}

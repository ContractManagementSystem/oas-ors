<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
            'name' => 'Admin',
            'email' => 'yasini.selemani@iaa.ac.tz',
            'password'=> bcrypt('password'),
        ]);
    }
}

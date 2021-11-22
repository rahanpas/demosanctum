<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'rahanpas@gmail.com',
            'name' => 'andi',
            'password' => \Hash::make('123456789'),
            'status' => 'aktif',
        ]);
    }
}

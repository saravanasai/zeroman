<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'first_name' => 'Saravana',
            'last_name' => 'Sai',
            'email' => 'admin@zerocode.com',
            'password' => Hash::make('secret'),
        ]);

    }
}

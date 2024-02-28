<?php

namespace Database\Seeders;

use App\Models\Environment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnvironmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Environment::create([
            "name"=>"Default Environment",
            "user_id"=> 1
        ]);

        Environment::create([
            "name"=>"Default Environment - 1",
            "user_id"=> 1
        ]);
    }
}

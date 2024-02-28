<?php

namespace Database\Seeders;

use App\Models\EnvironmentVariables;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnvironmentVariablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EnvironmentVariables::create([
            "environment_id" => 1,
            "key" => "name",
            "value" => "Sai"
        ]);

        EnvironmentVariables::create([
            "environment_id" => 1,
            "key" => "address",
            "value" => "No : 7, renga nagar"
        ]);
    }
}

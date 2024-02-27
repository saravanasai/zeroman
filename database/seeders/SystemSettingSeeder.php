<?php

namespace Database\Seeders;

use App\Enums\SystemSettingEnum;
use App\Models\SystemSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class SystemSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        SystemSetting::create([
            "key" => SystemSettingEnum::CAN_USER_REGISTER->name,
            "value" => SystemSettingEnum::CAN_USER_REGISTER->value
        ]);

        SystemSetting::create([
            "key" => SystemSettingEnum::COMPANY_NAME->name,
            "value" => SystemSettingEnum::COMPANY_NAME->value
        ]);


        //set values on cache
        foreach (SystemSetting::all() as $value) {
            Cache::set('setting' . $value->key, $value->value);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['key' => 'app_name', 'value' => 'Point Of Sale'],
            ['key' => 'currency_symbol', 'value' => '£'],
            ['key' => 'sidebar_bg', 'value' => 'dark'],
            ['key' => 'sidebar_fg', 'value' => 'light'],
            ['key' => 'navbar_bg', 'value' => 'dark'],
            ['key' => 'navbar_fg', 'value' => 'light'],
        ];

        foreach ($data as $value) {
            if(!Setting::where('key', $value['key'])->first()) {
                Setting::create($value);
            }
        }
    }
}

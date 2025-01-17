<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Enums\Setting\SettingTypeInput;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('settings')->truncate();
        DB::table('settings')->insert([
            // General
            [
                'setting_key' => 'site_name',
                'setting_name' => 'Tên site',
                'plain_value' => 'Mevivu',
                'type_input' => SettingTypeInput::Text,
                'group' => 1
            ],
            [
                'setting_key' => 'site_logo',
                'setting_name' => 'Logo',
                'plain_value' => '/public/user/assets/images/logo-ngang.png',
                'type_input' => SettingTypeInput::Image,
                'group' => 1
            ],
            [
                'setting_key' => 'email',
                'setting_name' => 'Email',
                'plain_value' => 'info@bahagroup.vn',
                'type_input' => SettingTypeInput::Email,
                'group' => 1
            ],
            [
                'setting_key' => 'hotline',
                'setting_name' => 'Số điện thoại',
                'plain_value' => '0359777777',
                'type_input' => SettingTypeInput::Phone,
                'group' => 1
            ],
            [
                'setting_key' => 'zalo',
                'setting_name' => 'Zalo',
                'plain_value' => '0359777777',
                'type_input' => SettingTypeInput::Phone,
                'group' => 1
            ],
            [
                'setting_key' => 'site_logo_tab',
                'setting_name' => 'Logo tab',
                'plain_value' => '/public/user/assets/images/icon.png',
                'type_input' => SettingTypeInput::Image,
                'group' => 1
            ],
            [
                'setting_key' => 'min_order_installment',
                'setting_name' => 'Giá trị đơn hàng tối thiểu để có thể trả góp',
                'plain_value' => 1000000,
                'type_input' => SettingTypeInput::Number,
                'group' => 1
            ],
        ]);
    }
}

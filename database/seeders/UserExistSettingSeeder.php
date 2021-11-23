<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class UserExistSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::doesntHave('setting')->get();

        foreach ($users as $user) {
            $setting = new Setting(['twofa_enabled' => 0]);
            $user->setting()->save($setting);
        }
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Ability;
use Illuminate\Support\Str;
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
        //Create admin user
        $admin = User::create([
            'name' => 'Root',
            'email' => 'root@mclinkgroup.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
        //Assign role
        $admin->assignRole('Administrator');
    }
}
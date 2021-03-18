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
            'employee_id' => '0101',
            'joining_date' => '2021-01-18',
            'company_id' => 1,
            'department_id' => 2,
            'designation_id' => 1,
            'gender' => 'female',
            'shift_id' => 1,
            'birth_date' => '1998-04-21',
            'contact_number' => '09274302437'

        ]);
        //Assign role
        $admin->assignRole('Administrator');
    }
}
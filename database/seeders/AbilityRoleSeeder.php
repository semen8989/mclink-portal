<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Ability;
use Illuminate\Database\Seeder;

class AbilityRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin role and abilities
        $admin = Role::create(['name'=>'Administrator']);
        $allowAll = Ability::create(['name'=>'allow-all', 'label'=>'Allow all']);
        $admin->allowTo($allowAll);

        //Employee role and abilities
        $employee = Role::create(['name'=>'Employee']);
        $viewDashboard = Ability::create(['name'=>'view-dashboard', 'View dashboard']);
        $employee->allowTo($viewDashboard);
        
    }
}

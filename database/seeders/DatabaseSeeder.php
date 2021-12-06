<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AbilityRoleSeeder::class,
            UserSeeder::class,
            CustomerSeeder::class,
            ServiceReportSeeder::class,        
            KpiMaingoalSeeder::class,
            KpiVariableSeeder::class,
            KpiRatingSeeder::class,
            CompanySeeder::class,
            DepartmentSeeder::class,
            DesignationSeeder::class,
            AnnouncementSeeder::class,
            PolicySeeder::class,
            HolidaySeeder::class,
            LocationSeeder::class,
            OfficeShiftSeeder::class,
            ExpenseTypeSeeder::class,
            ExpenseSeeder::class,
            EventSeeder::class
        ]);
    }
}

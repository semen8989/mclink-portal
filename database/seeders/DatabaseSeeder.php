<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\KpiRatingSeeder;
use Database\Seeders\KpiMaingoalSeeder;

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
            UserSeeder::class,
            CustomerSeeder::class,
            ServiceReportSeeder::class,        
            KpiMaingoalSeeder::class,
            KpiRatingSeeder::class,
        ]);
    }
}

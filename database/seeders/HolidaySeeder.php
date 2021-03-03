<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HolidaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('holidays')->delete();
        $holidays = [
            [
                'id' => 1,
                'event_name' => 'Good Friday',
                'company_id' => 2,
                'start_date' => '2021-04-09',
                'end_date' => '2021-04-09',
                'description' => 'Holy Week',
                'status' => 'published',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'event_name' => 'Black Saturday',
                'company_id' => 2,
                'start_date' => '2021-04-10',
                'end_date' => '2021-04-10',
                'description' => 'Holy Week',
                'status' => 'published',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        DB::table('holidays')->insert($holidays);
    }
}

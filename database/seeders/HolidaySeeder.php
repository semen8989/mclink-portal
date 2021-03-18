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
                'event_name' => 'Holiday 1',
                'company_id' => 2,
                'start_date' => '2021-03-18',
                'end_date' => '2021-03-18',
                'description' => '<p><strong>This is holiday 1</strong></strong>',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'event_name' => 'Holiday 2',
                'company_id' => 2,
                'start_date' => '2021-03-29',
                'end_date' => '2021-03-31',
                'description' => '<p><strong>This is holiday 2</strong></strong>',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        DB::table('holidays')->insert($holidays);
    }
}

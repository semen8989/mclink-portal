<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->delete();
        $events = [
            [
                'id' => 1,
                'company_id' => 1,
                'title' => 'Event 1',
                'start_date' => '2021-03-15',
                'end_date' => '2021-03-15',
                'note' => '<p><strong>This is event 1</b></strong>',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'company_id' => 1,
                'title' => 'Event 2',
                'start_date' => '2021-03-21',
                'end_date' => '2021-03-23',
                'note' => '<p><em>This is event 2</em></p>',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];
        DB::table('events')->insert($events);
    }
}

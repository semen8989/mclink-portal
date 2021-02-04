<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('announcement')->delete();
        $announcement = [
            [
                'title' => 'Sample announcement',
                'start_date' => '2021-03-01',
                'end_date' => '2021-03-13',
                'company_id' => 4,
                'department_id' => 5,
                'summary' => 'This is sample announcement',
                'description' => '<h2><strong>Content on working...</strong></h2>',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        DB::table('announcement')->insert($announcement);

    }
}

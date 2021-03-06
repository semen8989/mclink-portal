<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Department;
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
        DB::table('announcements')->delete();
        $announcement = [
            [
                'id' => 1,
                'title' => 'Training Schedule',
                'start_date' => '2021-03-01',
                'end_date' => '2021-03-13',
                'company_id' => 1,
                'department_id' => 3,
                'summary' => 'This is sample announcement',
                'description' => '<h2><strong>Content on working...</strong></h2>',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        DB::table('announcements')->insert($announcement);

    }
}

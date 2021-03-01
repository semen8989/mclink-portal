<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('policies')->delete();
        $policy = [
            [
                'id' => 1,
                'title' => 'Employee Conduct',
                'company_id' => 1,
                'user_id' => 1,
                'description' => '<h2><strong>Content on working...</strong></h2>',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        DB::table('policies')->insert($policy);
    }
}

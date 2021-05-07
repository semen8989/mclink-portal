<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\EmployeeAppraisal;
use App\Models\RegularEmployeeAppraisal;

class RegularEmployeeAppraisalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RegularEmployeeAppraisal::create([
            'employee_appraisal_id' => EmployeeAppraisal::find(2)->id,
            'jks_score1' => rand(1, 7),
            'jks_score2' => rand(1, 7),
            'jks_score3' => rand(1, 7),
            'aos_score1' => rand(1, 7),
            'aos_score2' => rand(1, 7),
            'aos_score3' => rand(1, 7),
            'qow_score1' => rand(1, 7),
            'qow_score2' => rand(1, 7),
            'qow_score3' => rand(1, 7),
            'its_score1' => rand(1, 7),
            'its_score2' => rand(1, 7),
            'its_score3' => rand(1, 7),
            'its_score4' => rand(1, 7),
            'td_score1' => rand(1, 7),
            'td_score2' => rand(1, 7),
            'td_score3' => rand(1, 7),
            'upcp_score1' => rand(1, 7),
            'upcp_score2' => rand(1, 7),
            'upcp_score3' => rand(1, 7),
            'positive_comment' => Str::random(20),
            'issue' => Str::random(20),
            'sr' => Str::random(20),
            'warning' => Str::random(20), 
            'tf' => Str::random(20)
        ]);
    }
}

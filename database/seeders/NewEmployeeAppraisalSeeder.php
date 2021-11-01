<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\EmployeeAppraisal;
use App\Models\NewEmployeeAppraisal;

class NewEmployeeAppraisalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NewEmployeeAppraisal::create([
            'employee_appraisal_id' => EmployeeAppraisal::find(1)->id,
            'purpose' => 1,
            'pf_score' => rand(1, 5),
            'qow_score' => rand(1, 5),
            'qow_level' => rand(1, 5),
            'qow_comment' => Str::random(20),
            'wh_score' =>  rand(1, 5),
            'wh_level' =>  rand(1, 5),
            'wh_comment' => Str::random(20),
            'jk_score' => rand(1, 5),
            'jk_level' => rand(1, 5),
            'jk_comment' => Str::random(20),
            'bro_score' => rand(1, 5),
            'bro_level' => rand(1, 5),
            'bro_comment' => Str::random(20),
            'overall_progress' => 1,
            'progress_comment' => Str::random(20),
            'recommendation' => 1,
            'final_comment' => Str::random(20)
        ]);
    }
}

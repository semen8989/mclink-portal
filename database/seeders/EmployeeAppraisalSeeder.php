<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\EmployeeAppraisal;

class EmployeeAppraisalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create admin user
        $admin = EmployeeAppraisal::create([
            'user_id' => User::find(1)->id,
            'employee_id' => User::find(2)->id,
            'review_period_from' => Carbon::now()->format('Y-m-d'),
            'review_period_to' => Carbon::now()->format('Y-m-d'),
            'review_date' => Carbon::now()->format('Y-m-d'),
            'total_score' => 5,
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}

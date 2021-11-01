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
        $appraisals = [];

        for ($counter = 0; $counter < 2; $counter++) { 
            array_push($appraisals, [
                'user_id' => User::find(1)->id,
                'employee_id' => User::find(2)->id,
                'review_period_from' => Carbon::now()->subMonths(3),
                'review_period_to' => Carbon::now()->format('Y-m-d'),
                'review_date' => Carbon::now()->format('Y-m-d'),
                'total_score' => 5,
                'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }

        foreach ($appraisals as $appraisal) {
            //Create employee appraisal
            $employeeAppraisal = EmployeeAppraisal::create($appraisal);

            //Generate a row in the pivot table based on the employee appraisal and user
            $employeeAppraisal->sharedUsers()->attach(2, [
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        } 
    }
}

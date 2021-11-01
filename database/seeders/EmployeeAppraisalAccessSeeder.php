<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\NewEmployeeAppraisal;

class EmployeeAppraisalAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_appraisal_access')->insert([
            'code' => 'DYGMMS',
            'validity' => Carbon::now()->addHours(24),
            'accessible_id' => NewEmployeeAppraisal::find(1)->id,
            'accessible_type' => NewEmployeeAppraisal::class,
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('office_shifts')->delete();
        $office_shift = [
            [
                'id' => 1,
                'company_id' => 1,
                'shift_name' => 'Dayshift',
                'monday_in_time' => '08:30:00',
                'monday_out_time' => '17:30:00',
                'tuesday_in_time' => '08:30:00',
                'tuesday_out_time' => '17:30:00',
                'wednesday_in_time' => '08:30:00',
                'wednesday_out_time' => '17:30:00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        DB::table('office_shifts')->insert($office_shift);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_reports')->insert([
            'id' => Str::uuid(),
            'csr_no' => Carbon::now()->format('Ymd').'-1',
            'date' => Carbon::now()->format('Y-m-d'),
            'customer_id' => Customer::find(1)->id,
            'engineer_id' => User::find(1)->id,
            'current_user_id' => User::find(1)->id,
            'service_rendered' => Str::random(100),
            'used_it_credit' => Str::random(10),
            'status' => 1,
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            
        ]);
    }
}

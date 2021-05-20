<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KpiObjectiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kpi_objectives')->insert([
            'objective_kpi' => Str::random(20),
            'target_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_year' => Carbon::now()->format('Y'),
            'objective_quarter' => 1,
            'status' => 0,
            'user_id' => User::find(1)->id,
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}

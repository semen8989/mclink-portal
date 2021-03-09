<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\KpiRating;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KpiMaingoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kpi_maingoals')->insert([
            'main_kpi' => Str::random(20),
            'q1' => Str::random(10),
            'q2' => Str::random(10),
            'q3' => Str::random(10),
            'q4' => Str::random(10),
            'user_id' => User::find(1)->id,
            'status' => 0,
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}

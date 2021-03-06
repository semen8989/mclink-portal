<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\KpiMaingoal;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KpiRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kpi_ratings')->insert([
            'rating' => 5,
            'month' => 2,
            'manager_comment' => Str::random(20),
            'kpi_ratable_id' => KpiMaingoal::find(1)->id,
            'kpi_ratable_type' => KpiMaingoal::class,
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}

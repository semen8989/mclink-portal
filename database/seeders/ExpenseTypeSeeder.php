<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expense_types')->delete();
        $expense_type = [
            [
                'id' => 1,
                'company_id' => 1,
                'expense_type' => 'Fixed'
            ]
        ];
        DB::table('expense_types')->insert($expense_type);

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expenses')->delete();
        $expense = [
            [
                'id' => 1,
                'expense_type_id' => 1,
                'purchase_date' => '2021-03-16',
                'amount' => '200',
                'company_id' => 1,
                'employee_id' => 1,
                'status' => 0,
                'remarks' => 'no remarks'
            ]
        ];
        DB::table('expenses')->insert($expense);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->delete();
        $companies = [
            [
                'id' => 1, 
                'company_name' => 'McLink Asia Pte Ltd',
                'company_type' => 'Private',
                'trading_name' => 'Sample Trading Name',
                'registration_no' => '200209013W',
                'contact_number' => '123454',
                'email' => 'admin@mclink.com.sg',
                'website' => 'https://www.mclink.com.sg/',
                'xin_gtax' => '200209013W',
                'address_1' => '51 Ubi Ave 1 #05-11',
                'city' => 'Singapore',
                'state' => null,
                'zip_code' => '408933',
                'country' => 'Singapore',
                'user_id' => 1,
                'logo' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2, 
                'company_name' => 'Mclink Copy Services Philippines Inc',
                'company_type' => 'Private',
                'trading_name' => null,
                'registration_no' => '008783561',
                'contact_number' => '025847859',
                'email' => 'csph@mclinkgroup.com',
                'website' => 'http://www.mclinkphil.com/about-us',
                'xin_gtax' => '008783561',
                'address_1' => 'Unit 1803 Tycoon Building ,Pearl Drive Ortigas Center',
                'city' => 'Pasig',
                'state' => 'Manila',
                'zip_code' => '1605',
                'country' => 'Philippines',
                'user_id' => 1,
                'logo' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        DB::table('companies')->insert($companies);
    }
}

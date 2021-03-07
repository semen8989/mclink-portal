<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->delete();
        $location = [
            [
                'id' => 1,
                'company_id' => 1,
                'location_name' => 'Sample Location',
                'email' => 'sample@mclinkgroup.com',
                'location_head' => 1,
                'city' => 'Pasig',
                'country' => 'Philippines',
                'zip_code' => '1605',
                'current_user_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        DB::table('locations')->insert($location);
    }
}

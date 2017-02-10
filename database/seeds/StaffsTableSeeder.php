<?php

use Illuminate\Database\Seeder;

class StaffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staffs')->insert([
            'person_id' => 1,
            'iris_id' => 1,
            'salon_id' => '1',
            'staff_role_id' => '1',
            'dob' => '',
            'working_hours_week' => 40,
            'holiday_entitlement' => 27,
            'active' => 1,
            'role' => 1
        ]);
        
        DB::table('staffs')->insert([
            'person_id' => 2,
            'iris_id' => 2,
            'salon_id' => '2',
            'staff_role_id' => '1',
            'dob' => '',
            'working_hours_week' => 40,
            'holiday_entitlement' => 27,
            'active' => 1,
            'role' => 1
        ]);
    }
}
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
            'first_name' => 'Adam',
            'second_name' => 'Carter',
            'address1' => '32 Glossop Close',
            'address2' => 'Warrington',
            'address3' => '',
            'postcode' => 'WA1 2GS',
            'email' => 'adam@jakatasalon.co.uk',
            'phone' => '',
            'mobile' => '07921806884',
            'iris_id' => 1,
            'salon_id' => '1',
            'dob' => '',
            'working_hours_week' => 40,
            'holiday_entitlement' => 27,
            'active' => 1,
            'role' => 1
        ]);
        
        DB::table('staffs')->insert([
            'first_name' => 'Jimmy',
            'second_name' => 'Sharpe',
            'address1' => '19 Some Road',
            'address2' => 'Orford',
            'address3' => 'Warrington',
            'postcode' => 'WA1 5SR',
            'email' => 'jimmy@jakatasalon.co.uk',
            'phone' => '',
            'mobile' => '07999555555',
            'iris_id' => 2,
            'salon_id' => '2',
            'dob' => '',
            'working_hours_week' => 40,
            'holiday_entitlement' => 27,
            'active' => 1,
            'role' => 2
        ]);
    }
}
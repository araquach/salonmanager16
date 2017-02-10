<?php

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->insert([
            'first_name' => 'Adam',
            'second_name' => 'Carter',
            'address1' => '32 Glossop Close',
            'address2' => 'Warrington',
            'address3' => '',
            'postcode' => 'WA1 2GS',
            'email' => 'adam@jakatasalon.co.uk',
            'phone' => '',
            'mobile' => '07921806884'
        ]);
        
        DB::table('people')->insert([
            'first_name' => 'Jimmy',
            'second_name' => 'Sharpe',
            'address1' => '19 Some Road',
            'address2' => 'Orford',
            'address3' => 'Warrington',
            'postcode' => 'WA1 5SR',
            'email' => 'jimy@jakatasalon.co.uk',
            'phone' => '',
            'mobile' => '07999555555'
        ]);
    }
}
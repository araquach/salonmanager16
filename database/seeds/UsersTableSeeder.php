<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Adam Carter',
            'username' => 'araquach',
            'password' => Hash::make('blonde123'),
            'remember_token' => null,
        ]);
        
        DB::table('users')->insert([
            'name' => 'Jimmy Sharpe',
            'username' => 'jimmy',
            'password' => Hash::make('jim123'),
            'remember_token' => null,
        ]);
    }
}
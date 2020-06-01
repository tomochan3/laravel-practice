<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name_emaildomain = [
            'Lucy'  =>  'lucy',
        ];

        // Users table
        for ($i = 2; $i <= 50; $i++) {
            DB::table('users')->insert([
                'id' => $i,
                'name' => "Lucy$i",
                'email' =>  "lucy$i".'@abc.com',
                'password' => Hash::make('password'),
            ]);
        }


    }
}

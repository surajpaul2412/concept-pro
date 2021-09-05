<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfUsers = \DB::table('users')->count();

    	if($numberOfUsers == 0)
    	{
    		DB::table('users')->insert([
    			'role_id' => '1',
	        	'name' => 'Admin',
	        	'email' => 'admin@concept.pro',
	        	'phone' => '1234567890',
	        	'password' => bcrypt('test1234'),
	        ]);
    	}
    }
}

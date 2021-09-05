<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\carbon;

class TestimonialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfItems = \DB::table('testimonials')->count();

    	if($numberOfItems == 0)
    	{
    		DB::table('testimonials')->insert([
	        	'name' => 'Robert Woodford',
	        	'designation' => 'Director Marketing Junction',
	        	'review' => '"Concept Pro helped me greatly. I needed a wide range of equipment to keep my company secure and they were more than happy to help. Now I can rest easy knowing my company is being surveyed by cutting edge equipemnt"',
	        	'status' => 1,
	        	'avatar' => 'avatar/1.jpg',
	        	'created_at' => Carbon::now(),
	        	'updated_at' => Carbon::now()
	        ]);
    	}
    }
}

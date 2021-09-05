<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\carbon;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfCategories = \DB::table('categories')->count();

    	if($numberOfCategories == 0)
    	{
    		DB::table('categories')->insert([
	        	'name' => 'New Releases',
	        	'image' => 'products/p-1.jpg',
	        	'slug' => 'new_release',
	        	'order' => 1,
	        	'created_at' => Carbon::now(),
	        	'updated_at' => Carbon::now()
	        ]);
	        DB::table('categories')->insert([
	        	'name' => 'Cameras',
	        	'image' => 'products/p-2.jpg',
	        	'slug' => 'cameras',
	        	'order' => 2,
	        	'created_at' => Carbon::now(),
	        	'updated_at' => Carbon::now()
	        ]);
	        DB::table('categories')->insert([
	        	'name' => 'Recorders',
	        	'image' => 'products/p-3.jpg',
	        	'slug' => 'recorders',
	        	'order' => 3,
	        	'created_at' => Carbon::now(),
	        	'updated_at' => Carbon::now()
	        ]);
	        DB::table('categories')->insert([
	        	'name' => 'Deep Learning Plus',
	        	'image' => 'products/p-4.jpg',
	        	'slug' => 'deep_learning_plus',
	        	'order' => 4,
	        	'created_at' => Carbon::now(),
	        	'updated_at' => Carbon::now()
	        ]);
	        DB::table('categories')->insert([
	        	'name' => 'ColourSmart',
	        	'image' => 'products/p-5.jpg',
	        	'slug' => 'colourSmart',
	        	'order' => 5,
	        	'created_at' => Carbon::now(),
	        	'updated_at' => Carbon::now()
	        ]);
	        DB::table('categories')->insert([
	        	'name' => 'Rapid Deployment Towers',
	        	'image' => 'products/p-6.jpg',
	        	'slug' => 'rapid_deployment_towers',
	        	'order' => 6,
	        	'created_at' => Carbon::now(),
	        	'updated_at' => Carbon::now()
	        ]);	        
	        DB::table('categories')->insert([
	        	'name' => 'Accessories',
	        	'image' => 'products/p-7.jpg',
	        	'slug' => 'accessories',
	        	'order' => 7,
	        	'created_at' => Carbon::now(),
	        	'updated_at' => Carbon::now()
	        ]);
	        DB::table('categories')->insert([
	        	'name' => 'Training',
	        	'image' => 'products/p-8.jpg',
	        	'slug' => 'training',
	        	'order' => 8,
	        	'created_at' => Carbon::now(),
	        	'updated_at' => Carbon::now()
	        ]);
    	}
    }
}

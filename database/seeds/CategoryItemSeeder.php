<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\carbon;

class CategoryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfCategoryItems = \DB::table('category_items')->count();

        if($numberOfCategoryItems == 0)
        {
            DB::table('category_items')->insert([
                'category_id' => 2,
                'name' => 'AHD Cameras',
                'image' => 'products/p-1.jpg',
                'slug' => 'ahd_cameras',
                'order' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            DB::table('category_items')->insert([
                'category_id' => 2,
                'name' => 'IP Cameras',
                'image' => 'products/p-1.jpg',
                'slug' => 'ip_cameras',
                'order' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            DB::table('category_items')->insert([
                'category_id' => 3,
                'name' => 'IP – NVR’s',
                'image' => 'products/p-1.jpg',
                'slug' => 'IP_NVRs',
                'order' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            DB::table('category_items')->insert([
                'category_id' => 3,
                'name' => 'AHD – DVR’s',
                'image' => 'products/p-1.jpg',
                'slug' => 'AHD_DVRs',
                'order' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            DB::table('category_items')->insert([
                'category_id' => 7,
                'name' => 'Monitors',
                'image' => 'products/p-1.jpg',
                'slug' => 'monitors',
                'order' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            DB::table('category_items')->insert([
                'category_id' => 7,
                'name' => 'Test Monitor',
                'image' => 'products/p-1.jpg',
                'slug' => 'test_monitor',
                'order' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            DB::table('category_items')->insert([
                'category_id' => 8,
                'name' => 'Our Training Facilities',
                'image' => 'products/p-1.jpg',
                'slug' => 'our_training_facilities',
                'order' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            DB::table('category_items')->insert([
                'category_id' => 8,
                'name' => 'On-Site Training',
                'image' => 'products/p-1.jpg',
                'slug' => 'on_site_training',
                'order' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            DB::table('category_items')->insert([
                'category_id' => 8,
                'name' => 'Courses available',
                'image' => 'products/p-1.jpg',
                'slug' => 'courses_available',
                'order' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            DB::table('category_items')->insert([
                'category_id' => 8,
                'name' => 'Contact our training team',
                'image' => 'products/p-1.jpg',
                'slug' => 'contact_our_training_team',
                'order' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

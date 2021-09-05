<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\carbon;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Product Seeder
        $numberOfProducts = \DB::table('products')->count();
        if($numberOfProducts == 0)
        {
            DB::table('products')->insert([
                'category_id' => 2,
                'categoryItem_id'=> 1,
                'name' => 'Concept Pro 5MP AHD Varifocal Lens Eyeball Camera',
                'SKU' => 'CVP9328DNIRLL-AHD5M',
                'slug' => 'Concept_Pro_5MP',
                'meta_title'=> '',
                'meta_keyword'=> '',
                'meta_desc'=> '',
                'description'=> '<ul style="padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; list-style: outside none none; color: rgb(123, 123, 123); font-family: &quot;ARS Maquette Pro&quot;; font-size: 16px;"><li>5MP</li><li>20fps</li><li>4-in-1 (AHD/TVI/CVI/CVBS)</li><li>3.3 - 13.5mm Varifocal Lens</li><li>Up to 40m IR Illumination</li><li>Enhanced Low Light</li><li>Dimensions: Ø120 x 105.5mm</li><li>Compatible with all Concept Pro Lite,</li><li>Professional &amp; Elite Digital Video Recorders</li><li>IP66 Rated</li></ul>',
                'overview' => '<p class="txt-green" style="margin-bottom: 15px; font-size: 16px; color: rgb(83, 170, 185); font-family: &quot;ARS Maquette Pro&quot;;">oncept Pro 5MP AHD Varifocal Lens Eyeball Camera CVP9328DNIRLL-AHD5M (White) &amp; CVP9328DNIRLL-AHD5M-G (Grey)</p><p style="margin-bottom: 15px; font-size: 16px; color: rgb(123, 123, 123); font-family: &quot;ARS Maquette Pro&quot;;">The Concept Pro 5MP AHD Varifocal Lens Eyeball Camera (CVP9328DNIRLL-AHD5M) White and (CVP9328DNIRLL-AHD5M-G) Grey are professional 5-megapixel, external eyeball cameras with manual 3.3–13.5mm varifocal lenses and extended infrared illumination range. With a 4-in-1 selectable analogue output, IP66-rated metal housing, and true day &amp; night ICR, this camera is suitable for a wide variety of installation environments.</p><h5 style="margin-top: 0px; margin-bottom: 0.5rem; font-weight: 600; line-height: 1.2; font-size: 18px; font-family: &quot;Proxima Nova&quot;; color: rgb(123, 123, 123);">True Day &amp; Night ICR</h5><p style="margin-bottom: 15px; font-size: 16px; color: rgb(123, 123, 123); font-family: &quot;ARS Maquette Pro&quot;;">This camera utilises a physical infrared cut filter to provide true colour images in daylight and automatically switch the high-powered IR LEDs on at night for clear black and white images.</p><h5 style="margin-top: 0px; margin-bottom: 0.5rem; font-weight: 600; line-height: 1.2; font-size: 18px; font-family: &quot;Proxima Nova&quot;; color: rgb(123, 123, 123);">Four-in-one Solution</h5><p style="font-size: 16px; color: rgb(123, 123, 123); font-family: &quot;ARS Maquette Pro&quot;;">Don"t be tied down to any single analogue platform. With Concept Pro 4-in-1 cameras you have the freedom to install whichever CCTV platform you like, whether you install AHD, TVI, CVI or traditional analogue systems.</p>',
                'image' => 'products/MRg3sfSfXyoYQtqtbmkUiYfuvVUwmecgSGGeL5J1.jpg',
                'order' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        // Banner Seeder
        $numberOfBanner = \DB::table('banners')->count();
        if($numberOfBanner == 0)
        {
            DB::table('banners')->insert([
                'heading' => '<h1 class="text-uppercase wow fadeInLeft">
                                                This is not <br />
                                                just CCTV <br />
                                                It"s so much <br />
                                                more
                                            </h1>',
                'sub_heading'=> 'Concept Pro "Product Name"',
                'btn_url' => '',
                'image' => 'banner/slide1/1.png',
                'bg' => 'banner/slide1/slide-bg.jpg',
                'url'=> 'Pro Cam Range',
                'order' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            DB::table('banners')->insert([
                'heading' => '<h1 class="text-uppercase text-center text-md-start wow fadeInLeft">
                                            PROTECT YOUR<br /> 
                                            STAFF & YOUR<br />
                                            BUSINESS WITH<br />
                                            MODERN TECH<br />
                                            </h1>',
                'sub_heading'=> 'Concept Pro "Product Name"',
                'btn_url' => '',
                'image' => 'banner/slide2/1.png',
                'bg' => 'banner/slide2/slide-bg.jpg',
                'url'=> 'Pro Cam Range',
                'order' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            DB::table('banners')->insert([
                'heading' => '<h1 class="text-uppercase wow fadeInLeft">
                                                This is not <br />
                                                just CCTV <br />
                                                It"s so much <br />
                                                more
                                            </h1>',
                'sub_heading'=> 'Concept Pro "Product Name"',
                'btn_url' => '',
                'image' => 'banner/slide3/1.png',
                'bg' => 'banner/slide3/slide-bg.jpg',
                'url'=> 'Pro Cam Range',
                'order' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

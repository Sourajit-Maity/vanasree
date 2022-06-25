<?php

namespace Database\Seeders;
use App\Models\Pages;
use App\Models\Aboutpage;
use Illuminate\Database\Seeder;

class AboutPageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cms = Pages::whereSlug('about_page')->first();
        $datas = [
            "pages_id" => $cms->id,
            "title" => "About Us",

            "banner_background_image" => "welcome_assets/images/banner-image.jpg",

            "banner_image" => "welcome_assets/images/about-banner-2.png", 

            "content_heading" => "Badges Ar e Our Passion",
            "content_sub_heading" => "BADGES ARE OUR PASSION",
			"content_text" => "Badges may be small, but they are big to us. With their years of",
            "content_heading1" => "Badges Ar e Our Passion",			
			"content_image1" => "welcome_assets/images/passion-image2.png",


			

        ];
        Aboutpage::create($datas);
    }
}

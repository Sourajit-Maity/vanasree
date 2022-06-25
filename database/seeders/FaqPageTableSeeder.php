<?php

namespace Database\Seeders;
use App\Models\Pages;
use App\Models\Faqpage;
use Illuminate\Database\Seeder;

class FaqPageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cms = Pages::whereSlug('faq_page')->first();
        $datas = [
            "pages_id" => $cms->id,

            "banner_background_image" => "welcome_assets/images/banner-image.jpg",
            
            "banner_image" => "welcome_assets/images/Faq-banner-image.png",

            "content_heading" => "FAQ",

        ];
        Faqpage::create($datas);
    }
}

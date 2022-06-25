<?php

namespace Database\Seeders;
use App\Models\Pages;
use App\Models\Contactuspage;
use Illuminate\Database\Seeder;

class ContactPageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cms = Pages::whereSlug('contact_page')->first();
        $datas = [
            "pages_id" => $cms->id,
            "title" => "Contact Us",

            "banner_background_image" => "welcome_assets/images/banner-image.jpg",

            "banner_image" => "welcome_assets/images/contact-banner-image.png",

            "content_heading" => "Comments, questions",
            
            "content_text" => "Comments, questions, and concerns are always welcome. Drop us a line and one
            of our friendly customer service representatives will get back to you.",

            "content_image" => "welcome_assets/images/conatct-image.png",

        ];
        Contactuspage::create($datas);
    }
}

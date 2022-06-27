<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    use HasFactory;
    protected $fillable = [
        'cms_id',
        'main_banner_heading',
        'banner_background_image',
        'banner_badge_image',
        'banner_heading',
        'banner_sub_heading',       
        'content1_heading',
        'content1_text',
        'content1_image',
        'content2_heading',
        'content2_text',
        'content2_image',
        'content3_heading',
        'content3_text',
        'content3_image',
        'content2_option_heading1',
        'content2_option_text1',
        'content2_option_image1',
        'content2_option_image2',
        'content2_option_heading2',
        'content2_option_text2',
        'content2_option_image22',
        'content2_option_image3',
        'content2_option_image4',
        'content2_option_image5',
        'content2_option_image6',
        'content2_option_image7',
        'content2_option_image8',
        'content2_option_image9',
        'content2_option_image10',
        'logo',

        'banner_main_image',
        'banner_setup_image',
        'setup_image',

        'active',
    ];

    public function cms(){
        return $this->belongsTo(Pages::class);
    }
}

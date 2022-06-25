<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    use HasFactory;
    protected $fillable = [
        'cms_id',
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
        'logo',
        'active',
    ];

    public function cms(){
        return $this->belongsTo(Pages::class);
    }
}

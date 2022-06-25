<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faqpage extends Model
{
    use HasFactory;
    protected $fillable = [
        'cms_id',
        'banner_background_image',
        'banner_image',
        'content_heading',
        'content_sub_heading',
        'content_text',
    ];

    public function cms(){
        return $this->belongsTo(Pages::class);
    }
}

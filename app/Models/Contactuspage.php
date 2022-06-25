<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactuspage extends Model
{
    use HasFactory;
    protected $fillable = [
        'cms_id',
        'title',
        'banner_background_image',
        'banner_image',
        'content_heading',
        'content_image',
        'content_text',
    ];

    public function cms(){
        return $this->belongsTo(Pages::class);
    }
}

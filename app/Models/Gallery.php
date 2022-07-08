<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable; 
class Gallery extends Model
{

    use HasFactory;
    use Sluggable;
    protected $fillable = ['gallery_name','gallery_name_slug','gallery_photo_path','gallery_description','active'];
    
    public function sluggable(): array
    {
        return [
            'gallery_name_slug' => [
                'source' => 'gallery_name'
            ]
        ];
    }
    public function design()
    {
        return $this->hasMany(Design::class);
    }
}

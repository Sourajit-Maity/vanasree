<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable; 
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Support\Facades\URL;
class Design extends Model implements HasMedia
{
    use HasFactory;
    use Sluggable;
    use HasMediaTrait;
    protected $fillable = ['design_name','gallery_id','design_name_slug','design_photo_path','design_order','design_description','user_id','active'];
    
   

    public function sluggable(): array
    {
        return [
            'design_name_slug' => [
                'source' => 'design_name'
            ]
        ];
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function getImagePathAttribute(){
        return !empty("{$this->design_photo_path}") ? URL::to('storage/' . "{$this->design_photo_path}") : '';
    }
    public function gallery(){
        return $this->belongsTo(Gallery::class,'gallery_id');
    }
}

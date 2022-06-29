<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable; 
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
class Mom extends Model implements HasMedia
{
    use HasFactory;
    use Sluggable;
    use HasMediaTrait;
    protected $fillable = ['mom_number','mom_name','mom_date','mom_time','mom_name_slug','mom_description','mom_photo_path','user_id','active'];

    
    public function sluggable(): array
    {
        return [
            'mom_name_slug' => [
                'source' => 'mom_name'
            ]
        ];
    }
  
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    protected $casts = [
        'mom_date' => 'datetime:d/m/Y',

    ];
}

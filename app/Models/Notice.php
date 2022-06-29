<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable; 
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
class Notice extends Model implements HasMedia 
{
    use HasFactory;
    use Sluggable;
    use HasMediaTrait;
    protected $fillable = ['notice_number','notice_name','notice_date','notice_time','notice_name_slug','notice_description','notice_photo_path','user_id','active'];

    
    public function sluggable(): array
    {
        return [
            'notice_name_slug' => [
                'source' => 'notice_name'
            ]
        ];
    }
  
    public function user(){
        return $this->belongsTo(User::class);
    }
    protected $casts = [
        'notice_date' => 'datetime:d/m/Y',

    ];
   
}

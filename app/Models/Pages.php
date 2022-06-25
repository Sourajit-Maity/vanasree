<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug'
    ];

    public function home()
    {
        return $this->hasOne(Homepage::class);
    }

    public function about()
    {
        return $this->hasOne(Aboutpage::class);
    }

    public function contact()
    {
        return $this->hasOne(Contactuspage::class);
    }
    public function faq()
    {
        return $this->hasOne(Faqpage::class);
    }
}

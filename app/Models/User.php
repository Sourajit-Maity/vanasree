<?php

namespace App\Models;

use App\Models\Traits\HasProfilePhoto;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Vinkla\Hashids\Facades\Hashids;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Laravel\Cashier\Billable;
use Cviebrock\EloquentSluggable\Sluggable; 

class User extends Authenticatable implements HasMedia
{
    use HasMediaTrait;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use Billable;
    use Sluggable;


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'full_name', 'role_name', 'profile_photo_url', 'cover_photo_url', 'resume_url'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'first_name',
        'last_name',
        'company_name',
        'email',
        'nick_name',
        'username',
        'phone',
        'password',
        'address',
        'otp',
        'referrer_id',
        'profile_photo_path',
        'refer_code',
        'referrer_id',
        'country_name',
        'country_id',
        'state_id',
        'state_name',
        'city_id',
        'city_name',
        'zipcode',
        'otp',
        'otp_verified_at',
        'last_latitude',
        'last_longitude',
        'device_token',
        'wallet_balance',
        'stripe_customer_id',
        'active',
        'address',
        'social_id',
        'social_account_type',
        'resume_path',
        'date_of_birth',
        'cover_photo_path',
        'tower_number',
        'flat_number',
        'first_login'


    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];
    public function sluggable(): array
    {
        return [
            'username' => [
                'source' => 'last_name'.'flat_number'
            ]
        ];
    }
    public function getCoverPhotoUrlAttribute()
    {
        return !empty("{$this->cover_photo_path}") ? url()->to('storage/' . "{$this->cover_photo_path}") : '';
    }

    public function getResumeUrlAttribute()
    {
        return !empty("{$this->resume_path}") ? url()->to('storage/' . "{$this->resume_path}") : '';
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getRoleNameAttribute()
    {
        if ($this->roles()->exists())
            return $this->roles()->first()->name;
        else
            return 0;
    }
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
    public function getUserNameAttribute()
    {
        return "{$this->last_name}{$this->flat_number}";
    }
    public function decryptedId($id)
    {
        return count(Hashids::decode($id)) > 0 ? Hashids::decode($id)[0] : null;
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }


    public function language()
    {
        return $this->hasMany(NurseLanguages::class);
    }

    public function securityquestion()
    {
        return $this->hasOne(SecurityQuestion::class);
    }
    public function usernotice()
    {
        return $this->hasMany(Notice::class,'user_id');
    }
    public function mom()
    {
        return $this->hasMany(Mom::class);
    }
}

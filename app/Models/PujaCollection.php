<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PujaCollection extends Model
{
    use HasFactory;
    public function getStatusAttribute($value)
    {
        $type = '';
        if ($value == 1) {
            $type = 'Due';
        }
        if ($value == 2) {
            $type = 'Paid';
        }
        if ($value == 3) {
            $type = 'NotGiven';
        }

        return $type;
    }

    protected $fillable = [
        'user_id',
        'additional_instructions',
        'bill_post_date',
        'bill_payment_date',
        'payment_status',
        'cancelled_by',
        'cancellation_reason',
        'cancellation_comment',
        'cancelled_at',
        'active',
        'promo_code',
        'discount_amount',
        'reward_discount_amount',
        'cancellation_charge',
        'total_amount',
        'year',
        'month',
        'bill_no',
        'payment_type'

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

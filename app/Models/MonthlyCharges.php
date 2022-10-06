<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyCharges extends Model
{
    use HasFactory;
    public function getStatusAttribute($value)
    {
        $status = '';
        if ($value == 1) {
            $status = 'In Progress';
        }
        if ($value == 2) {
            $status = 'Completed';
        }
        if ($value == 3) {
            $status = 'Failed';
        }
      
        return $status;
    
    }
    protected $fillable = [
    	'user_id',
        'received_by_id',
        'bill_post_date',
        'bill_payment_date',
        'payment_status',
        'service_charge',
        'security_charge',
        'electricity_charge',
        'water_charge',
        'maintainence_charge',
        'other_expenses_charge',
        'discount_amount',
        'total_amount',
        'year',
        'month',
        'bill_no',
        'payment_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class,'received_by_id');
    }


}

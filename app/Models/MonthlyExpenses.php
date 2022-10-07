<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyExpenses extends Model
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
        'receiver_name',
        'bill_post_date',
        'bill_payment_date',
        'payment_status',
        'charges_name',
        'charge_amount',
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
}

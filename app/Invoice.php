<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'staff_id',
        'customer_id',
        'total_price',
        'paid_amount',
        'date',
    ];

    //Staff
    public function staff(){
        return $this->belongsTo(User::class ,'staff_id', 'id');
    }

    //Customer
    public function customer(){
        return $this->belongsTo(Customer::class ,'customer_id', 'id');
    }

    //Sale
    public function sale(){
        return $this->hasMany(Sale::class ,'invoice_id', 'id');
    }
}

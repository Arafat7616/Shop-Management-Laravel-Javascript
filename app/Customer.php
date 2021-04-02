<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'phone',
    ];

    //Invoice
    public function invoice(){
        return $this->hasMany(Invoice::class,'customer_id', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use SoftDeletes;

    protected $fillable = [
    'invoice_id',
    'item_id',
    'quantity',
    'price',
    ];

    //Invoice
    public function invoice(){
        return $this->belongsTo(Invoice::class,'invoice_id', 'id');
    }

    //Item
    public function item(){
        return $this->belongsTo(Item::class,'item_id', 'id');
    }

}

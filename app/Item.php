<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'image',
        'name',
        'quantity',
        'buy_price',
        'sell_price',
    ];

    //Sale
    public function sale(){
        return $this->hasMany(Sale::class, 'item_id','id');
    }
}

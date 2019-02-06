<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function order_details(){
        return $this->hasMany('App\OrderDetails', 'order_id');
    }

    public function shipping(){
        return $this->hasMany('App\Shipping', 'order_id');
    }
}

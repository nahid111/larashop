<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'order_details';
    public $primaryKey = 'id';
    public $timestamps = true;


    public function order(){
        return $this->belongsTo('App\Order');
    }
}

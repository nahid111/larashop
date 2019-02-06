<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'shippings';
    public $primaryKey = 'id';
    public $timestamps = true;


    public function order(){
        return $this->belongsTo('App\Order');
    }
}

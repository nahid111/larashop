<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function category(){

        return $this->belongsTo('App\Category');
    }

    public function brand(){

        return $this->belongsTo('App\Brand');
    }

}



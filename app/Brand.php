<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    // Table Name
    protected $table = 'brands';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;


    public function products(){

        return $this->hasMany('App\Product', 'brand_id');
    }
}

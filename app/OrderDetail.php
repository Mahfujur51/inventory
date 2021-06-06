<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $fillable=['order_id','product_id','quantity','unit_cost','total'];
    public  function  product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}

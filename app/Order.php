<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable=['customer_id','order_date','order_status','total_products','sub_total','vat','total','payment_status','pay','due'];

    public  function  customer(){
       return $this->belongsTo(Customer::class,'customer_id','id');
    }
    public  function orderdetails(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }

}

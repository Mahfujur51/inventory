<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable=['customer_id','order_date','order_status','total_products','sub_total','vat','total','payment_status','pay','due'];
}

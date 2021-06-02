<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable=['name','category_id','supplier_id','product_code','product_place','product_route','image','buy_date','expire_date','buying_price','selling_price'];
}

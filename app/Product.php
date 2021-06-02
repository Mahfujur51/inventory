<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable=['name','category_id','supplier_id','product_code','product_place','product_route','image','buy_date','expire_date','buying_price','selling_price'];
   public  function  supplier(){
       return $this->belongsTo(Supplier::class,'supplier_id','id');
   }
    public  function  category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}

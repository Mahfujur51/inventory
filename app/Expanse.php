<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expanse extends Model
{
   protected $fillable=['details','amount','month','date','year'];
}

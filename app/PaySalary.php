<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaySalary extends Model
{
    protected $fillable=['employee_id','month','year','status','paid_salary'];

    public  function  employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }
}

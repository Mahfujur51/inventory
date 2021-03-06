<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable=['employee_id','month','year','status','advance_salary'];
    public  function  employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }
}

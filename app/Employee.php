<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable=['name','email','phone','address','experience','photo','salary','vacation','city'];
public function salaries()
{
    return $this->hasMany(Salary::class,'employee_id','id');
}
}

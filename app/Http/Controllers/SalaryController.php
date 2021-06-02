<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Salary;
use App\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SalaryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function  index(){
        $salaries=Salary::all();
        return view('salary.index',compact('salaries'));
    }
    public function  add(){
        $employees=Employee::all();
        return view('salary.add',compact('employees'));
    }
    public function  store(Request $request){
        $request->validate([
            'employee_id'=>'required',
            'month'=>'required',
            'year'=>'required',

        ]);
        $month=$request->month;
        $employee_id=$request->employee_id;
        $salary_check=Salary::Where('month',$month)->where('employee_id',$employee_id)->first();

        if ($salary_check){
            return redirect()->route('salary.index')->with('warning','Already Advance Paid');
        }else{
            $salary= new Salary();
            $salary->employee_id=$request->employee_id;
            $salary->month=$request->month;
            $salary->year=$request->year;
            $salary->advance_salary=$request->advance_salary;
            $salary->save();
            return redirect()->route('salary.index')->with('success','Salary Insert Success');

        }

    }
    public  function  view($id){
        $salary=Salary::findOrFail($id);
        return view('salary.view_supplier',compact('salary'));
    }
    public function delete($id){
        $salary=Salary::findOrFail($id);

        $salary->delete();
        return redirect()->back()->with('info','Salary Deleted Successfully !!');
    }
    public  function edit($id){
        $salary=Salary::findOrFail($id);
        $employees=Employee::all();
        return view('salary.edit',compact('salary','employees'));
    }
    public  function  update(Request $request,$id){
        $request->validate([
            'employee_id'=>'required',
            'month'=>'required',
            'year'=>'required',

        ]);

        $salary= Salary::findOrFail($id);
        $salary->employee_id=$request->employee_id;
        $salary->month=$request->month;
        $salary->year=$request->year;
        $salary->advance_salary=$request->advance_salary;
        $salary->update();

        return redirect()->route('salary.index')->with('success','Salary Insert Success');
    }
    public  function  pay_salary(){
        $employees=Employee::all();
        return view('salary.pay_salary',compact('employees'));
    }
}

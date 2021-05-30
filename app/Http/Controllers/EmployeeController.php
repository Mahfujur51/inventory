<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Utils;

class EmployeeController extends Controller
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
        $employees=Employee::all();
        return view('employee.index',compact('employees'));
    }
    public function  add(){
        return view('employee.add');
    }
    public function  store(Request $request){
     $request->validate([
        'name'=>'required|max:50|min:6',
        'email'=>'required|unique:employees',
        'phone'=>'required|unique:employees',
        'address'=>'required|max:60',
        'experience'=>'required|max:60',
        'salary'=>'required|max:60',
        'vacation'=>'required|max:60',
        'city'=>'required|max:60',
        'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

     ]);
//     dd($request->all());
     $employee=new Employee();
     $employee->name=$request->name;
     $employee->email=$request->email;
     $employee->phone=$request->phone;
     $employee->address=$request->address;
     $employee->experience=$request->experience;
     $employee->salary=$request->salary;
     $employee->vacation=$request->vacation;
     $employee->city=$request->city;
     if($request->has('photo')){
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,270)->save('employee/'.$name_gen);
            $image_url = $name_gen;
        }
     $employee->photo = $image_url;
     $employee->save();
     return redirect()->route('employee.index')->with('info','Employee Insert Success');

    }
    public  function  view($id){
        $employee=Employee::findOrFail($id);
        return view('employee.view-employee',compact('employee'));
    }
    public function delete($id){
        $employee=Employee::findOrFail($id);
        $image='employee/'.$employee->photo;
        unlink($image);
        $employee->delete();
        return redirect()->back()->with('info','Employee Deleted Successfully');
    }
    public  function edit($id){
        $employee=Employee::findOrFail($id);
        return view('employee.edit',compact('employee'));
    }
    public  function  update(Request $request,$id){
        $request->validate([
            'name'=>'required|max:50|min:6',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required|max:60',
            'experience'=>'required|max:60',
            'salary'=>'required|max:60',
            'vacation'=>'required|max:60',
            'city'=>'required|max:60',
            'photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $employee=Employee::findOrFail($id);
        $old_image='employee/'.$employee->photo;
        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->phone=$request->phone;
        $employee->address=$request->address;
        $employee->experience=$request->experience;
        $employee->salary=$request->salary;
        $employee->vacation=$request->vacation;
        $employee->city=$request->city;
        if($request->has('photo')){
            unlink($old_image);
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,270)->save('employee/'.$name_gen);
            $image_url = $name_gen;
            $employee->photo = $image_url;
        }
        $employee->update();
        return redirect()->route('employee.index')->with('success','Employee Added Successfully');

    }

}

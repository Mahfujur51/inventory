<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
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
        $customers=Customer::all();
        return view('customer.index',compact('customers'));
    }
    public function  add(){
        return view('customer.add');
    }
    public function  store(Request $request){
        $request->validate([
            'name'=>'required|max:50|min:6',
            'email'=>'required|unique:customers',
            'phone'=>'required|unique:customers',
            'address'=>'required|max:60',
            'shopname'=>'required|max:60',
            'bank_name'=>'required|max:60',
            'account_number'=>'required|max:60',
            'account_holder'=>'required|max:60',
            'bank_branch'=>'required|max:60',
            'city'=>'required|max:60',
            'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $customer= new Customer();
        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->phone=$request->phone;
        $customer->address=$request->address;
        $customer->shopname=$request->shopname;
        $customer->bank_name=$request->bank_name;
        $customer->account_number=$request->account_number;
        $customer->account_holder=$request->account_holder;
        $customer->bank_branch=$request->bank_branch;
        $customer->city=$request->city;
        if($request->has('photo')){
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,270)->save('customer/'.$name_gen);
            $image_url = $name_gen;
        }
        $customer->photo = $image_url;
        $customer->save();
        return redirect()->route('customer.index')->with('info','Customer Insert Success');

    }
    public  function  view($id){
        $customer=Customer::findOrFail($id);
        return view('customer.view_customer',compact('customer'));
    }
    public function delete($id){
        $customer=Customer::findOrFail($id);
        $image='customer/'.$customer->photo;
        unlink($image);
        $customer->delete();
        return redirect()->back()->with('info','Customer Deleted Successfully !!');
    }
    public  function edit($id){
        $customer=Customer::findOrFail($id);
        return view('customer.edit',compact('customer'));
    }
    public  function  update(Request $request,$id){
        $request->validate([
            'name'=>'required|max:50|min:6',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required|max:60',
            'shopname'=>'required|max:60',
            'bank_name'=>'required|max:60',
            'account_number'=>'required|max:60',
            'account_holder'=>'required|max:60',
            'bank_branch'=>'required|max:60',
            'city'=>'required|max:60',
            'photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $customer= Customer::findOrFail($id);
        $image='customer/'.$customer->photo;
        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->phone=$request->phone;
        $customer->address=$request->address;
        $customer->shopname=$request->shopname;
        $customer->bank_name=$request->bank_name;
        $customer->account_number=$request->account_number;
        $customer->account_holder=$request->account_holder;
        $customer->bank_branch=$request->bank_branch;
        $customer->city=$request->city;
        if($request->has('photo')){
            unlink($image);
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,270)->save('customer/'.$name_gen);
            $image_url = $name_gen;
            $customer->photo = $image_url;
        }
        $customer->update();
        return redirect()->route('customer.index')->with('success','Customer Insert Success');

    }

}

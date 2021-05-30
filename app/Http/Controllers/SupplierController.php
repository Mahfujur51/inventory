<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SupplierController extends Controller
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
        $suppliers=Supplier::all();
        return view('supplier.index',compact('suppliers'));
    }
    public function  add(){
        return view('supplier.add');
    }
    public function  store(Request $request){
        $request->validate([
            'name'=>'required|max:50|min:6',
            'email'=>'required|unique:suppliers',
            'phone'=>'required|unique:suppliers',
            'address'=>'required|max:60',
            'shopname'=>'required|max:60',
            'bank_name'=>'required|max:60',
            'type'=>'required',
            'account_number'=>'required|max:60',
            'account_holder'=>'required|max:60',
            'bank_branch'=>'required|max:60',
            'city'=>'required|max:60',
            'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $supplier= new Supplier();
        $supplier->name=$request->name;
        $supplier->email=$request->email;
        $supplier->phone=$request->phone;
        $supplier->address=$request->address;
        $supplier->shopname=$request->shopname;
        $supplier->bank_name=$request->bank_name;
        $supplier->type=$request->type;
        $supplier->account_number=$request->account_number;
        $supplier->account_holder=$request->account_holder;
        $supplier->bank_branch=$request->bank_branch;
        $supplier->city=$request->city;
        if($request->has('photo')){
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,270)->save('supplier/'.$name_gen);
            $image_url = $name_gen;
        }
        $supplier->photo = $image_url;
        $supplier->save();
        return redirect()->route('supplier.index')->with('success','Supplier Insert Success');

    }
    public  function  view($id){
        $supplier=Supplier::findOrFail($id);
        return view('supplier.view_supplier',compact('supplier'));
    }
    public function delete($id){
        $supplier=Supplier::findOrFail($id);
        $image='supplier/'.$supplier->photo;
        unlink($image);
        $supplier->delete();
        return redirect()->back()->with('info','Supplier Deleted Successfully !!');
    }
    public  function edit($id){
        $supplier=Supplier::findOrFail($id);
        return view('supplier.edit',compact('supplier'));
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

        $supplier= Supplier::findOrFail($id);
        $image='supplier/'.$supplier->photo;
        $supplier->name=$request->name;
        $supplier->email=$request->email;
        $supplier->phone=$request->phone;
        $supplier->address=$request->address;
        $supplier->shopname=$request->shopname;
        $supplier->bank_name=$request->bank_name;
        $supplier->account_number=$request->account_number;
        $supplier->account_holder=$request->account_holder;
        $supplier->bank_branch=$request->bank_branch;
        $supplier->type=$request->type;
        $supplier->city=$request->city;
        if($request->has('photo')){
            unlink($image);
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,270)->save('customer/'.$name_gen);
            $image_url = $name_gen;
            $supplier->photo = $image_url;
        }
        $supplier->update();
        return redirect()->route('supplier.index')->with('success','Supplier Updated Successfully!!');

    }

}

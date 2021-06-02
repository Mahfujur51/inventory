<?php

namespace App\Http\Controllers;

use App\Category;
use App\Employee;
use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
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
        $products=Product::all();
        return view('product.index',compact('products'));
    }
    public function  add(){
        return view('product.add');
    }
    public function  store(Request $request){
//        $request->validate([
//            'name'=>'required|max:50|min:6',
//            'email'=>'required|unique:products',
//            'phone'=>'required|unique:products',
//            'address'=>'required|max:60',
//            'experience'=>'required|max:60',
//            'salary'=>'required|max:60',
//            'vacation'=>'required|max:60',
//            'city'=>'required|max:60',
//            'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//
//        ]);

        $product=new Product();
        $product->name=$request->name;
        $product->category_id=$request->category_id;
        $product->supplier_id=$request->supplier_id;
        $product->product_code=$request->product_code;
        $product->product_place=$request->product_place;
        $product->product_route=$request->product_route;
        $product->buy_date=$request->buy_date;
        $product->expire_date=$request->expire_date;
        $product->buying_price=$request->buying_price;
        $product->selling_price=$request->selling_price;
        if($request->has('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,270)->save('product/'.$name_gen);
            $image_url = $name_gen;
        }
        $product->image = $image_url;
        $product->save();
        return redirect()->route('product.index')->with('info','Product Insert Success');

    }
    public  function  view($id){
        $product=Employee::findOrFail($id);
        return view('product.view-product',compact('product'));
    }
    public function delete($id){
        $product=Employee::findOrFail($id);
        $image='product/'.$product->photo;
        unlink($image);
        $product->delete();
        return redirect()->back()->with('info','Employee Deleted Successfully');
    }
    public  function edit($id){
        $product=Employee::findOrFail($id);
        return view('product.edit',compact('product'));
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
        $product=Employee::findOrFail($id);
        $old_image='product/'.$product->photo;
        $product->name=$request->name;
        $product->email=$request->email;
        $product->phone=$request->phone;
        $product->address=$request->address;
        $product->experience=$request->experience;
        $product->salary=$request->salary;
        $product->vacation=$request->vacation;
        $product->city=$request->city;
        if($request->has('photo')){
            unlink($old_image);
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,270)->save('product/'.$name_gen);
            $image_url = $name_gen;
            $product->photo = $image_url;
        }
        $product->update();
        return redirect()->route('product.index')->with('success','Employee Added Successfully');

    }

}

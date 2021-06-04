<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Gloudemans\Shoppingcart\Facades\Cart;

class PosController extends Controller
{
    //
    public  function  pos(){
        $categories=Category::all();
        $products=Product::all();
        $customers=Customer::all();
        return view('pos.index',compact('products','categories','customers'));
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
        return redirect()->back()->with('success','Customer Insert Success');

    }
    public function  addCart(Request $request){
        $name=$request->name;
        $qty=$request->qty;
        $price=$request->selling_price;
        $id=$request->id;
        $check=Cart::add($id,$name,$qty,$price);
        if ($check){
            return redirect()->back()->with('success','Cart added Success ');
        }else{
            return redirect()->back()->with('warning','Cart Not added Success');
        }



    }
    public  function  updateCart(Request $request,$rowId){
        $qty=$request->qty;
        $check=Cart::update($rowId,$qty);
        if ($check){
            return redirect()->back()->with('info','Cart update Success ');
        }else{
            return redirect()->back()->with('warning','Cart Not Updated Success ');
        }


    }
    public  function  removeCart($rowId){
       $remove=Cart::remove($rowId);
        if ($remove){
            return redirect()->back()->with('warning','Cart Not Remove Success ');

        }else{
            return redirect()->back()->with('info','Cart Romove Success ');

        }
    }
}

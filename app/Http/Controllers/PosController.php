<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Product;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Gloudemans\Shoppingcart\Facades\Cart;
use Barryvdh\DomPDF\Facade as PDF;

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
    public  function  invoice(Request  $request){
        $request->validate([
         'customer_id'=>'required',
        ],[
            'customer_id.required'=>'Please select Customer'
        ]);
        $id=$request->customer_id;
        $customer=Customer::findOrFail($id);
        $contents=Cart::content();
//        $customer=Customer::where('id',$id)->first();

        return view('pos.invoice',compact('customer','contents'));
    }

//    public  function  pdf_generate($id){
//
//
//
//        $customer=Customer::findOrFail($id);
//
//        $contents=Cart::content();
//        return view('pos.invoice',compact('customer','contents'));
//
////         $pdf=PDF::loadView('pos.invoice');
////        return  $pdf->download('invoice.pdf');
//
//
//    }
public  function  finalInvoice(Request $request){
        $request->validate([
            'payment_status'=>'required',
        ],[
            'payment_status.required'=>'please select payment Type',

            ]);
        $order=new Order();
        $order->customer_id=$request->customer_id;
        $order->order_date=$request->order_date;
        $order->order_status=$request->order_status;
        $order->total_products=$request->total_products;
        $order->sub_total=$request->sub_total;
        $order->vat=$request->vat;
        $order->total=$request->total;
        $order->payment_status=$request->payment_status;
        $order->pay=$request->pay;
        $order->due=$request->due;
        $order->save();
        $order_id=$order->id;
        $order_details=new OrderDetail();
        $contents=Cart::content();
        foreach ($contents as $content){
            $order_details->order_id=$order_id;
            $order_details->product_id=$content->id;
            $order_details->quantity=$content->qty;
            $order_details->unit_cost=$content->price;
            $order_details->total=$content->price*$content->qty;
            $order_details->save();
            Cart::destroy();
        }
    return redirect()->route('pos')->with('success','Customer Insert Success|| please delevery product & Change Status');

    }
}

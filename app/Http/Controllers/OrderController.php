<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
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

    public  function  pending(){
        $pending_order=Order::where('order_status','pending')->get();
        return view('order.pending_order',compact('pending_order'));

    }
    public  function  view($id){
       $order=Order::findOrFail($id);
      return view('order.show_order',compact('order'));
    }
    public  function  orderApprove($id){
   $order=Order::findOrFail($id);
   $order->order_status='approve';
   $order->save();
   return redirect()->route('order.pending')->with('success','success fully Order Approve');
    }
    public  function  confirm(){
        $confirm_order=Order::where('order_status','approve')->get();
        return view('order.confirm_order',compact('confirm_order'));
    }
}

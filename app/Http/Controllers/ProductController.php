<?php

namespace App\Http\Controllers;

use App\Category;
use App\Employee;
use App\Exports\ProductsExport;
use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;

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
        $request->validate([
            'name'=>'required|max:50|min:6',
            'category_id'=>'required|unique:products',
            'supplier_id'=>'required|unique:products',
            'product_code'=>'required|max:60',
            'product_place'=>'required|max:60',
            'product_route'=>'required|max:60',
            'buy_date'=>'required|max:60',
            'expire_date'=>'required|max:60',
            'buying_price'=>'required|max:60',
            'selling_price'=>'required|max:60',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

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
        return redirect()->route('product.index')->with('success','Product Insert Success');

    }
    public  function  view($id){
        $product=Product::findOrFail($id);
        return view('product.view-product',compact('product'));
    }
    public function delete($id){
        $product=Product::findOrFail($id);
        $image='product/'.$product->photo;
        unlink($image);
        $product->delete();
        return redirect()->back()->with('success','Product Deleted Successfully');
    }
    public  function edit($id){
        $product=Product::findOrFail($id);
        return view('product.edit',compact('product'));
    }
    public  function  update(Request $request,$id){
        $request->validate([
            'name'=>'required|max:50|min:6',
            'category_id'=>'required',
            'supplier_id'=>'required',
            'product_code'=>'required|max:60',
            'product_place'=>'required|max:60',
            'product_route'=>'required|max:60',
            'buy_date'=>'required|max:60',
            'expire_date'=>'required|max:60',
            'buying_price'=>'required|max:60',
            'selling_price'=>'required|max:60',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $product=Product::findOrFail($id);
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
            $product->image = $image_url;
        }

        $product->save();
        return redirect()->route('product.index')->with('success','Product Insert Success');

    }
    public function export()
    {
        return Excel::download(new ProductsExport, 'product.xlsx');
    }

}

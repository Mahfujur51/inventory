<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
    public  function  index(){
     $categories=Category::all();
     return view('category.index',compact('categories'));
    }
    public  function  add(){
        return view('category.add');
    }
    public  function  store(Request $request){
        $request->validate([
            'name'=>'required|max:60|unique:categories'
        ]);
        $category=new Category();
        $category->name=$request->name;
        $category->save();
        return redirect()->route('category.index')->with('info','Category Insert Success');
    }
    public  function  delete($id){
        $category=Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->with('info','Category Insert Success');

    }
    public  function  edit($id){
        $categories=Category::findOrFail($id);
        return view('category.edit',compact('categories'));

    }
    public  function  update(Request $request,$id){
        $request->validate([
            'name'=>'required|max:60|unique:categories'
        ]);
        $category=Category::findOrFail($id);
        $category->name=$request->name;
        $category->update();
        return redirect()->route('category.index')->with('info','Category Update Success');
    }


}

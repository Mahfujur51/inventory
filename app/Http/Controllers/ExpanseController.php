<?php

namespace App\Http\Controllers;

use App\Category;
use App\Expanse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ExpanseController extends Controller
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
        $expanses=Expanse::all();
        return view('expanse.index',compact('expanses'));
    }
    public  function  add(){
        return view('expanse.add');
    }
    public  function  store(Request $request){
        $request->validate([
            'details'=>'required|max:60',
            'amount'=>'required|max:60',
            'date'=>'required|max:60',
            'month'=>'required|max:60',
            'year'=>'required|max:60',
        ]);
        $expanse=new Expanse();
        $expanse->details=$request->details;
        $expanse->amount=$request->amount;
        $expanse->date=$request->date;
        $expanse->year=$request->year;
        $expanse->month=$request->month;
        $expanse->save();
        return redirect()->route('expanse.index')->with('success','Daily Expanse  Inserted Success');
    }
    public  function  delete($id){
        $expanse=Expanse::findOrFail($id);
        $expanse->delete();
        return redirect()->route('expanse.index')->with('success','Expanse Deleted Successfully Success');

    }
    public  function  edit($id){
        $expanse=Expanse::findOrFail($id);
        return view('expanse.edit',compact('expanse'));

    }
    public  function  update(Request $request,$id){
        $request->validate([
            'details'=>'required|max:60',
            'amount'=>'required|max:60',
        ]);
        $expanse=Expanse::findOrFail($id);
        $expanse->details=$request->details;
        $expanse->amount=$request->amount;
        $expanse->update();
        return redirect()->route('expanse.index')->with('success','Daily Expanse  Update Success');
    }
    public  function  today(){
        $day=date('d/m/y');
        $expanses=Expanse::where('date',$day)->get();
        $sum=Expanse::where('date',$day)->sum('amount');
        return view('expanse.today',compact('expanses','sum'));

    }
    public  function  month(){
        $month=date("F");
        $year=date("Y");
        $expanses=Expanse::where('month',$month)->where('year',$year)->get();
        $sum=Expanse::where('month',$month)->where('year',$year)->sum('amount');
        return view('expanse.month',compact('expanses','sum'));

    }
    public  function  year(){

        $year=date("Y");
        $expanses=Expanse::where('year',$year)->get();
        $sum=Expanse::where('year',$year)->sum('amount');
        return view('expanse.year',compact('expanses','sum'));

    }
}

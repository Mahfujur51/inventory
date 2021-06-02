<?php

namespace App\Http\Controllers;

use App\Attendence;
use App\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\New_;

class AttendenceController extends Controller
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
        echo  "index";
    }
   public  function  add(){
       $employees=Employee::all();
       return view('attendance.index',compact('employees'));
   }
   public  function  attendance(Request $request){
     foreach ($request->user_id as $id){
         $data[]=[
             "user_id"=>$id,
             "attendance"=>$request->attendance[$id],
             "att_date"=>$request->att_date,
             "att_year"=>$request->att_year,
             "edit_date"=>date("d/m/y"),
         ];
     }
       $att=DB::table('attendences')->insert($data);


   }
}

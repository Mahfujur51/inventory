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

        $all_attendance=Attendence::select('edit_date')->groupBy('edit_date')->get();
        return view('attendance.show_all',compact('all_attendance'));
    }
   public  function  add(){
       $employees=Employee::all();
       return view('attendance.index',compact('employees'));
   }
   public  function  attendance(Request $request){
        $date=$request->att_date;
        $check=Attendence::where('att_date',$date)->first();
        if ($check){
            return  redirect()->back()->with('warning','Already Take Today Attendance');
        }else{
            foreach($request->user_id as $safety){
                $attendance=new Attendence();
                $attendance->user_id=$safety;
                $attendance->attendance=$request->attendance[$safety];
                $attendance->att_date=$request->att_date;
                $attendance->att_year=$request->att_year;
                $attendance->edit_date=date('d_m_y');
                $attendance->save();
            }
            return redirect()->back()->with('success','Attendance Take Successfully!!');

        }

   }

   public  function  edit_attendance ($date){
        $attendance_date=Attendence::where('edit_date',$date)->first();
          $attendance=Attendence::where('edit_date',$date)->get();
         return view('attendance.view_dateattendance',compact('attendance','attendance_date'));
   }
   public  function  update(Request $request){



       foreach($request->id as $id){
           $data=[
               "attendance"=>$request->attendance[$id],
               'att_date'=>$request->att_date,
               'att_year'=>$request->att_year,
           ];
           $attendance=Attendence::where(['att_date'=>$request->att_date,'id'=>$id])->first();
           $attendance->update($data);
       }
       if ($attendance){
           return redirect()->back()->with('success','Attendance Update successfully!!');
       }else{
           return  redirect()->back()->with('warning','Attendance Update not Successfully!!');
       }


   }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class AttendancesController extends Controller
{

    public function get_advisory_attendance2(Request $request){
      
        $attendance = DB::table('users')
             ->where([['attendance.strand','=', $request->strand],['attendance.section','=', $request->section],['attendance.grade','=', $request->grade],['attendance.event_id','=',$request->id]])
             ->join('attendance', 'users.id', '=', 'attendance.student_id')
             ->get();
        return response()->json([
             'status' => $attendance
         ]);
     }
    
    public function get_advisory_attendance(Request $request){
      
       $attendance = DB::table('users')
            ->where([['attendance.strand','=', $request->session()->get('strand')],['attendance.section','=', $request->session()->get('section')],['attendance.grade','=', $request->session()->get('grade')],['attendance.event_id','=',$request->id]])
            ->join('attendance', 'users.id', '=', 'attendance.student_id')
            ->get();
       return response()->json([
            'status' => $attendance
        ]);
    }
     public function add_attendance(Request $request){

        $request->validate([
            'event_id'=>['required'],
            'status'=>['required'],
        ]);


        $student_id = $request->session()->get('id');

        $stud=User::where('id',$student_id)->first();

        $user=Attendance::where([['event_id','=',$request->event_id],['student_id','=',$student_id]])->get();

            if($request->status === 'MS'){
                if(count($user) === 0){
                    $attendance = new Attendance;
                    $attendance->student_id = $student_id;
                    $attendance->event_id = $request->event_id;
                    $attendance->ms = 'check';
                    $attendance->grade = $stud->grade;
                    $attendance->section = $stud->section;
                    $attendance->strand = $stud->strand;
                    $attendance->save();
                }else{
                    Attendance::where('id','=',$user[0]->id)
                  ->update(['ms' => 'check']);
                }
            }else if($request->status === 'ME'){
                if(count($user) === 0){
                    $attendance = new Attendance;
                    $attendance->student_id = $student_id;
                    $attendance->event_id = $request->event_id;
                    $attendance->me = 'check';
                    $attendance->grade = $stud->grade;
                    $attendance->section = $stud->section;
                    $attendance->strand = $stud->strand;
                    $attendance->save();
                }else{
                     Attendance::where('id','=',$user[0]->id)
                  ->update(['me' => 'check']);
                }
            }else if($request->status === 'AS'){
                if(count($user) === 0){
                    $attendance = new Attendance;
                    $attendance->student_id = $student_id;
                    $attendance->event_id = $request->event_id;
                    $attendance->ass = 'check';
                    $attendance->grade = $stud->grade;
                    $attendance->section = $stud->section;
                    $attendance->strand = $stud->strand;
                    $attendance->save();
                }else{
                     Attendance::where('id','=',$user[0]->id)
                  ->update(['ass' => 'check']);
                }
            }else{
                if(count($user) === 0){
                    $attendance = new Attendance;
                    $attendance->student_id = $student_id;
                    $attendance->event_id = $request->event_id;
                    $attendance->ae = 'check';
                    $attendance->grade = $stud->grade;
                    $attendance->section = $stud->section;
                    $attendance->strand = $stud->strand;
                    $attendance->save();
                }else{
                     Attendance::where('id','=',$user[0]->id)
                  ->update(['ae' => 'check']);
                }
            }
               
    }
      
      public function get_attendance(Request $request){
       $attendance = DB::table('attendance')
       ->join('users', 'attendance.student_id', '=', 'users.id')
       ->get();
        return response()->json([
            'status' => $attendance
        ]);
      }

         public function get_all_attendance(Request $request){
           $attendance = DB::table('attendance')
           ->where('event_id','=',$request->id)
           ->join('users', 'attendance.student_id', '=', 'users.id')
       ->get();
        return response()->json([
            'status' => $attendance
        ]);
      }

}

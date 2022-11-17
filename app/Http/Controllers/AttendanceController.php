<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
class AttendanceController extends Controller
{
    public function add_attendance(Request $request){

        $request->validate([
            'event_id'=>['required'],
            'status'=>['required'],
        ]);


        $student_id = $request->session()->get('id');

        $user=Attendance::where([['event_id','=',$request->event_id],['student_id','=',$student_id]])->get();

            if($request->status === 'MS'){
                if(count($user) === 0){
                    $attendance = new Attendance;
                    $attendance->student_id = $student_id;
                    $attendance->event_id = $request->event_id;
                    $attendance->ms = 'check';
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
                    $attendance->save();
                }else{
                     Attendance::where('id','=',$user[0]->id)
                  ->update(['ae' => 'check']);
                }
            }


               
    }
}

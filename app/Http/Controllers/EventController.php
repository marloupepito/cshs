<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Attendance;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class EventController extends Controller
{
      public function get_student_attendance(Request $request){

            $id = $request->session()->get('id');
               $attendance = DB::table('attendance')
                   ->where('student_id','=',$id)
                   ->join('users', 'attendance.student_id', '=', 'users.id')
                   ->join('event', 'attendance.event_id', '=', 'event.id')
                ->get();
                return response()->json([
                    'status' => $attendance
                ]);

         }
    
    public function delete_event(Request $request){
         $validated =  $request->validate([
            'id'=>['required'],
        ]);
            Event::where('id','=',$request->id)->delete();
             Attendance::where('event_id','=',$request->id)->delete();
             return response()->json([
                'status' => 'success'
            ]);
    }
    public function add_event(Request $request){
        $validated =  $request->validate([
            'what'=>['required'],
            'when'=>['required'],
            'where'=>['required'],
        ]);
       $qr = Hash::make($request->what).Hash::make($request->when).Hash::make($request->where);
                $event = new Event;
                $event->what = $request->what;
                $event->when = $request->when;
                $event->where = $request->where;
                $event->qr = $qr;
                $event->save();
    }
    public function get_event(Request $request){
        if($request->verify === 'scanner'){
            $event = Event::where([['id','=',$request->eventid],['qr','=',$request->qr]])->orderBy('id', 'DESC')->first();
           return response()->json([
                'status' => $event
            ]); 
        }else if($request->verify === 'verify'){

           if($request->status === 'MS'){

               $studentid= $request->session()->get('id');
               $attendance = Attendance::where([['ms','=','check'],['student_id','=',$studentid],['event_id','=',$request->id]])->get();

                return response()->json([
                    'status' => count($attendance) === 0?'continue':'done'
                ]); 
           }else if($request->status === 'ME'){
                $studentid= $request->session()->get('id');
               $attendance = Attendance::where([['me','=','check'],['student_id','=',$studentid],['event_id','=',$request->id]])->get();

                return response()->json([
                    'status' => count($attendance) === 0?'continue':'done'
                ]);
           }else if($request->status === 'AS'){
                $studentid= $request->session()->get('id');
               $attendance = Attendance::where([['ass','=','check'],['student_id','=',$studentid],['event_id','=',$request->id]])->get();

                return response()->json([
                    'status' => count($attendance) === 0?'continue':'done'
                ]);
           }else if($request->status === 'AE'){
               $studentid= $request->session()->get('id');
               $attendance = Attendance::where([['ae','=','check'],['student_id','=',$studentid],['event_id','=',$request->id]])->get();

                return response()->json([
                    'status' => count($attendance) === 0?'continue':'done'
                ]);
           }

        }else{
           $event = Event::orderBy('id', 'DESC')->get();

           return response()->json([
                'status' => $event
            ]); 
        }
       
    }
     public function event_set_time(Request $request){
       Event::where('id', $request->id)
             ->update(['status' => $request->status,'remember_token' => $request->timer]);
       return response()->json([
            'status' => 'success'
        ]);
    }    
     
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Strand;
use App\Models\User;
use App\Models\Notification;
class StrandController extends Controller
{

    
    public function get_all_notification(Request $request){
            $notify = Notification::all();
        return response()->json([
            'status' => $notify
        ]);

    }
    public function add_notification(Request $request){
            $exist = Notification::where('key','=',$request->key)->get();

            if(count($exist) === 0){
                $event = new Notification;
                $event->key = $request->key;
                $event->save();
            }

            
    }
    public function add_strand(Request $request){
        $validated =  $request->validate([
            'strand'=>['required'],
        ]);
        $strand = new Strand;
        $strand->strand =$request->strand;
        $strand->grade =$request->grade;
        $strand->save();
    }

    public function delete_strand(Request $request){

        
        Strand::where('id','=',$request->id)->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }
    
    
    public function show_strand(Request $request){
        $strand = Strand::where('grade','=',$request->grade)->orderBy('id', 'DESC')->get();

        return response()->json([
            'status' => $strand
        ]); 
    }
    public function show_section(Request $request){
        $strand = User::where([['usertype','=','teacher'],['strand','=',$request->strand],['grade','=',$request->grade]])->orderBy('id', 'DESC')->get();

        return response()->json([
            'status' => $strand
        ]); 
    }
}

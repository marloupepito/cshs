<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
class EventController extends Controller
{
    public function add_event(Request $request){
        $validated =  $request->validate([
            'what'=>['required'],
            'when'=>['required'],
            'where'=>['required'],
        ]);

                $event = new Event;
                $event->what = $request->what;
                $event->when = $request->when;
                $event->where = $request->where;
                $event->save();
    }
    public function get_event(Request $request){
       $event = Event::orderBy('id', 'DESC')->get();
       return response()->json([
            'status' => $event
        ]);
    }   
}

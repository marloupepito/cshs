<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Strand;
use App\Models\User;
class StrandController extends Controller
{

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

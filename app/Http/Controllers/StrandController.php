<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Strand;
class StrandController extends Controller
{

    public function add_strand(Request $request){
        $validated =  $request->validate([
            'strand'=>['required'],
        ]);
        $strand = new Strand;
        $strand->strand =$request->strand;
        $strand->save();
    }
    
    public function show_strand(Request $request){
        $strand = Strand::all();

        return response()->json([
            'status' => $strand
        ]); 
    }
}

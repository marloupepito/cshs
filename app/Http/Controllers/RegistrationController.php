<?php

namespace App\Http\Controllers;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
     public function register1(Request $request){
        $validated =  $request->validate([
            'name'=>['required'],
            'lastname'=>['required'],
            'contact'=>['required'],
            'idnumber'=>['required'],
            'grade'=>['required'],
            'section'=>['required'],
            'strand'=>['required'],
            'gender'=>['required'],
        ]);

             $request->session()->put('register',[
               'name' => $request->name,
               'lastname' => $request->lastname,
               'contact' => $request->contact,
               'idnumber' => $request->idnumber,
               'grade' => $request->grade,
               'section' => $request->section,
               'strand' => $request->strand,
               'gender' => $request->gender,
              ]);

        $register = $request->session()->get('register');
        return response()->json([
            'status' => $register
        ]);


    }
}

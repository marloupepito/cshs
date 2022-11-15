<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class RegistrationController extends Controller
{

    public function logout(Request $request){
        $request->session()->invalidate();
        Auth::logout();
    }
      public function login_user(Request $request){
        $request->validate([
            'username'=>['required'],
            'password'=>['required'],
        ]);

        if(Auth::attempt($request->only('username','password'))){
            return response()->json([
                'status' => Auth::user(),
                'status2' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'Incorrect username or password!',
                'status2' => 'Incorrect username or password!'
            ]);
        }
        throw ValidationException::withMessages([
            'username' => ['Incorrect username or password!'],
        ]);
      
     }
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
     public function register2(Request $request){
        $register = $request->session()->get('register');
        if($register){
            return response()->json([
                'status' => true,
                'console' => $register
            ]);
        }else{
            return response()->json([
                'status' => false
            ]); 
        }
     }
     
     public function add_student(Request $request){
        $path = 'profile/';

           $validated =  $request->validate([
            'username'=>['required'],
            'password'=>['required'],
            'profile'=>'required|max:5128',
        ]);

        $register = $request->session()->get('register');
        if($request->hasFile('profile')){
            $profile = $request->file('profile');
            $fileName = $profile->getClientOriginalName();
            $profile->move($path, $fileName);

                $student = new User;
                $student->profile =$fileName;
                $student->name = $register['name'].' '.$register['lastname'];
                $student->lastname = $register['lastname'];
                $student->contact = $register['contact'];
                $student->idnumber = $register['idnumber'];
                $student->grade = $register['grade'];
                $student->section = $register['section'];
                $student->strand = $register['strand'];
                $student->gender = $register['gender'];
                $student->username = $request->username;
                $student->usertype = 'student';
                $student->password = Hash::make($request->password);
                $student->save();

               
                if($student){
                    $request->session()->forget('register'); 
                       return response()->json([
                            'status' => true
                        ]);
                }
            
        }else{
              return response()->json([
                'status' => false
            ]); 
        }

     }

     public function add_teacher(Request $request){
        $path = 'profile/';

           $validated =  $request->validate([
            'fullname'=>['required'],
            'grade'=>['required'],
            'section'=>['required'],
            'username'=>['required'],
            'contact'=>['required'],
            'idnumber'=>['required'],
            'password'=>['required'],
            'profile'=>'required|max:5128',
        ]);

        $register = $request->session()->get('register');
        if($request->hasFile('profile')){
            $profile = $request->file('profile');
            $fileName = $profile->getClientOriginalName();
            $profile->move($path, $fileName);

                $student = new User;
                $student->profile =$fileName;
                $student->name = $request->fullname;
                $student->lastname = $request->lastname;
                $student->contact = $request->contact;
                $student->idnumber = $request->idnumber;
                $student->grade = $request->grade;
                $student->section = $request->section;
                $student->username = $request->username;
                $student->password = Hash::make($request->password);
                $student->usertype = 'teacher';
                $student->save();

               
                if($student){
                    $request->session()->forget('register'); 
                       return response()->json([
                            'status' => true
                        ]);
                }
            
        }else{
              return response()->json([
                'status' => false
            ]); 
        }

     }

     public function get_teacher(Request $request){
        $teacher = User::where('usertype','=','teacher')->get();
          return response()->json([
                'status' => $teacher
            ]); 
     }
}

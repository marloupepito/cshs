<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class RegistrationController extends Controller
{
    
    public function get_admin(Request $request){

        if(Auth::attempt($request->only('username','password'))){
            return response()->json([
                'status' =>'success',
            ]);
        }else{
            return response()->json([
                'status' => 'Incorrect password!',
            ]);
        }
        throw ValidationException::withMessages([
            'status' => ['Incorrect password!'],
        ]);
    }
    public function edit_student_image(Request $request){
        $path = 'profile/';

        $validated =  $request->validate([
         'profile'=>['required'],
         ]);

     if($request->hasFile('profile')){

         $profile = $request->file('profile');
         $fileName = $profile->getClientOriginalName();
         $profile->move($path, $fileName);

         User::where('id', $request->id)
         ->update([
               'profile' => $fileName,
         ]);
         return response()->json([
            'status' => 'success'
        ]); 
     }else{
           return response()->json([
             'status' => false
         ]); 
     }

    }
    public function set_session_attendace(Request $request){

        $request->session()->put('strand', $request->strand);
        $request->session()->put('grade', $request->grade);
        $request->session()->put('section', $request->section);

    }
    public function get_student_advisory(Request $request){
        $student = User::where([['section','=', $request->session()->get('section')],['grade','=', $request->session()->get('grade')],['strand','=', $request->session()->get('strand')],['usertype','=','student']])->orderBy('id', 'DESC')->get();
        return response()->json([
              'status' => $student,
              'strand' =>$request->session()->get('strand'),
              'grade' =>$request->session()->get('grade'),
              'section' =>$request->session()->get('section')
          ]); 
    }
    public function get_student_advisory2(Request $request){
        $student = User::where([['section','=', $request->section],['grade','=', $request->grade],['strand','=', $request->strand],['usertype','=', 'student']])->orderBy('lastname', 'ASC')->get();
        return response()->json([
              'status' => $student,
          ]); 
    }
     public function update_student(Request $request){
        if($request->password !== null){
             User::where('id', $request->id)
          ->update([
                'name' => $request->name,
                'contact' => $request->contact,
                'idnumber' => $request->idnumber,
                'grade' => $request->grade,
                'section' => $request->section,
                'strand' => $request->strand,
                'username' => $request->username,
                'password' => Hash::make($request->password),
          ]);
           return response()->json([
                'status' => 'success',
            ]);
        }else{
             User::where('id', $request->id)
          ->update([
                'name' => $request->name,
                'contact' => $request->contact,
                'idnumber' => $request->idnumber,
                'grade' => $request->grade,
                'section' => $request->section,
                'strand' => $request->strand,
                'username' => $request->username,
              ]);
               return response()->json([
                    'status' => 'success',

                ]);
        }
       
    }
    public function update_teacher(Request $request){
        if($request->password !== null){
                 User::where('id', $request->id)
          ->update([
                'name' => $request->name,
                'contact' => $request->contact,
                'idnumber' => $request->idnumber,
                'grade' => $request->grade,
                'strand' => $request->strand,
                'section' => $request->section,
                'username' => $request->username,
                'password' => Hash::make($request->password),
          ]);
           return response()->json([
                'status' => 'success',
            ]);
        }else{
         User::where('id', $request->id)
          ->update([
                'name' => $request->name,
                'contact' => $request->contact,
                'idnumber' => $request->idnumber,
                'grade' => $request->grade,
                'strand' => $request->strand,
                'section' => $request->section,
                'username' => $request->username,
          ]);
           return response()->json([
                'status' => 'success',
            ]); 
        }
        
    }

    public function delete_user(Request $request){
            $aa= User::where('id', $request->id)->delete();
            return response()->json([
                'status' => $request->id,
            ]);
    }


    public function logout(Request $request){
        //$request->session()->invalidate();
        Auth::logout();
    }
      public function login_user(Request $request){
        $request->validate([
            'username'=>['required'],
            'password'=>['required'],
        ]);

        if(Auth::attempt($request->only('username','password'))){
            $request->session()->put('id', Auth::user()->id);
            $request->session()->put('strand', Auth::user()->strand);
            $request->session()->put('grade', Auth::user()->grade);
            $request->session()->put('section', Auth::user()->section);
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
            'contact'=>'required|min:11|max:11|unique:users',
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
            'profile'=>['required'],
        ]);

        $register = $request->session()->get('register');

        $exist = User::where('username','=',$request->username)->get();

        if(count($exist) === 0){
            if($request->hasFile('profile')){
                $profile = $request->file('profile');
                $fileName = $profile->getClientOriginalName();
                $profile->move($path, $fileName);
    
                    $student = new User;
                    $student->profile =$fileName;
                    $student->name = $register['lastname'].' '.$register['name'];
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
                                'status' => 'success'
                            ]);
                    }
                
            }else{
                  return response()->json([
                    'status' => 'error'
                ]); 
            }
        }else{
            return response()->json([
                'status' => 'exist'
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
            'strand'=>['required'],
            'contact'=>['required'],
            'idnumber'=>['required'],
            'password'=>['required'],
            'profile'=>'required|max:5128',
        ]);

        $register = $request->session()->get('register');
        $user=User::where([['usertype','=','teacher'],['grade','=',$request->grade],['section','=',$request->section],['strand','=',$request->strand]])->get();

       
        if($request->hasFile('profile')){

            if(count($user) === 0){
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
                    $student->strand = $request->strand;
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
                    'status' => 'exist',
                    'has' =>$user
                ]); 
            }
          
            
        }else{
              return response()->json([
                'status' => false
            ]); 
        }

     }

     public function get_teacher(Request $request){
        $teacher = User::where([['grade','=',$request->grade],['strand','=',$request->strand],['usertype','=','teacher']])->orderBy('lastname', 'ASC')->get();
          return response()->json([
                'status' => $teacher
            ]); 
     }
      public function get_student(Request $request){
        $student = User::where([['usertype','=','student'],['grade','=',$request->grade]])->orderBy('lastname', 'ASC')->get();
          return response()->json([
                'status' => $student
            ]); 
     }
       public function option(Request $request){
        if($request->option === 'delete'){
             User::where('id',$request->id)->delete();
        }else{
            User::where('id', $request->id)
             ->update(['access' => 'approved']);
        }
          return response()->json([
                'status' => 'success'
            ]); 
     }
}

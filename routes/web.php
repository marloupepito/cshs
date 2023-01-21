<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
   if($request->user()->message !== 'Unauthenticated'){
    return $request->user();
   }
});

Route::middleware('auth:sanctum')->get('/authenticated', function () {
    return true;
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/{vue?}',function(){
    return view('welcome');
})->where('vue','[\/\w\.-]*');

Route::post('/logout','App\Http\Controllers\RegistrationController@logout');
Route::post('/register1','App\Http\Controllers\RegistrationController@register1');
Route::post('/register2','App\Http\Controllers\RegistrationController@register2');
Route::post('/add_student','App\Http\Controllers\RegistrationController@add_student');
Route::post('/login_user','App\Http\Controllers\RegistrationController@login_user');
Route::post('/add_teacher','App\Http\Controllers\RegistrationController@add_teacher');
Route::post('/get_teacher','App\Http\Controllers\RegistrationController@get_teacher');
Route::post('/get_student','App\Http\Controllers\RegistrationController@get_student');
Route::post('/option','App\Http\Controllers\RegistrationController@option');
Route::post('/update_student','App\Http\Controllers\RegistrationController@update_student');
Route::post('/update_teacher','App\Http\Controllers\RegistrationController@update_teacher');
Route::post('/delete_user','App\Http\Controllers\RegistrationController@delete_user');
Route::post('/get_student_advisory','App\Http\Controllers\RegistrationController@get_student_advisory');
Route::post('/set_session_attendace','App\Http\Controllers\RegistrationController@set_session_attendace');

Route::post('/add_event','App\Http\Controllers\EventController@add_event');
Route::post('/get_event','App\Http\Controllers\EventController@get_event');
Route::post('/event_set_time','App\Http\Controllers\EventController@event_set_time');
Route::post('/delete_event','App\Http\Controllers\EventController@delete_event');
Route::post('/get_student_attendance','App\Http\Controllers\EventController@get_student_attendance');

Route::post('/add_attendance','App\Http\Controllers\AttendancesController@add_attendance');
Route::post('/get_attendance','App\Http\Controllers\AttendancesController@get_attendance');
Route::post('/get_all_attendance','App\Http\Controllers\AttendancesController@get_all_attendance');
Route::post('/get_advisory_attendance','App\Http\Controllers\AttendancesController@get_advisory_attendance');


// Route::post('/register1',[RegistrationController::class, 'register1']);
// Route::post('/register2',[RegistrationController::class, 'register2']);
// Route::post('/add_student',[RegistrationController::class, 'add_student']);

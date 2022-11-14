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


Route::post('/register1','App\Http\Controllers\RegistrationController@register1');
Route::post('/register2','App\Http\Controllers\RegistrationController@register2');
Route::post('/add_student','App\Http\Controllers\RegistrationController@add_student');
Route::post('/login_user','App\Http\Controllers\RegistrationController@login_user');

// Route::post('/register1',[RegistrationController::class, 'register1']);
// Route::post('/register2',[RegistrationController::class, 'register2']);
// Route::post('/add_student',[RegistrationController::class, 'add_student']);

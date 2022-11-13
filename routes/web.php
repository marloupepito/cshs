<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\RegistrationController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/{vue?}',function(){
    return view('welcome');
})->where('vue','[\/\w\.-]*');


// Route::post('/register1','RegistrationController@register1');
// Route::post('/register2','RegistrationController@register2');
// Route::post('/add_student','RegistrationController@add_student');

// Route::post('/register1',[RegistrationController::class, 'register1']);
// Route::post('/register2',[RegistrationController::class, 'register2']);
// Route::post('/add_student',[RegistrationController::class, 'add_student']);


Route::controller(RegistrationController::class)->group(function () {
    Route::post('/register1', 'register1');
    Route::post('/register2', 'register2');
    Route::post('/add_student', 'add_student');
});
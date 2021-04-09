<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;
use App\Http\Controllers\testcontroller;
use App\Http\Controllers\studentController;


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
    //return redirect('test');
});

Route::post('auth/save_user',[studentController::class,'save_user'])->name('auth.save_user'); ///save register user
Route::post('auth/check_user',[studentController::class,'check_user'])->name('auth.check_user'); ///check valid user or not
Route::get('auth/logout',[studentController::class,'logout'])->name('auth.logout');/// Route to destry logout
Route::post('student/add_info',[studentController::class,'add_info'])->name('student.add_info'); ///add student information at database
Route::post('student/UpdateInfo',[studentController::class,'UpdateInfo'])->name('student.UpdateInfo'); ///execute update for personal information
Route::post('student/UpdateProfilePicture',[studentController::class,'UpdateProfilePicture'])->name('student.UpdateProfilePicture');



///All resticted pages
Route::group(['middleware'=>['protectedPage']],function(){
    Route::get('/auth/login',[studentController::class,'login'])->name('auth.login'); ///route for login page
    Route::get('/auth/register',[studentController::class,'user_register'])->name('auth.register'); ///route for register page



    Route::get('student/registration',[studentController::class,'registration'])->name('student.registration'); ///Route for Register
    Route::get('student/showlist',[studentController::class,'showlist'])->name('student.showlist'); ///show list from database
    Route::get('student/showProfile/{id}',[studentController::class,'showProfile'])->name('student.showProfile'); //show personal profile 
    Route::get('student/showForUpdate/{id}',[studentController::class,'showForUpadate'])->name('student.showForUpdate'); //update personal information route
    Route::get('student/delete/{id}',[studentController::class,'delete'])->name('student.delete'); ///detele personal profile

});



// Route::post('auth/save',[testcontroller::class,'save'])->name('auth.save');
// Route::post('auth/check',[testcontroller::class,'check'])->name('auth.check');
// Route::get('auth/logout',[testcontroller::class,'logout'])->name('auth.logout');
// Route::get('auth/register',[testcontroller::class,'user_register'])->name('auth.register');


// Route::group(['middleware'=>['authcheck']],function(){

//     Route::get('/auth/login', [testcontroller::class,'login'])->name('auth.login');

//     Route::get("/admin/register",[testcontroller::class,'register'])->name('admin.register');

//     Route::get("/admin/showlist",[testcontroller::class,'showlist']);

//     Route::get("/admin/delete/{id}",[testcontroller::class,'delete']);

//     Route::get('/admin/edit/{id}',[testcontroller::class,'showdata']);

// });




// Route::post("/admin/register",[testcontroller::class,'add'])->name('admin.register');
// Route::post('edit',[testcontroller::class,'update']);



// Route::get("/my-name {name}", function ($name) {
//     //echo $name;
//     return view('mypage' , ['name' =>$name]);
// });

// Route::get("/test", function () {
//     return view('test');
// });

// Route::get("user {name}",[Users::class,'index']);


// Route::view('m','mypage');



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

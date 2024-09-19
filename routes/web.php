<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Authcontroller;
use App\Http\Controllers\Blog\Postcontroller;

use Carbon\Carbon;
use App\Models\User;

Route::get('/',[Postcontroller::class,'index']);


Route::view('register','Auth.register')->middleware('guest');

Route::post('authendicate',[Authcontroller::class,'register'])->middleware('guest');
Route::post('otpverfiy',[Authcontroller::class,'verifyOtp'])->middleware('guest');
Route::post('resendotp',[Authcontroller::class,'resendotp'])->middleware('guest');
Route::view('login','Auth.Login')->name('login')->middleware('guest');
Route::post('authlogin',[Authcontroller::class,'logindata'])->middleware('guest');
Route::view('email','Auth.email')->middleware('guest');
Route::post('email-otp',[Authcontroller::class,'emailOTP'])->middleware('guest');
Route::post('verifyemail',[Authcontroller::class,'verifyEmailOTP'])->middleware('guest');
Route::post('newpassword',[Authcontroller::class,'newPassword'])->middleware('guest');
Route::get('logout', function () {
    Auth::logout();
    return redirect('/login');
})->middleware('auth');

Route::get('createblog', function () {
    if(Auth::user()){
        return view('Blog.BlogCreate');
    }else{
        return redirect('/login');
    }
})->name('createblog');
 
Route::post('store',[Postcontroller::class,'store'])->middleware('auth');
Route::get('/blog/{id}', [Postcontroller::class, 'show'])->name('blog.show');
Route::get('mypost',[Postcontroller::class,'mypost'])->middleware('auth');
Route::get('delete/{id}',[Postcontroller::class,'destroy'])->middleware('auth');
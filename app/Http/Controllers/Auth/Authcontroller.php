<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Mail\SendOTPMail;
use App\Mail\mymail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class Authcontroller extends Controller
{
   
    public function register(Request $request){

        $validatedData = Validator::make($request->all(), [
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        $otp = mt_rand(100000, 999999);
        $email = $request->email;
        $user =New User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->temp_otp = $otp;
        $user->save();
        Mail::to($email)->send(new SendOTPMail($otp));
        return view('Auth.Otp')->with('email',$email);

        
    }



    public function verifyOtp(Request $request){
        $otp = $request->otp;
        $email = $request->email;
        $user = User::where('email',$email)->first();
        if($user->temp_otp == $otp){
            $user->email_verified_at = Carbon::now('Asia/Colombo');
            $user->temp_otp = null;
            $user->status = "active";
          
            $user->save();
            Auth::login($user);
            return redirect('/');
        }
        return view('Auth.Otp')->with('email',$email)->with('error','Invalid OTP');
    }

    public function resendotp(Request $request){
        $email = $request->input('email');
        $user=User::where('email',$email)->first();
        $otp = mt_rand(100000, 999999);
        $user->temp_otp=$otp;
        $user->save();
        Mail::to($email)->send(new SendOTPMail($otp));
    
            return view('Auth.Otp')->with('email',$email);
    
    }

   public function logindata(Request $request){
  
$validatedData = Validator::make($request->all(), [
    'email' => 'email|required',
    'password' => 'required'
]);
if($validatedData->fails()){
    return redirect()->back()->withErrors($validatedData)->withInput();

   }

   $email = $request->email;
    $password = $request->password;
    $user = User::where('email',$email)->first();
     if($user){
        if($user->status == 'active'){
            if(Auth::attempt(['email' => $email, 'password' => $password])){
               
                Auth::login($user);
                $loginuser = Auth::user();
               

 $loginuser->save();
                return redirect('/');
            }else{
                return redirect('/login')->with('error','Invalid Credentials');
            }
          
        }else{
            return view('Auth.Otp')->with('email',$email);
        }
        
    }else{
        return redirect('/login')->with('error','Invalid Credentials');
    }
}


public function emailOTP(Request $request){
    $email = $request->input('email');
    $user=User::where('email',$email)->first();
    $otp = mt_rand(100000, 999999);
    $user->temp_otp=$otp;
    $user->save();
    Mail::to($email)->send(new SendOTPMail($otp));
   if($user){
    return view('Auth.EmailOtp')->with('email',$email);

   }else{
    return back()->with('error','email not found');
   }










}
public function verifyEmailOTP(Request $request)
{
    $email = $request->input('email');
    $otp = $request->input('otp');
$user=User::where('email',$email)->where('temp_otp',$otp)->first();
    
        if ($otp == $user->temp_otp) {
            
            $user->temp_otp=null;
            $user->email_verified_at = Carbon::now('Asia/Colombo');
        
            $user->save();
            return view('Auth.Newpassword')->with('email',$email)->with('success','email verified successfully');

          
        }else{
            return view('Auth.EmailOtp')->with('email',$email)->with('$error','invalid otp');
        }






}

public function newPassword(Request $request)
{
    $email = $request->input('email');
    $password = $request->input('password');
    $user=User::where('email',$email)->first();
    $user->password=bcrypt($password);
    $user->save();
   // Auth::login($user);
    return redirect('/login');}


    
}
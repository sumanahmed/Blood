<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class AdminController extends Controller
{
    //show login form
    public function login(){
        return view('blood.admin.auth.login');
    }

    //sign in to admin panel
    public function signin(Request $request){ 
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);
        $user = User::select('role')->where('email', $request->email)->first();
        if($user != null && $user['role'] == 'admin'){ 
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){              
                return redirect()->route('backend.dashboard')->with('message','Successfully logged in !');
            }else{
                return redirect()->route('backend.admin.login')->with('error_message','Email/Password is wrong !');
            }
        }else{
            return redirect()->route('backend.admin.login')->with('error_message','You are not admin');;
        }
    }

    // backend admin log out
    public function logout(Request $request){
        if(Auth::check()){
            Auth::logout();
        }
        return redirect()->route('backend.admin.login');
    }

    //show dashboard
    public function dashboard(){
        return view('blood.admin.dashboard.home');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Donor;
use App\Models\Gallery;
use App\Models\Profile;
use App\Models\Sponsor;
use App\Models\Video;
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
        $user = User::where('email', $request->email)->first();
        if($user != null){ 
            if( Auth::attempt(['email'=>$request->email,'password'=>$request->password]) ){              
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
        $donor = Donor::count('id');
        $sponsor = Sponsor::count('id');
        $blog = Blog::count('id');
        $image = Gallery::count('id');
        $video = Video::count('id');
        return view('blood.admin.dashboard.home',compact('donor','sponsor','blog','image','video'));
    }

    //show profile edit page
    public function profile() {
        $profile = Profile::find(1);
        return view('blood.admin.profile.edit', compact('profile'));
    }

    //profile update
    public function profileUpdate(Request $request){
        $this->validate($request, [
            'name'          => 'required',
            'address'       => 'required',
            'slogan'        => 'required',
            'zip_code'      => 'required',
            'phone_1'       => 'required',
            'email_1'       => 'required',
            'privacy_policy'=> 'required',
            'terms_condition'=> 'required',
        ]);
        
        $profile                = Profile::find(1);
        $profile->name  = $request->name;
        $profile->address       = $request->address;
        $profile->slogan        = $request->slogan;
        $profile->zip_code      = $request->zip_code;
        $profile->phone_1       = $request->phone_1;
        $profile->phone_2       = $request->phone_2 ? $request->phone_2 : NULL;
        $profile->email_1       = $request->email_1;
        $profile->email_2       = $request->email_2 ? $request->email_2 : NULL;
        $profile->facebook      = $request->facebook ? $request->facebook : NULL;
        $profile->twitter       = $request->twitter ? $request->twitter : NULL;
        $profile->pinterest     = $request->pinterest ? $request->pinterest : NULL;
        $profile->youtube       = $request->youtube ? $request->youtube : NULL;
        $profile->privacy_policy   = $request->privacy_policy;
        $profile->terms_condition  = $request->terms_condition;
        if($request->logo){
            if($profile->logo != null){
                unlink($profile->logo);
            }
            $logo           = $request->file('logo');
            $logo_name      = time().".".$logo->getClientOriginalExtension();
            $directory      = 'uploads/logo/';
            $logo->move($directory, $logo_name);
            $logo_url       = $directory.$logo_name;
            $profile->logo   = $logo_url;
        }
        if($profile->update()){
            return redirect()->route('backend.profile')->with('message','Profile Updated Successfully');
        }else{
            return redirect()->route('backend.profile')->with('error_message','Sorry Something Went Wrong');
        }
    }
}

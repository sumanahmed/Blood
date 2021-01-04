<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\BloodGroup;
use App\Models\Division;
use App\Models\Donor;
use Exception;
use Auth;

class DonorController extends Controller
{
    //show register page
    public function register(){ 
        $divisions = Division::all();
        $blood_groups = BloodGroup::all();
        return view("blood.frontend.home.registration", compact('divisions','blood_groups'));
    }

    //manage signup
    public function signup(Request $request){ 
        $this->validate($request, [
            'name'              => 'required',
            'phone'             => 'required|unique:donors',
            'dob'               => 'required',
            'permanent_address' => 'required',
            'current_address'   => 'required',
            'blood_group_id'    => 'required',
            'division_id'       => 'required',
            'district_id'       => 'required',
            'thana_id'          => 'required',
        ]);

        $donor                      = new Donor();
        $donor->name                = $request->name;
        $donor->email               = isset($request->email) ? $request->email : Null;
        $donor->phone               = $request->phone;
        $donor->dob                 = $request->dob;
        $donor->last_donate_date    = isset($request->last_donate_date) ? $request->last_donate_date : Null;
        $donor->permanent_address   = $request->permanent_address;
        $donor->current_address     = $request->current_address;
        $donor->blood_group_id      = $request->blood_group_id;
        $donor->division_id         = $request->division_id;
        $donor->district_id         = $request->district_id;
        $donor->thana_id            = $request->thana_id;
        $donor->password            = bcrypt($request->password); 
        if($request->hasFile('thumbnail') ){
            $image          = $request->file('thumbnail');
            $image_name     = time().".".$image->getClientOriginalExtension();
            $directory      = 'blood/admin/uploads/images/donor/';
            $image->move($directory, $image_name);
            $image_url      = $directory.$image_name;
            $donor->thumbnail= $image_url;
        }
        $donor->save();        
        $msg    = 'Dear '.$donor->name.', Welcome to blood donation organization. Your login credential phone: '. $donor->phone.' and password:'.$request->password;
        $client = new Client();
        $sms    = $client->request("GET", "http://isms.zaman-it.com/smsapi?api_key=C20004125f16a40bed4d45.41246942 &type=text&contacts=". $donor->phone ."&senderid=8809612451774&msg=".$msg);
        $sms_status_code = $sms->getStatusCode();
        if($sms_status_code == 200){
            return redirect()->route('donor.login')->with('message','Registration complete');
        }else{
            return redirect()->route('donor.login')->with('error_message','Sorry, something went wrong');
        }   
    }

    //show register page
    public function login(){ 
        return view("blood.frontend.home.login");
    }

    //manage signin
    public function signin(Request $request){ 
        try {
            $this->validate($request, [
                'phone'     => 'required',
                'password'  => 'required'
            ]);    
            if(Auth::guard('donor')->attempt(['phone'=>$request->phone,'password'=>$request->password]) ) {
                return redirect('donor/dashboard')->with('message','Successfully logged in !');    
            } else {
                return redirect()->route('donor.login')->with('error_message', 'Phone or Password not match');    
            }         
        } catch(Exception $e) {
            return redirect()->route('donor.login')->with('error_message',$e->getMessage());
        }    
    }

    //donor logout
    public function logout() {
        if(Auth::guard('donor')->check()){
            Auth::guard('donor')->logout();
        }
        return redirect()->route('donor.login');
    }

    //show dashboard
    public function dashboard() {
        $divisions = Division::all();
        $blood_groups = BloodGroup::all();
        return view("blood.frontend.donor.dashboard", compact('divisions','blood_groups'));
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\BloodGroup;
use App\Models\Category;
use App\Models\Blog;
use App\Models\District;
use App\Models\Division;
use App\Models\Donor;
use App\Models\Thana;
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
        $donor = Auth::guard('donor')->user();
        $donor_districts = District::where('division_id', $donor->division_id)->get();
        $donor_thanas = Thana::where('district_id', $donor->district_id)->get();
        $blogs = Blog::where('user_id',$donor->id)->get();
        $status = 0;
        return view("blood.frontend.donor.dashboard", compact('divisions','blood_groups','donor','donor_districts','donor_thanas','blogs','status'));
    }

    //update
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name'              => 'required',
            'phone'             => 'required|unique:donors,phone,'.$id,
            'dob'               => 'required',
            'permanent_address' => 'required',
            'current_address'   => 'required',
            'blood_group_id'    => 'required',
            'division_id'       => 'required',
            'district_id'       => 'required',
            'thana_id'          => 'required',
        ]);

        $donor                      = Donor::find($id);
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
        if($request->password) {
            $donor->password        = bcrypt($request->password); 
        }        
        if($request->hasFile('thumbnail') ){
            if($donor->thumbnail != null && file_exists($donor->thumbnail)){
                unlink($donor->thumbnail);
            }
            $image          = $request->file('thumbnail');
            $image_name     = time().".".$image->getClientOriginalExtension();
            $directory      = 'blood/admin/uploads/images/donor/';
            $image->move($directory, $image_name);
            $image_url      = $directory.$image_name;
            $donor->thumbnail= $image_url;
        }
        if($donor->update()){
            return redirect()->route('donor.dashboard')->with('message','Update successfully');
        }else{
            return redirect()->route('donor.dashboard')->with('error_message','Sorry, something went wrong');
        }   
    }

    //show blog create page
    public function blogCreate($id) {
        $categories = Category::all();
        $status     = 1;
        $donor_id   =$id;
        $divisions = Division::all();
        $blood_groups = BloodGroup::all();
        $donor = Auth::guard('donor')->user();
        $donor_districts = District::where('division_id', $donor->division_id)->get();
        $donor_thanas = Thana::where('district_id', $donor->district_id)->get();
        $blogs = Blog::where('user_id',$donor->id)->get();
        $donor = Auth::guard('donor')->user();
        return view("blood.frontend.donor.dashboard", compact('divisions','blood_groups','donor','donor_districts','donor_thanas','blogs','categories','status','donor_id','donor'));
    }

    //blog store
    public function blogStore(Request $request, $id) 
    {  
        $this->validate($request, [
            'title'         => 'required',
            'description'   => 'required',
            'thumbnail'     => 'required',
        ]);
        $blog               = new Blog();
        $blog->title        = $request->title;
        $blog->description  = $request->description;
        $blog->category_id  = $request->category_id;
        $blog->user_id      = $id;
        $blog->status       = 0;
        if($request->thumbnail){
            $thumbnail          = $request->file('thumbnail');
            $thumbnail_name     = "thumbnail_".time().".".$thumbnail->getClientOriginalExtension();
            $directory          = 'blood/admin/uploads/images/thumbnail/';
            $thumbnail->move($directory, $thumbnail_name);
            $thumbnail_url      = $directory.$thumbnail_name;
            $blog->thumbnail    = $thumbnail_url;
        } 
        if($blog->save()){
            return redirect()->route('donor.dashboard')->with('message','Blog added successfully');
        }else{
            return redirect()->route('donor.dashboard')->with('error_message','Sorry, something went wrong');
        }   
    }
}

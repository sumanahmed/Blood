<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Gallery;
use App\Models\Faq;
use App\Models\Category;
use App\Models\Blog;
use App\Models\BloodGroup;
use App\Models\District;
use App\Models\Division;
use App\Models\Donor;
use App\Models\Thana;
use Auth;
use Exception;

class HomeController extends Controller
{
    //show home page
    public function home(){ 
        $gallerys  = Gallery::orderBy('id','DESC')->get();
        $blood_groups = BloodGroup::all();
        $divisions = Division::all();
        $districts = District::all();
        $thanas    = Thana::all();
        $today     = date('Y-m-d');
        $three_month= date('Y-m-d', strtotime('-90 days'));
        $donors    = Donor::select('*')
                            ->when(request('blood_group_id') && request('blood_group_id') != 0, function($query){
                                return $query->where('blood_group_id',request('blood_group_id'));
                            })
                            ->when(request('division_id') && request('division_id') != 0, function($query){
                                return $query->where('division_id',request('division_id'));
                            })
                            ->when(request('district_id') && request('district_id') != 0, function($query){
                                return $query->where('district_id',request('district_id'));
                            })
                            ->when(request('thana_id') && request('thana_id') != 0, function($query){
                                return $query->where('thana_id',request('thana_id'));
                            })
                            ->when(request('name'), function($query){
                                return $query->where('name','like', '%' . request('name') . '%');
                            })
                            ->where('status',1)
                            ->get();
        return view("blood.frontend.home.index",compact('gallerys','blood_groups','divisions','districts','thanas','donors'));
    }
    //show about page
    public function about(){ 
        return view("blood.frontend.home.about");
    }
    //show campaign page
    public function campaign(){ 
        return view("blood.frontend.home.campaign");
    }
    //show faq page
    public function faq(){ 
        $faqs = Faq::orderBy('id','desc')->get();
        return view("blood.frontend.home.faq",\compact('faqs'));
    }
    //show gallery page
    public function gallery(){ 
        $gallerys  = Gallery::orderBy('id','DESC')->get();
        return view("blood.frontend.home.gallery",compact('gallerys'));
    }
    //show blog page
    public function blog(){ 
        $categories   = Category::all();
        $blogs        = Blog::all();
        $recent_blogs = Blog::orderBy('id','desc')->limit(3)->get();
        return view("blood.frontend.home.blog",compact('categories','blogs','recent_blogs'));
    }
    //show contact page
    public function contact(){ 
        return view("blood.frontend.home.contact");
    }

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
        if($donor->save()){
            return redirect()->route('frontend.login')->with('message','Registration complete');
        }else{
            return redirect()->route('frontend.login')->with('error_message','Sorry, something went wrong');
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
    
            /*if(filter_var($request->email_phone, FILTER_VALIDATE_EMAIL)) {
                $email = $request->email_phone;
                Auth::attempt(['email'=>$email,'password'=>$request->password]);
                return redirect()->route('frontend.donor.dashboard')->with('message','Successfully logged in !');
            } else {
                $phone = $request->phone;
                Auth::attempt(['phone'=>$phone,'password'=>$request->password]);
                return redirect()->route('frontend.donor.dashboard')->with('message','Successfully logged in !');
            }*/
            
            if(Auth::guard('donor')->attempt(['phone'=>$request->phone,'password'=>$request->password]) ) {
                return redirect()->route('frontend.donor.dashboard')->with('message','Successfully logged in !');    
            }
            
        } catch(Exception $e) {
            return redirect()->route('frontend.login')->with('error_message',$e->getMessage());
        }       

    }

    //get district
    public function getDistrict($division_id){
        $districts = District::select('id','name')->where('division_id', $division_id)->orderBy('name','ASC')->get();        
        return response()->json($districts);
    }

    //get district
    public function getThana($district_id){
        $thanas = Thana::select('id','name')->where('district_id', $district_id)->orderBy('name','ASC')->get();
        return response()->json($thanas);
    }
}

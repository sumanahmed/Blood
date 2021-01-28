<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Faq;
use App\Models\Category;
use App\Models\Blog;
use App\Models\BloodGroup;
use App\Models\Campaign;
use App\Models\District;
use App\Models\Division;
use App\Models\Donor;
use App\Models\Profile;
use App\Models\Slider;
use App\Models\Sponsor;
use App\Models\Thana;
use App\Models\Video;
use App\Models\Ambulance;
use App\Models\Symptom;
use App\Models\Medicine;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
    //show home page
    public function home(){ 
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
                            ->paginate(5);
        $blogs = Blog::orderBy('id','DESC')->take(3)->get();
        $sliders= Slider::orderBy('id','DESC')->get();
        return view("blood.frontend.home.index",compact('blood_groups','divisions','districts','thanas','donors','today','blogs','sliders'));
    }
    
    //show about page
    public function about(){ 
        $volunters = Donor::where('designation','!=','null')->take(5)->get();
        $sponsors = Sponsor::all();
        $videos   = Video::all();
        return view("blood.frontend.home.about",compact('volunters','sponsors','videos'));
    }
    
    //show about page
    public function ambulance(){ 
        $ambulances = Ambulance::paginate(10);
        return view("blood.frontend.home.ambulance",compact('ambulances'));
    }
    
    //show symptom & medicine
    public function telemedicine(Request $request){ 
        $symptoms   = Symptom::all();
        $medicines  = Medicine::join('symptoms','symptoms.id','medicines.symptom_id')
                            ->join('doctors','doctors.id','medicines.doctor_id')
                            ->select('medicines.*','symptoms.name as symptom_name','doctors.name as doctor_name',
                                    'doctors.designation','doctors.siting_place','doctors.specialist','doctors.image')
                            ->where('medicines.symptom_id', $request->symptom_id)
                            ->paginate(10);
        return view("blood.frontend.home.telemedicine",compact('symptoms','medicines'));
    }
    
    //show campaign page
    public function campaign(){ 
        $campaigns = Campaign::where('status',1)->get();
        return view("blood.frontend.home.campaign",compact('campaigns'));
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
        $profile = Profile::find(1);
        return view("blood.frontend.home.contact",compact('profile'));
    }   
    
    //mail send
    public function mailSend(Request $request){ 
        $msg = $request->message;
        $email = [
            'to' => $request->email,
            'subject' => $request->subject,
            'name' => $request->name
        ];
        Mail::raw($msg, function ($message) use($email){
            $message->from('blooddonation@gmail.com','Blood Donation');
            $message->to($email['to']);
            $message->subject($email['subject']);
        });
        
        return redirect()->back()->with('message','Mail send successfully');
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

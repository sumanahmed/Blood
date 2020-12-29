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

class HomeController extends Controller
{
    //show home page
    public function home(){ 
        $gallerys  = Gallery::orderBy('id','DESC')->get();
        $blood_groups = BloodGroup::all();
        $divisions = Division::all();
        $districts = District::all();
        $thanas    = Thana::all();
        $donors    = Donor::select('*')
                            ->when(request('blood_group_id'), function($query){
                                return $query->where('blood_group_id',request('blood_group_id'));
                            })
                            ->when(request('division_id'), function($query){
                                return $query->where('division_id',request('division_id'));
                            })
                            ->when(request('district_id'), function($query){
                                return $query->where('district_id',request('district_id'));
                            })
                            ->when(request('thana_id'), function($query){
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
        return view("blood.frontend.home.registration");
    }

    //manage signup
    public function signup(Request $request){ 
        dd($request);
    }

    //show register page
    public function login(){ 
        return view("blood.frontend.home.login");
    }

    //manage signin
    public function signin(Request $request){ 
        dd($request);
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

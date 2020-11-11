<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Gallery;
use App\Models\Faq;
use App\Models\Category;
use App\Models\Blog;

class HomeController extends Controller
{
    //show home page
    public function home(){ 
        $campaigns = Campaign::where('status',1)->orderBy('id','DESC')->get();
        $gallerys  = Gallery::orderBy('id','DESC')->get();
        return view("blood.frontend.home.index",compact('campaigns','gallerys'));
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
}

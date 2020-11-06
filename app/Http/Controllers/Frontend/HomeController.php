<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //show home page
    public function home(){ 
        return view("blood.frontend.home.index");
    }
    //show about page
    public function about(){ 
        return view("blood.frontend.home.about");
    }
    //show campaign page
    public function campaign(){ 
        return view("blood.frontend.home.campaign");
    }
}

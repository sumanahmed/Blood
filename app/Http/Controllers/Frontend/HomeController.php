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
}

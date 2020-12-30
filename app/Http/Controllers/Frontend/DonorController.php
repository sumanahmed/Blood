<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    //show dashboard
    public function dashboard() {

        return view("blood.frontend.donor.dashboard");
    }
}

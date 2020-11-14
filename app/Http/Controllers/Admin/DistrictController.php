<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    //show all district
    public function index(){
        $districts = District::all();
        return view('blood.admin.setting.district', compact('districts'));
    }
}

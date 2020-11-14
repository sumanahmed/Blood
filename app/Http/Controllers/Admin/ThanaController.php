<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Thana;
use Illuminate\Http\Request;

class ThanaController extends Controller
{
    //show all thana
    public function index(){
        $thanas = Thana::all();
        return view('blood.admin.setting.thana', compact('thanas'));
    }
}

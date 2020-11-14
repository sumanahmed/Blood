<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    //show all division
    public function index(){
        $divisions = Division::all();
        return view('blood.admin.setting.division', compact('divisions'));
    }
}

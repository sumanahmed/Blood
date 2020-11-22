<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BloodGroup;
use App\Models\District;
use App\Models\Division;
use App\Models\Donor;
use App\Models\Thana;
use Illuminate\Http\Request;
use Validator;
use Response;

class DonorController extends Controller
{
    //get all donor
    public function index(){
        $donors         = Donor::all();
        $blood_groups   = BloodGroup::all();
        $divisions      = Division::orderBy('name','ASC')->get();
        $districts      = District::all();
        $thanas         = Thana::all();
        return view('blood.admin.donor.donor', compact('donors','blood_groups','divisions','districts','thanas'));
    }

    //donor store
    public function store(Request $request){ 
        $validators=Validator::make($request->all(),[
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
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }        
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
        $donor->password            = bcrypt(123456); 
        if($request->thumbnail){
            $image          = $request->file('thumbnail');
            $image_name     = time().".".$image->getClientOriginalExtension();
            $directory      = 'blood/admin/uploads/images/donor/';
            $image->move($directory, $image_name);
            $image_url      = $directory.$image_name;
            $donor->thumbnail= $image_url;
        }
        if($donor->save()){
            return Response::json([
                'status'    => 201,
                'message'   => "Donor Created",
                'data'      => $donor
            ]);
        }else{
            return Response::json([
                'status'        => 403,
                'error_message' => "Something went wrong",
                'data'          => []
            ]);
        }        
    }

    //donor update
    public function update(Request $request){ 
        $validators=Validator::make($request->all(),[
            'name'              => 'required',
            'phone'             => 'required',
            'dob'               => 'required',
            'permanent_address' => 'required',
            'current_address'   => 'required',
            'blood_group_id'    => 'required',
            'division_id'       => 'required',
            'district_id'       => 'required',
            'thana_id'          => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }        
        $donor                      = Donor::find($request->id);
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
        if($request->thumbnail){
            if($donor->thumbnail != null && file_exists($donor->thumbnail)){
                unlink($donor->thumbnail);
            }
            $image          = $request->file('thumbnail');
            $image_name     = time().".".$image->getClientOriginalExtension();
            $directory      = 'blood/admin/uploads/images/donor/';
            $image->move($directory, $image_name);
            $image_url      = $directory.$image_name;
            $donor->thumbnail= $image_url;
        }
        if($donor->save()){
            return Response::json([
                'status'    => 201,
                'message'   => "Donor Updated",
                'data'      => $donor
            ]);
        }else{
            return Response::json([
                'status'        => 403,
                'error_message' => "Something went wrong",
                'data'          => []
            ]);
        }        
    }

    //donor destroy
    public function destroy(Request $request){
        $donor = Donor::find($request->id);
        if(($donor->thumbnail != null) && file_exists($donor->thumbnail)){
            unlink($donor->thumbnail);
        }
        $donor->delete();
        return Response::json([
            'status'  => 200,
            'message' => 'Donor deleted'
        ]);
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

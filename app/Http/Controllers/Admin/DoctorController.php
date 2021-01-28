<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Validator;
use Response;

class DoctorController extends Controller
{
    //get all doctor
    public function index(){
        $doctors = Doctor::all();
        return view('blood.admin.doctor.doctor', compact('doctors'));
    }

    //doctor store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'name'          => 'required',
            'designation'   => 'required',
            'specialist'    => 'required',
            'siting_place'  => 'required'
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $doctor                 = new Doctor();
            $doctor->name           = $request->name;
            $doctor->designation    = $request->designation;
            $doctor->specialist     = $request->specialist;
            $doctor->siting_place   = $request->siting_place;
            if($request->image){
                $image          = $request->file('image');
                $image_name     = "doctor_".time().".".$image->getClientOriginalExtension();
                $directory      = 'blood/admin/uploads/images/doctor/';
                $image->move($directory, $image_name);
                $image_url      = $directory.$image_name;
                $doctor->image    = $image_url;
            }
            if($doctor->save()){
                return Response::json([
                    'status'    => 201,
                    'message'   => "Doctor created successfully",
                    'data'      => $doctor
                ]);
            }else{
                return Response::json([
                    'status'        => 403,
                    'error_message' => "Sorry, something went wrong",
                    'data'          => []
                ]);
            }
        }
    }

    //doctor update
    public function update(Request $request){ 
        $validators=Validator::make($request->all(),[
            'name'          => 'required',
            'designation'   => 'required',
            'specialist'    => 'required',
            'siting_place'  => 'required'
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $doctor                 = Doctor::find($request->id);
            $doctor->name           = $request->name;
            $doctor->designation    = $request->designation;
            $doctor->specialist     = $request->specialist;
            $doctor->siting_place   = $request->siting_place;
            if($request->image){
                if($doctor->image != null && file_exists($doctor->image)){
                    unlink($doctor->image);
                }
                $image          = $request->file('image');
                $image_name     = "doctor_".time().".".$image->getClientOriginalExtension();
                $directory      = 'blood/admin/uploads/images/doctor/';
                $image->move($directory, $image_name);
                $image_url      = $directory.$image_name;
                $doctor->image= $image_url;
            }
            if($doctor->update()){
                return Response::json([
                    'status'    => 201,
                    'message'   => "Doctor updated successfully",
                    'data'      => $doctor
                ]);
            }else{
                return Response::json([
                    'status'        => 403,
                    'error_message' => "Sorry, something went wrong",
                    'data'          => []
                ]);
            }
        }
    }

    //doctor delete
    public function destroy(Request $request){
        $doctor = Doctor::find($request->id); 
        if(($doctor->image != null) && file_exists($doctor->image)){
            unlink($doctor->image);
        }
        $doctor->delete();
        return Response::json([
            'status'  => 200,
            'message' => 'Doctor successfully deleted'
        ]);
    }
}

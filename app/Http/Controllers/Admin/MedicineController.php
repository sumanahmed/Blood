<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Symptom;
use App\Models\Doctor;
use Validator;
use Response;

class MedicineController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */

     /**
      * Get all medicine
      */
    public function index(){

        $medicines      = Medicine::join('symptoms','symptoms.id','medicines.symptom_id')
                            ->join('doctors','doctors.id','medicines.doctor_id')
                            ->select('medicines.*','symptoms.name as symptom_name','doctors.name as doctor_name')
                            ->orderBy('symptoms.id','DESC')
                            ->get();
                            
        $symptoms= Symptom::all();
        $doctors= Doctor::all();
        return view('blood.admin.medicine.medicine', compact('medicines','symptoms','doctors'));
    }

    /**
     * Medicine store
     */
    public function store(Request $request)
    { 
        $validators=Validator::make($request->all(),[
            'symptom_id'  => 'required',
            'doctor_id'  => 'required',
            'name'  => 'required',
            'dose'  => 'required',
            'status'  => 'required',
        ]);

        if($validators->fails()){ 
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        } 
        $medicine                = new Medicine();
        $medicine->symptom_id    = $request->symptom_id;
        $medicine->doctor_id     = $request->doctor_id;
        $medicine->name          = $request->name;
        $medicine->status        = $request->status;
        $medicine->dose          = $request->dose;

        if($medicine->save()){
            $medicine = Medicine::join('symptoms','symptoms.id','medicines.symptom_id')
                        ->join('doctors','doctors.id','medicines.doctor_id')
                        ->select('medicines.*','symptoms.name as symptom_name','doctors.name as doctor_name')
                        ->where('medicines.id', $medicine->id)
                        ->first();
            return Response::json([
                'status'    => 201,
                'message'   => "Medicine created successfully",
                'data'      => $medicine
            ]);
        }else{
            return Response::json([
                'status'        => 403,
                'error_message' => "Sorry, something went wrong",
                'data'          => []
            ]);
        }
    }
    

     /**
      * Medicine Update
      */
    public function update(Request $request)
    { 
        $validators=Validator::make($request->all(),[
            'symptom_id' => 'required',
            'doctor_id' => 'required',
            'name' => 'required',
            'dose' => 'required',
            'status' => 'required',
        ]);

        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }

        $medicine                = Medicine::find($request->id);
        $medicine->symptom_id    = $request->symptom_id;
        $medicine->doctor_id     = $request->doctor_id;
        $medicine->name          = $request->name;
        $medicine->dose          = $request->dose;
        $medicine->status        = $request->status;
        if($medicine->update()){
            $medicine = Medicine::join('symptoms','symptoms.id','medicines.symptom_id')
                            ->join('doctors','doctors.id','medicines.doctor_id')
                            ->select('medicines.*','symptoms.name as symptom_name','doctors.name as doctor_name')
                            ->where('medicines.id', $medicine->id)
                            ->first();
                            
            return Response::json([
                'status'    => 201,
                'message'   => "Medicine updated successfully",
                'data'      => $medicine
            ]);
        }else{
            return Response::json([
                'status'        => 403,
                'error_message' => "Sorry, something went wrong",
                'data'          => []
            ]);
        }       
    }

     /**
      * Medicine delete
      */
    public function destroy(Request $request)
    {
        $medicine = Medicine::find($request->id); 
        $medicine->delete();
        return Response::json([
            'status'  => 200,
            'message' => 'Medicine successfully deleted'
        ]);
    }
}


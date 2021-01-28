<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Symptom;
use Validator;
use Response;

class SymptomController extends Controller
{
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */

    /**
     * Symptom all get
     */
    public function index(){
        $symptomS = Symptom::get();
        return view('blood.admin.symptom.symptom', compact('symptomS'));
    }
   
   /**
    *Symptom Store 
    */ 
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'name'    => 'required',
            'days'    => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }
        $symptom            = new Symptom();
        $symptom->name      = $request->name;            
        $symptom->days      = $request->days;            
        if($symptom->save()){
            return Response::json([
                'status'    => 201,
                'message'   => "Symptom created successfully",
                'data'      => $symptom
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
     * Symptom Update
     */
    public function update(Request $request){ 
        $validators=Validator::make($request->all(),[
            'name'    => 'required',
            'days'    => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }
        $symptom            = Symptom::find($request->id);
        $symptom->name      = $request->name;            
        $symptom->days      = $request->days;              
        if($symptom->update()){
            return Response::json([
                'status'    => 201,
                'message'   => "Symptom updated successfully",
                'data'      => $symptom
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
     * Symptom Destroy
     */
    public function destroy(Request $request){
        $symptom = Symptom::find($request->id)->delete();
        return Response::json([
            'status'  => 200,
            'message' => 'Symptom successfully deleted'
        ]);
    }
}

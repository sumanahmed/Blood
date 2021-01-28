<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ambulance;
use Validator;
use Response;


class AmbulanceController extends Controller
{

    /**
     * Undocumented function
     *
     * @return void
     */

    public function index()
    {
        $ambulances = Ambulance::all();
        return view('blood.admin.ambulance.ambulance', compact('ambulances'));
    }

    /**
    * Ambulance Data store 
    */
    public function store(Request $request)
    {
        $validators=Validator::make($request->all(),[
             'name'          => 'required',
            'driver_name'    => 'required',
            'driver_phone'   => 'required',
        ]);

        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }

        $ambulance                  = new Ambulance();
        $ambulance->name            = $request->name;
        $ambulance->driver_name     = $request->driver_name;
        $ambulance->driver_phone    = $request->driver_phone;
        
        if($ambulance->save()){
            return Response::json([
                'status'    => 201,
                'message'   => "Ambulance created successfully",
                'data'      => $ambulance
            ]);
        }else {
            return Response::json([
                'status'    => 403,
                'message'   => "Sorry,Something Went Wrong",
                'data'      => []
            ]); 
        }

    }

    /**
     * Ambulance Update
     */
    public function update(Request $request)
    {
        $validators=Validator::make($request->all(),[
            'name'           => 'required',
            'driver_name'    => 'required',
            'driver_phone'   => 'required',
        ]);

        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }

        $ambulanceUpdate                  = Ambulance::find($request->id);
        $ambulanceUpdate->name            = $request->name;
        $ambulanceUpdate->driver_name     = $request->driver_name;
        $ambulanceUpdate->driver_phone    = $request->driver_phone;            
        if($ambulanceUpdate->update()){
            return Response::json([
                'status'    => 201,
                'message'   => "Ambulance updated successfully",
                'data'      => $ambulanceUpdate
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
     * Ambulance Destroy
     */

     //delete
    public function destroy(Request $request){

        $ambulamce = Ambulance::find($request->id)->delete();

        return Response::json([
            'status'  => 200,
            'message' => 'Ambulance successfully deleted'
        ]);
    }
}

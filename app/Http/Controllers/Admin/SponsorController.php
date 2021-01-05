<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Response;
use App\Models\Sponsor;

class SponsorController extends Controller
{
    //get all sponsor
    public function index(){
        $sponsors = Sponsor::all();
        return view('blood.admin.sponsor.sponsor', compact('sponsors'));
    }

    //sponsor store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'title'  => 'required',
            'image' => 'required',
            'link' => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $sponsor           = new Sponsor();
            $sponsor->title    = $request->title;
            $sponsor->link     = $request->link;
            if($request->image){
                $image          = $request->file('image');
                $image_name     = "sponsor_".time().".".$image->getClientOriginalExtension();
                $directory      = 'blood/admin/uploads/images/sponsor/';
                $image->move($directory, $image_name);
                $image_url      = $directory.$image_name;
                $sponsor->image    = $image_url;
            }
            if($sponsor->save()){
                return Response::json([
                    'status'    => 201,
                    'message'   => "Sponsor created successfully",
                    'data'      => $sponsor
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

    //sponsor update
    public function update(Request $request){ 
        $validators=Validator::make($request->all(),[
            'title'      => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $sponsor            = Sponsor::find($request->id);
            $sponsor->title     = $request->title;
            $sponsor->link      = $request->link;
            if($request->image){
                if($sponsor->image != null && file_exists($sponsor->image)){
                    unlink($sponsor->image);
                }
                $image          = $request->file('image');
                $image_name     = "slider_".time().".".$image->getClientOriginalExtension();
                $directory      = 'blood/admin/uploads/images/slider/';
                $image->move($directory, $image_name);
                $image_url      = $directory.$image_name;
                $sponsor->image= $image_url;
            }
            if($sponsor->save()){
                return Response::json([
                    'status'    => 201,
                    'message'   => "Sponsor updated successfully",
                    'data'      => $sponsor
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

    //sponsor delete
    public function destroy(Request $request){
        $sponsor = Sponsor::find($request->id); 
        if(($sponsor->image != null) && file_exists($sponsor->image)){
            unlink($sponsor->image);
        }
        $sponsor->delete();
        return Response::json([
            'status'  => 200,
            'message' => 'Sponsor successfully deleted'
        ]);
    }
}

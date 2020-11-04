<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Validator;
use Response;

class SliderController extends Controller
{
    ///get all slider
    public function index(){
        $sliders = Slider::all();
        return view('blood.admin.slider.slider', compact('sliders'));
    }

    //slider store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'title'  => 'required',
            'image' => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $slider           = new Slider();
            $slider->title     = $request->title;
            if($request->image){
                $image          = $request->file('image');
                $image_name     = "slider_".time().".".$image->getClientOriginalExtension();
                $directory      = 'blood/admin/uploads/images/slider/';
                $image->move($directory, $image_name);
                $image_url      = $directory.$image_name;
                $slider->image    = $image_url;
            }
            if($slider->save()){
                return Response::json([
                    'status'    => 201,
                    'message'   => "Slider created successfully",
                    'data'      => $slider
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

    //slider update
    public function update(Request $request){ 
        $validators=Validator::make($request->all(),[
            'title'      => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $slider            = Slider::find($request->id);
            $slider->title     = $request->title;
            if($request->image){
                if($slider->image != null && file_exists($slider->image)){
                    unlink($slider->image);
                }
                $image          = $request->file('image');
                $image_name     = "slider_".time().".".$image->getClientOriginalExtension();
                $directory      = 'blood/admin/uploads/images/slider/';
                $image->move($directory, $image_name);
                $image_url      = $directory.$image_name;
                $slider->image= $image_url;
            }
            if($slider->save()){
                return Response::json([
                    'status'    => 201,
                    'message'   => "Slider created successfully",
                    'data'      => $slider
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

    //slider delete
    public function destroy(Request $request){
        $slider = Slider::find($request->id); 
        if(($slider->image != null) && file_exists($slider->image)){
            unlink($slider->image);
        }
        $slider->delete();
        return Response::json([
            'status'  => 200,
            'message' => 'Slider successfully deleted'
        ]);
    }
}

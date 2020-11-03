<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Validator;
use Response;

class GalleryController extends Controller
{
    //get all user
    public function index(){
        $gallerys = Gallery::all();
        return view('blood.admin.gallery.gallery', compact('gallerys'));
    }

    //user store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'name'  => 'required',
            'image' => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $gallery           = new Gallery();
            $gallery->name     = $request->name;
            if($request->image){
                $image          = $request->file('image');
                $image_name     = "gallery_".time().".".$image->getClientOriginalExtension();
                $directory      = 'blood/admin/uploads/images/gallery/';
                $image->move($directory, $image_name);
                $image_url      = $directory.$image_name;
                $gallery->image    = $image_url;
            }
            if($gallery->save()){
                return Response::json([
                    'status'    => 201,
                    'message'   => "Gallery Image created successfully",
                    'data'      => $gallery
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

    //user update
    public function update(Request $request){ 
        $validators=Validator::make($request->all(),[
            'name'      => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $gallery           = Gallery::find($request->id);
            $gallery->name     = $request->name;
            if($request->image){
                if($gallery->image != null && file_exists($gallery->image)){
                    unlink($gallery->image);
                }
                $image          = $request->file('image');
                $image_name     = "gallery_".time().".".$image->getClientOriginalExtension();
                $directory      = 'blood/admin/uploads/images/gallery/';
                $image->move($directory, $image_name);
                $image_url      = $directory.$image_name;
                $gallery->image= $image_url;
            }
            if($gallery->save()){
                return Response::json([
                    'status'    => 201,
                    'message'   => "Gallery Image created successfully",
                    'data'      => $gallery
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

    //user delete
    public function destroy(Request $request){
        $gallery = Gallery::find($request->id); 
        if(($gallery->image != null) && file_exists($gallery->image)){
            unlink($gallery->image);
        }
        $gallery->delete();
        return Response::json([
            'status'  => 200,
            'message' => 'Gallery Image successfully deleted'
        ]);
    }
}

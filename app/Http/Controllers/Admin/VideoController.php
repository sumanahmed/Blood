<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Validator;
use Response;

class VideoController extends Controller
{
    //get all video
    public function index(){
        $videos = Video::orderBy('id','DESC')->get();
        return view('blood.admin.video.video', compact('videos'));
    }

    //user store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'title' => 'required',
            'link'  => 'required',
            'image' => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $video           = new Video();
            $video->title    = $request->title;
            $video->link     = $request->link;
            if($request->image){
                $image          = $request->file('image');
                $image_name     = "video_".time().".".$image->getClientOriginalExtension();
                $directory      = 'blood/admin/uploads/images/video/';
                $image->move($directory, $image_name);
                $image_url      = $directory.$image_name;
                $video->image    = $image_url;
            }
            if($video->save()){
                return Response::json([
                    'status'    => 201,
                    'message'   => "Video created successfully",
                    'data'      => $video
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
            'title' => 'required',
            'link'  => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $video           = Video::find($request->id);
            $video->title    = $request->title;
            $video->link     = $request->link;
            if($request->image){
                if($video->image != null && file_exists($video->image)){
                    unlink($video->image);
                }
                $image          = $request->file('image');
                $image_name     = "video_".time().".".$image->getClientOriginalExtension();
                $directory      = 'blood/admin/uploads/images/video/';
                $image->move($directory, $image_name);
                $image_url      = $directory.$image_name;
                $video->image= $image_url;
            }
            if($video->save()){
                return Response::json([
                    'status'    => 201,
                    'message'   => "Video updated successfully",
                    'data'      => $video
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
        $video = Video::find($request->id); 
        if(($video->image != null) && file_exists($video->image)){
            unlink($video->image);
        }
        $video->delete();
        return Response::json([
            'status'  => 200,
            'message' => 'Video successfully deleted'
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Validator;
use Response;

class PostController extends Controller
{
    //get all posts
    public function index(){
        $posts      = Blog::orderBy('id','DESC')->get();
        $categories = Category::all();
        return view('blood.admin.blog.post.post', compact('posts','categories'));
    }

    //post store
    public function store(Request $request){ 
        $validators=Validator::make($request->all(),[
            'title'         => 'required',
            'description'   => 'required',
            'thumbnail'     => 'required',
            'category_id '  => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $blog               = new Blog();
            $blog->title        = $request->title;
            $blog->description  = $request->description;
            $blog->category_id  = $request->category_id;
            if($request->thumbnail){
                $thumbnail          = $request->file('thumbnail');
                $thumbnail_name     = "thumbnail_".time().".".$thumbnail->getClientOriginalExtension();
                $directory          = 'blood/backend/uploads/images/thumbnail/';
                $thumbnail->move($directory, $thumbnail_name);
                $thumbnail_url      = $directory.$thumbnail_name;
                $blog->thumbnail    = $thumbnail_url;
            } dd($blog);
            if($blog->save()){
                return Response::json([
                    'status'    => 201,
                    'message'   => "Post created successfully",
                    'data'      => $blog
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

    //post update
    public function update(Request $request){ 
        $validators=Validator::make($request->all(),[
            'title'         => 'required',
            'description'   => 'required',
            'thumbnail'     => 'required',
            'category_id '  => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $blog               = Blog::find($request->id);
            $blog->title        = $request->title;
            $blog->description  = $request->description;
            $blog->category_id  = $request->category_id;
            if($request->thumbnail){
                if($blog->thumbnail != null && file_exists($blog->thumbnail)){
                    unlink($blog->thumbnail);
                }
                $thumbnail          = $request->file('thumbnail');
                $thumbnail_name     = "thumbnail_".time().".".$thumbnail->getClientOriginalExtension();
                $directory          = 'blood/backend/uploads/images/thumbnail/';
                $thumbnail->move($directory, $thumbnail_name);
                $thumbnail_url      = $directory.$thumbnail_name;
                $blog->thumbnail= $thumbnail_url;
            }
            if($blog->save()){
                return Response::json([
                    'status'    => 201,
                    'message'   => "Post updated successfully",
                    'data'      => $blog
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

    //post delete
    public function destroy(Request $request){
        $blog = Blog::find($request->id); 
        if(($blog->thumbnail != null) && file_exists($blog->thumbnail)){
            unlink($blog->thumbnail);
        }
        $blog->delete();
        return Response::json([
            'status'  => 200,
            'message' => 'Blog successfully deleted'
        ]);
    }
}

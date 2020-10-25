<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Response;
use App\Models\Category;

class CategoryController extends Controller
{
    //get all category
    public function index(){
        $categoreis = Category::all();
        return view('blood.admin.category.category', compact('categoreis'));
    }

    //store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'name'  => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $category           = new Category();
            $category->name     = $request->name;            
            if($category->save()){
                return Response::json([
                    'status'    => 201,
                    'message'   => "Category created successfully",
                    'data'      => $category
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

    //update
    public function update(Request $request){ 
        $validators=Validator::make($request->all(),[
            'name'  => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $category           = Category::find($request->id);
            $category->name     = $request->name;            
            if($category->update()){
                return Response::json([
                    'status'    => 201,
                    'message'   => "Category created successfully",
                    'data'      => $category
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

    //delete
    public function destroy(Request $request){
        $category = Category::find($request->id)->delete();
        return Response::json([
            'status'  => 200,
            'message' => 'Category successfully deleted'
        ]);
    }
}

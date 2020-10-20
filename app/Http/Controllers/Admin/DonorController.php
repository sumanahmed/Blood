<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BloodGroup;
use App\Models\District;
use App\Models\Division;
use App\Models\Donor;
use Illuminate\Http\Request;
use Validator;
use Response;

class DonorController extends Controller
{
    //get all donor
    public function index(){
        $donors         = Donor::all();
        $blood_groups   = BloodGroup::all();
        $divisions      = Division::orderBy('name','ASC')->get();
        return view('blood.admin.donor.donor', compact('donors','blood_groups','divisions'));
    }

    //donor store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'en_name'  => 'required',
            'bn_name'  => 'required',
            'status'   => 'required',
            'image'    => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $master_category                    = new MasterCategory();
            $master_category->en_name           = $request->en_name;
            $master_category->bn_name           = $request->bn_name;
            $master_category->en_description    = $request->en_description ? $request->en_description : NULL;
            $master_category->bn_description    = $request->bn_description ? $request->bn_description : NULL;
            $master_category->status            = $request->status;
            if($request->image){
                $image          = $request->file('image');
                $image_name     = "master_category_".time().".".$image->getClientOriginalExtension();
                $directory      = 'shobuj_bazar/backend/uploads/images/master-category/';
                $image->move($directory, $image_name);
                $image_url      = $directory.$image_name;
                $master_category->image   = $image_url;
            }
            if($master_category->save()){
                return Response::json([
                    'status'    => 201,
                    'message'   => "Master Category Created",
                    'data'      => $master_category
                ]);
            }else{
                return Response::json([
                    'status'        => 403,
                    'error_message' => "Something went wrong",
                    'data'          => []
                ]);
            }
        }
    }

    //donor update
    public function update(Request $request){
        $validators=Validator::make($request->all(),[
            'en_name'  => 'required',
            'bn_name'  => 'required',
            'status'   => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $master_category                    = MasterCategory::find($request->id);
            $master_category->en_name           = $request->en_name;
            $master_category->bn_name           = $request->bn_name;
            $master_category->en_description    = $request->en_description ? $request->en_description : NULL;
            $master_category->bn_description    = $request->bn_description ? $request->bn_description : NULL;
            $master_category->status            = $request->status;
            if($request->image){
                if($master_category->image != null && file_exists($master_category->image)){
                    unlink($master_category->image);
                }
                $image          = $request->file('image');
                $image_name     = "master_category_".time().".".$image->getClientOriginalExtension();
                $directory      = 'shobuj_bazar/backend/uploads/images/master-category/';
                $image->move($directory, $image_name);
                $image_url      = $directory.$image_name;
                $master_category->image   = $image_url;
            }
            if($master_category->update()){
                return Response::json([
                    'status'    => 201,
                    'message'   => "Master Category Update",
                    'data'      => $master_category
                ]);
            }else{
                return Response::json([
                    'status'        => 403,
                    'error_message' => "Something went wrong",
                    'data'          => []
                ]);
            }
        }
    }

    //donor destroy
    public function destroy(Request $request)
    {
        $master_category = MasterCategory::find($request->id);
        $category  = Category::where('master_category_id', $request->id)->first();
        $product  = Product::where('master_category_id', $request->id)->first();
        if($category != null){            
            return Response::json([
                'status'  => 403,
                'message' => 'Sorry, this master category used in category table'
            ]);
        }else if($product != null){            
            return Response::json([
                'status'  => 403,
                'message' => 'Sorry, this master category used in product table'
            ]);
        }else{ 
            if(($master_category->image != null) && file_exists($master_category->image)){
                unlink($master_category->image);
            }
            $master_category->delete();
            return Response::json([
                'status'  => 200,
                'message' => 'This master category deleted'
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Response;
use App\Models\Campaign;

class CampaignController extends Controller
{
    //get all Campaign
    public function index(){
        $campaigns = Campaign::all();
        return view('blood.admin.campaign.campaign', compact('campaigns'));
    }

    //Campaign store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'title'         => 'required',
            'description'   => 'required',
            'date'          => 'required',
            'location'      => 'required',
            'status'        => 'required',
            'image'         => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $campaign               = new Campaign();
            $campaign->title        = $request->title;
            $campaign->description  = $request->description;
            $campaign->date         = $request->date;
            $campaign->location     = $request->location;
            $campaign->status       = $request->status;
            if($request->image){
                $image          = $request->file('image');
                $image_name     = "campaign_".time().".".$image->getClientOriginalExtension();
                $directory      = 'blood/admin/uploads/images/campaign_/';
                $image->move($directory, $image_name);
                $image_url      = $directory.$image_name;
                $campaign->image    = $image_url;
            }
            if($campaign->save()){
                return Response::json([
                    'status'    => 201,
                    'message'   => "Campaign created successfully",
                    'data'      => $campaign
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

    //Campaign update
    public function update(Request $request){ 
        $validators=Validator::make($request->all(),[
            'title'         => 'required',
            'description'   => 'required',
            'date'          => 'required',
            'location'      => 'required',
            'status'        => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $campaign               = Campaign::find($request->id);
            $campaign->title        = $request->title;
            $campaign->description  = $request->description;
            $campaign->date         = $request->date;
            $campaign->location     = $request->location;
            $campaign->status       = $request->status;
            if($request->image){
                if($campaign->image != null && file_exists($campaign->image)){
                    unlink($campaign->image);
                }
                $image          = $request->file('image');
                $image_name     = "campaign__".time().".".$image->getClientOriginalExtension();
                $directory      = 'blood/admin/uploads/images/campaign_/';
                $image->move($directory, $image_name);
                $image_url      = $directory.$image_name;
                $campaign->image= $image_url;
            }
            if($campaign->save()){
                return Response::json([
                    'status'    => 201,
                    'message'   => "Campaign updated successfully",
                    'data'      => $campaign
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

    //Campaign delete
    public function destroy(Request $request){
        $campaign = Campaign::find($request->id); 
        if(($campaign->image != null) && file_exists($campaign->image)){
            unlink($campaign->image);
        }
        $campaign->delete();
        return Response::json([
            'status'  => 200,
            'message' => 'Campaign successfully deleted'
        ]);
    }
}

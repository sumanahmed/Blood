<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Response;
use App\Models\Faq;

class FaqController extends Controller
{
    //get all category
    public function index(){
        $faqs = Faq::all();
        return view('blood.admin.faq.faq', compact('faqs'));
    }

    //store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'question'  => 'required',
            'answer'    => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }
        $faq            = new Faq();
        $faq->question  = $request->question;            
        $faq->answer    = $request->answer;            
        if($faq->save()){
            return Response::json([
                'status'    => 201,
                'message'   => "FAQ created successfully",
                'data'      => $faq
            ]);
        }else{
            return Response::json([
                'status'        => 403,
                'error_message' => "Sorry, something went wrong",
                'data'          => []
            ]);
        }
        
    }

    //update
    public function update(Request $request){ 
        $validators=Validator::make($request->all(),[
            'question'  => 'required',
            'answer'    => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }
        $faq            = Faq::find($request->id);
        $faq->question  = $request->question;            
        $faq->answer    = $request->answer;            
        if($faq->update()){
            return Response::json([
                'status'    => 201,
                'message'   => "FAQ updated successfully",
                'data'      => $faq
            ]);
        }else{
            return Response::json([
                'status'        => 403,
                'error_message' => "Sorry, something went wrong",
                'data'          => []
            ]);
        }       
    }

    //delete
    public function destroy(Request $request){
        $faq = Faq::find($request->id)->delete();
        return Response::json([
            'status'  => 200,
            'message' => 'FAQ successfully deleted'
        ]);
    }
}

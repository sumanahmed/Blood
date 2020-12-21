<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Response;
use App\User;

class UserController extends Controller
{
    //get all user
    public function index(){
        $users = User::all();
        return view('blood.admin.user.user', compact('users'));
    }

    //user store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'name'      => 'required',
            'email'     => 'required|unique:users',
            'phone'     => 'required',
            'password'  => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $user           = new User();
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->phone    = $request->phone;
            $user->password = bcrypt($request->password);
            if($request->thumbnail){
                $image          = $request->file('thumbnail');
                $image_name     = "user_".time().".".$image->getClientOriginalExtension();
                $directory      = 'blood/admin/uploads/images/user/';
                $image->move($directory, $image_name);
                $image_url      = $directory.$image_name;
                $user->thumbnail= $image_url;
            }
            if($user->save()){
                return Response::json([
                    'status'    => 201,
                    'message'   => "User created successfully",
                    'data'      => $user
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

    //show user edit page
    public function edit($id){
        $user = User::find($id);
        return view('blood.admin.user.edit', compact('user'));
    }

    //user update
    public function userUpdate(Request $request, $id){ 
        $this->validate($request,[
            'name'      => 'required',
            'email'     => 'required',
            'phone'     => 'required',
        ]);
      
        $user           = User::find($id);
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->phone    = $request->phone;
        if(isset($request->password)){
            $user->password = bcrypt($request->password);
        }
        if($request->thumbnail){
            if($user->thumbnail != null && file_exists($user->thumbnail)){
                unlink($user->thumbnail);
            }
            $image          = $request->file('thumbnail');
            $image_name     = "user_".time().".".$image->getClientOriginalExtension();
            $directory      = 'blood/admin/uploads/images/user/';
            $image->move($directory, $image_name);
            $image_url      = $directory.$image_name;
            $user->thumbnail= $image_url;
        }
        if($user->update()){
            return redirect()->route('backend.user.index')->with('message','User updated successfully');
        }else{
            return redirect()->route('backend.user.index')->with('error_message','Sorry, something went wrong');            
        }       
    }

    //user update
    public function update(Request $request){ 
        $validators=Validator::make($request->all(),[
            'name'      => 'required',
            'email'     => 'required',
            'phone'     => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $user           = User::find($request->id);
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->phone    = $request->phone;
            if(isset($request->password)){
                $user->password = bcrypt($request->password);
            }
            if($request->thumbnail){
                if($user->thumbnail != null && file_exists($user->thumbnail)){
                    unlink($user->thumbnail);
                }
                $image          = $request->file('thumbnail');
                $image_name     = "user_".time().".".$image->getClientOriginalExtension();
                $directory      = 'blood/admin/uploads/images/user/';
                $image->move($directory, $image_name);
                $image_url      = $directory.$image_name;
                $user->thumbnail= $image_url;
            }
            if($user->save()){
                return Response::json([
                    'status'    => 201,
                    'message'   => "User updated successfully",
                    'data'      => $user
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
        $user = User::find($request->id); 
        if(($user->thumbnail != null) && file_exists($user->thumbnail)){
            unlink($user->thumbnail);
        }
        $user->delete();
        return Response::json([
            'status'  => 200,
            'message' => 'User successfully deleted'
        ]);
    }
}

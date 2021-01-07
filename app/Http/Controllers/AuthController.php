<?php

namespace App\Http\Controllers;

use App\Models\utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\utilisateurs;

class AuthController extends Controller
{
    public function signup(Request $request){

        $validator = Validator::make($request->all(), ['name'=>'required',
        'email'=>'required',
        'password'=>'required',]);

        if ($validator->fails()){
            $arr = array('status' =>'false', 'message'=>$validator->errors()->all());
           }else{
              $check_status = utilisateur::where('email', $request->email)->get()->toArray();
              if($check_status){
                  $arr = array('status'=>'false', 'message'=>'Email Already Exist');
              }else{
               $new = new utilisateur();
               $new->name=$request->name;
               $new->email=$request->email;
               $new->phone=$request->phone;
               $new->pin_code=$request->pin_code;
               $new->address=$request->address;
               $new->status=$request->status;
               $new->password=$request->password;
               $new->save();
               $arr=array('status'=>'true', 'message'=>'success');
            }
            }
            echo json_encode($arr);

    }

    public function login(Request $request){

        $validator = Validator::make($request->all(), ['email'=>'required',
        'password'=>'required',]);

        if ($validator->fails()){
            $arr = array('status' =>'false', 'message'=>$validator->errors()->all());
           }else{
               $check_status = utilisateur::where('email', $request->email)->where('password', $request->password)->get()->toArray();
               if($check_status){
                   $arr = array('status'=>'true', 'message'=>'success', 'data'=>$check_status);
                    }else{
                        $arr = array('status'=>'false', 'message'=>'Please Enter a Valid Email And Password');
                    }

    }
    echo json_encode($arr);


}
}

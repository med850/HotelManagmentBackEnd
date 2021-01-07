<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\utilisateur;
use Illuminate\Support\Facades\Validator;


class UserApi extends Controller
{
    public function update_profile(Request $request){

        $validator = Validator::make($request->all(), ['user_id'=>'required', 'name'=>'required', 'email'=>'required', 'phone'=>'required']);
        if ($validator->fails()){
            $arr = array('status' =>'false', 'message'=>$validator->errors()->all());

           }else{
              
            if($request->password!=''){

                    if($request->password!=$request->rpassword){
                        echo json_encode(array('status'=>'false', 'message'=>'Not compatible password'));
                        die();
                    }
               }
               $user = utilisateur::where('id', $request->user_id)->first();
               $user->name=$request->name;
               $user->country=$request->country;
               $user->state=$request->state;
               $user->city=$request->city;
               $user->address=$request->address;
               $user->phone=$request->phone;
               $user->pin_code=$request->pin_code;
               
               if($request->password!='')
                   $user->password=$request->password;
                   $user->update();
                   $arr = array('status'=>'true','message'=>'sucess' );
               

            } 

            echo json_encode($arr);

    }


    public function get_user_info($id){

        $user_info = utilisateur::select('name', 'country', 'state', 'city', 'address', 'phone', 'pin_code')->where('id', $id)->get()->toArray();
        $arr=array('status'=>'true', 'message'=>'success', 'data'=>$user_info);
        echo json_encode($arr);
    }


}

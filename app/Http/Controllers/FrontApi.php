<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\ContactQuey;
use App\Models\SubscriberUsers;
use App\Models\service;
use App\Models\RoomBookingRequest;
use App\Models\Room_type;
use App\Models\feedback_type;
use App\Models\feedBack;


class FrontApi extends Controller
{
    public function testing(Request $request){
      print_r($request->all()); 
    }
    //Add a contact (Client)
    public function save_contact(Request $request){
      $validator = Validator::make($request->all(), ['name'=>'required', 'email'=>'required', 'phone'=>'required', 'message'=>'required']);
      if ($validator->fails()){
       $arr = array('status' =>'false', 'message'=>$validator->errors()->all());
      }else{
        $obj = new ContactQuey();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->phone = $request->phone;
        $obj->message = $request->message;
        $obj->save();
        $arr = array('status' =>'true', 'message'=>'Contact Query Successfully Send');
      }
      echo json_encode($arr);
      
    }
  /* public function saveContact(Request $request){
            $validator = Validator::make($request->all(), [
             'name' => 'required',
             'email' =>'required',
             'phone' => 'required',
              'message' => 'required',
              ]);
              if ($validator->fails()){
               $arr = array('status' =>'false', 'message'=>$validator->errors()->all());

              }else{

                $obj = new ContactQuey();
                $obj->name = $request->name;
                $obj->email = $request->email;
                $obj->phone = $request->phone;
                $obj->message = $request->message;
                $obj->save();
                $arr = array('status' =>'true', 'message'=>'Contact Query Successfully Send');
              }
              echo json_encode($arr);
    }*/


//Add new client Subs
        public function subscribe_user(Request $request){
            $validator = Validator::make($request->all(), ['email'=>'required']);
            if($validator->fails()){
              $arr = array('status'=>'false', 'message'=>$validator->errors()->all());
            }else{
                $checkStatus = SubscriberUsers::where('email', $request->email)->get()->toArray();
                if($checkStatus){
                  $arr = array('status'=>'false', 'message'=>'Email Alredy Exist');
                }else{
                $subscriber = new SubscriberUsers();
                $subscriber->email=$request->email;
                $subscriber->save();
                $arr = array('status'=>'true', 'message'=>'Thank You ');
              }
              }
            echo json_encode($arr);
        }


        public function get_service(){

          $services = service::get()->toArray();
          
          if($services){
            
            $arr = array('status'=>'true', 'message'=>'success', 'data'=>$services);
          } 
          else{
          
            $arr = array('status'=>'false', 'message'=>'Service Not Found');
          
          }
          echo json_encode($arr);
        }


        public function room_booking_request(Request $request){

          $validator = Validator::make($request->all(), ['name'=>'required', 'email'=>'required', 'phone'=>'required']);
          if ($validator->fails()){
            $arr = array('status' =>'false', 'message'=>$validator->errors()->all());
           }else{
             $obj = new RoomBookingRequest();
             $obj->name = $request->name;
             $obj->email = $request->email;
             $obj->phone = $request->phone;
             $obj->address = $request->address;



             $obj->from_date = $request->from_date;
             $obj->to_date = $request->to_date;
             $obj->number_of_members = $request->number_of_members;
             $obj->number_of_rooms = $request->number_of_rooms;
             $obj->room_type = $request->room_type;
             $obj->status = 0;


             $obj->save();
             $arr = array('status' =>'true', 'message'=>'Success');

           }
           echo json_encode($arr);

          }

          public function get_room_type(){
            $room_type = Room_type::select(['id', 'title'])->where('status', '1')->get()->toArray();
            if($room_type)
              $arr = array('status'=>'true', 'message'=>'success', 'data'=>$room_type);
            else
              $arr = array('status'=>'false', 'message'=>'Room Type Not Found');
    
            echo json_encode($arr);
          }


          public function get_feedBack_type(){
            $feedBack_type = feedback_type::select(['id', 'title'])->where('status', '1')->get()->toArray();
            if($feedBack_type){
              $arr = array('status'=>'true', 'message'=>'success', 'data'=>$feedBack_type);
            }else{
              $arr = array('status'=>'false', 'message'=>'FeedBack Type Not Found');
            }
            echo json_encode($arr);

          }

          public function save_feedback(Request $request){
            $validator = Validator::make($request->all(), [
              'name'=>'required',
              'email'=>'required',
              'phone'=>'required',
              'feedback_type'=>'required',
              'message'=>'required']);

              if ($validator->fails()){
                $arr = array('status' =>'false', 'message'=>$validator->errors()->all());
               }else{
                  $feedback = new feedBack();
                  $feedback->name=$request->name;
                  $feedback->email=$request->email;
                  $feedback->phone=$request->phone;
                  $feedback->feedback_type=$request->feedback_type;
                  $feedback->message=$request->message;
                  $feedback->save();
                  $arr = array('status'=>'true', 'message'=>'success');

               }
               echo json_encode($arr);

          }


  }

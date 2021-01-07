<?php

use App\Http\Controllers\FrontApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserApi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/test', [FrontApi::class, 'testing']);
//Route::post('/contact-form', [FrontApi::class, 'saveContact']);
Route::post('/contact-form', [FrontApi::class, 'save_contact']);
Route::post('/subs-user', [FrontApi::class, 'subscribe_user']);
Route::get('/get-service', [FrontApi::class, 'get_service']);
Route::post('/room_booking_request', [FrontApi::class, 'room_booking_request']);
Route::get('/get-room-type', [FrontApi::class, 'get_room_type']);
Route::get('/get-feedback-type', [FrontApi::class, 'get_feedBack_type']);
Route::post('/save-feedback', [FrontApi::class, 'save_feedback']);
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/update_profile', [UserApi::class, 'update_profile']);
Route::get('/get_user_info/{id}', [UserApi::class, 'get_user_info']);






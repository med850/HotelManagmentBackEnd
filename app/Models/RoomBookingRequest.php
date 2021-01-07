<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomBookingRequest extends Model
{
protected $table = "room_booking_requests";
protected $primaryKey = "id";
protected $fillable = ['name', 'email', 'phone', 'address', 'from_date', 'to_date', 'number_of_members', 'number_of_rooms', 'room_type', 'status'];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_type extends Model
{
    protected $table = "room_types";
    protected $primaryKey = "id";
    protected $fillable = ['title', 'status'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedBack extends Model
{
    protected $table = "feed_backs";
    protected $primaryKey = "id";
    protected $fillable = ['name', 'email', 'phone', 'feedback_type', 'message'];
}

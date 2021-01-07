<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriberUsers extends Model
{
    protected $table = "subscriber_users";
    protected $primaryKey = "id";
    protected $fillable = ['email'];
}

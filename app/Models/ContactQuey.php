<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactQuey extends Model
{
    protected $table = "contact_queys";
    protected $primaryKey = "id";
    protected $fillable = ['name', 'email', 'phone', 'message'];
}

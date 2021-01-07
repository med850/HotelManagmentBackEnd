<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class utilisateur extends Model
{
    protected $table = "utilisateurs";
    protected $primaryKey = "id";
    protected $fillable = ['name', 'email', 'phone', 'address', 'password', 'pin_code', 'status' ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $table="services";
    protected $primaryKey="id";
    protected $fillable=['title', 'image', 'description'];
}

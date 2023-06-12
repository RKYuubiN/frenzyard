<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $fillable = ['username','age','contact','password'];

    protected $hidden = ['password'];

    protected $casts = [
        'password'=>'hashed'
    ];
}

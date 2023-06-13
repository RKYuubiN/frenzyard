<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['username','age','contact','password'];

    protected $hidden = ['password'];

    protected $casts = [
        'password'=>'hashed'
    ];
}

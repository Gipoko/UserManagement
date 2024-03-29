<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserManagement extends Model
{

    protected $fillable = [
        'id','name','email','password'
    ];
    // use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role_user extends Model
{

    protected $fillable = [
        'role_id','user_id','user_type'
    ];
    // use HasFactory;
    protected $table = 'role_user';
    protected $primaryKey = 'user_id';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffModel extends Model
{
    use HasFactory;

    protected $table = "tbl_staff";
    
    protected $fillable = ['name', 'email', 'username', 'password', 'image', 'created_at', 'updated_at'];
}

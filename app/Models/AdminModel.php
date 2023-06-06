<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    use HasFactory;

    protected $table = "tbl_admin";
    protected $fillable = ['name', 'email', 'username', 'password', 'created_at', 'updated_at'];
}

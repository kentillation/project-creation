<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    use HasFactory;

    protected $table = "tbl_student";
    
    protected $fillable = ['name', 'student_id', 'email', 'username', 'password', 'created_at', 'updated_at'];
}

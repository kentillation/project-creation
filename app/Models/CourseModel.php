<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    use HasFactory;

    protected $table = "tbl_course";
    protected $fillable = ['course'];

    public function students() {
        //return $this->hasMany(StudentModel::class, 'course_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearLevelModel extends Model
{
    use HasFactory;

    protected $table = "tbl_year_level";
    protected $fillable = ['year_level'];

    public function students() {
        //return $this->hasMany(StudentModel::class, 'course_id');
    }
}

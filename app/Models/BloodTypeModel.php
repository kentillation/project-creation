<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodTypeModel extends Model
{
    use HasFactory;

    protected $table = "tbl_blood_type";
    protected $fillable = ['blood_type'];

    public function students() {
        //return $this->hasMany(StudentModel::class, 'blood_type_id');
    }
}

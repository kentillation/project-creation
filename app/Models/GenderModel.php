<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenderModel extends Model
{
    use HasFactory;

    protected $table = "tbl_gender";
    protected $fillable = ['gender'];

    public function students() {
        return $this->hasMany(StudentModel::class, 'gender_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionModel extends Model
{
    use HasFactory;

    protected $table = "tbl_section";
    
    protected $fillable = ['section', 'created_at', 'updated_at'];

    // public function students() {
    //     return $this->hasMany(StudentModel::class, 'section_id');
    // }
}

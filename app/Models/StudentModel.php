<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    use HasFactory;

    protected $table = "tbl_student";
    
    protected $fillable = [ 'name',
                            'student_id',
                            'email',
                            'admin_email',
                            'password',
                            'first_name',
                            'middle_name',
                            'last_name',
                            'created_at',
                            'updated_at'
                        ];

    public function student_record()
    {
        return $this->hasMany(StudentRecordModel::class, 'student_id');
    }
}

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
                            'username',
                            'password',
                            'first_name',
                            'middle_name',
                            'last_name',
                            'street_address',
                            'barangay',
                            'muni_city',
                            'date_of_birth',
                            'age',
                            'civil_status',
                            'citizenship',
                            'height',
                            'weight',
                            'bmi',
                            'gender',
                            'year_level',
                            'section',
                            'blood_type',
                            'phone',
                            'created_at',
                            'updated_at'
                        ];

    public function student_record()
    {
        return $this->hasMany(StudentRecordModel::class, 'student_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRecordModel extends Model
{
    use HasFactory;

    protected $table = "tbl_student_record";
    
    protected $fillable = [ 'student_id',
                            'first_name',
                            'middle_name',
                            'last_name',
                            'street_address',
                            'barangay',
                            'muni_city',
                            'date_of_birth',
                            'age',
                            'phone',
                            'civil_status',
                            'citizenship',
                            'height',
                            'weight',
                            'bmi',
                            'gender',
                            'year_level',
                            'section',
                            'blood_type',
                            'created_at',
                            'updated_at'
                        ];
}

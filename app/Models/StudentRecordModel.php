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
                            'gender_id',
                            'year_level_id',
                            'section_id',
                            'blood_type_id',
                            'status_record_id',
                            'cbc_file',
                            'urinalysis_file',
                            'fecalysis_file',
                            'x_ray_file',
                            'hba_file',
                            'hbv_file',
                            'created_at',
                            'updated_at'
                        ];
    
    public function student()
    {
        return $this->belongsTo(StudentModel::class);
    }

    public function student_gender() {
        return $this->belongsTo(GenderModel::class, 'gender_id');
    }

    public function student_blood_type() {
        return $this->belongsTo(BloodTypeModel::class, 'blood_type_id');
    }
}

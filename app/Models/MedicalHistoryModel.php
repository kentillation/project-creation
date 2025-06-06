<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistoryModel extends Model
{
    use HasFactory;

    protected $table = "tbl_medical_history";

    protected $fillable = [
        'student_id',
        'condition_option',
        'other_condition_option',
        'symptoms_option',
        'other_symptoms_option',
        'medication',
        'allergies',
        'using_tobacco',
        'using_illegal_drug',
        'consume_alcohol',
        'created_at',
        'updated_at'
    ];

    public function student_medical_history_Belongs()
    {
        return $this->belongsTo(StudentModel::class, 'student_id');
    }
}

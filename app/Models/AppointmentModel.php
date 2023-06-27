<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentModel extends Model
{
    use HasFactory;

    protected $table = "tbl_appointment";

    protected $fillable = ['from', 'to', 'date', 'time', 'room', 'lab_test', 'status_appointment'];

    public function clinician() {
        return $this->belongsTo(ClinicianModel::class, 'from');
    }

    public function student() {
        return $this->belongsTo(StudentModel::class, 'to');
    }

}

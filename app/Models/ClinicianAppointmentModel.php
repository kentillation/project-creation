<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicianAppointmentModel extends Model
{
    use HasFactory;

    protected $table = "tbl_appointment";

    protected $fillable = ['from', 'to', 'date', 'time', 'room', 'lab_test', 'status_appointment'];

}

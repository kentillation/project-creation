<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    use HasFactory;

    protected $table = "tbl_admin";
    
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'street_number', 'street_address', 'barangay', 'muni_city', 'phone', 'email', 'username', 'password', 'created_at', 'updated_at'];

}

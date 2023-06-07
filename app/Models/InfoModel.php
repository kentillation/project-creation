<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoModel extends Model
{
    use HasFactory;

    protected $table = "tbl_gender";
    
    protected $fillable = ['name', 'created_at', 'updated_at'];
}

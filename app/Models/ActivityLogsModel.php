<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLogsModel extends Model
{
    use HasFactory;

    protected $table = "tbl_activity_logs";

    protected $fillable = (['description']);
}

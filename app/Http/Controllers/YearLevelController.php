<?php

namespace App\Http\Controllers;

use App\Models\YearLevelModel;
use Illuminate\Http\Request;

class YearLevelController extends Controller
{
    public function year_level_list() {
        $year_level = YearLevelModel::all();
        return view('year-level/year-level-list', ['tbl_year_level' => $year_level]);
    }
}

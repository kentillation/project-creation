<?php

namespace App\Http\Controllers;

use App\Models\GenderModel;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function gender_list() {
        $gender = GenderModel::all();
        return view('gender/genderlist', ['tbl_gender' => $gender]);
    }

    public function save_gender(Request $request) {
        $gender = new GenderModel;
        $gender->gender = $request->input('gender');
        $gender->save();

        return redirect(route('gender-list'))->with('success', 'Gender added successfully!');
    }
}

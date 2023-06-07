<?php

namespace App\Http\Controllers;

use App\Models\BloodTypeModel;
use Illuminate\Http\Request;

class BloodTypeController extends Controller
{
    public function blood_type_list() {
        $blood_type = BloodTypeModel::all();
        return view('blood-type/blood-type-list', ['tbl_blood_type' => $blood_type]);
    }

    public function save_blood_type(Request $request) {
        $blood_type = new BloodTypeModel;
        $blood_type->blood_type = $request->input('blood_type');
        $blood_type->save();

        return redirect(route('blood-type-list'))->with('success', 'Blood type added successfully!');
    }
}

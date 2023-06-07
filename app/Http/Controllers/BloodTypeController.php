<?php

namespace App\Http\Controllers;

use App\Models\BloodTypeModel;
use Illuminate\Http\Request;

class BloodTypeController extends Controller
{
    //Create blood type function
    // public function create_blood_type() {
    //     return view('info/blood-type/blood-type-list');
    // }

    //Save blood type function
    public function save_blood_type(Request $request) {
        $blood_type = new BloodTypeModel;
        $blood_type->blood_type = $request->input('blood_type');
        $blood_type->save();

        return redirect(route('blood-type-list'))->with('success', 'Blood type added successfully!');
    }

    //Update blood type function
    public function update_blood_type(Request $request, $id) {
        $blood_type = BloodTypeModel::find($id);
        $response = [
            'tbl_blood_type' => $blood_type
        ];

        return view('pages/info/blood-type/update-blood-type', $response);
    }

    //Save update blood type function
    public function saveUpdate_blood_type(Request $request, $id) {
        $update_blood_type =  BloodTypeModel::findorfail($id);
        $data = [
            'blood_type' => $request->input('blood_type')
        ];
        $update_blood_type->update($data);

        return redirect(route('blood-type-list'))->with('success', 'Blood type updated successfully!');
    }

    //Delete blood type function
    public function delete_blood_type(Request $request, $id) {
        try{
            $blood_type = BloodTypeModel::find($id);
            $blood_type->delete();
            return redirect(route('blood-type-list'))->with('success', 'Blood type deleted successfully!');
        }
        catch (\Exception $e) {
            return redirect(route('blood-type-list'))->with('error', 'Failed to delete blood type!');
        }
    }
}

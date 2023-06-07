<?php

namespace App\Http\Controllers;

use App\Models\GenderModel;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    // Create gender function
    // public function create_gender() {
    //     return view('info/gender/gender-list');
    // }

    //Save gender function
    public function save_gender(Request $request) {
        $gender = new GenderModel;
        $gender->gender = $request->input('gender');
        $gender->save();

        return redirect(route('gender-list'))->with('success', 'Gender added successfully!');
    }

    //Update gender function
    public function update_gender(Request $request, $id) {
        $gender = GenderModel::find($id);
        $response = [
            'tble_gender' => $gender
        ];

        return view('info/gender/update-gender', $response);
    }

    //Save update gender function
    public function saveUpdate_gender(Request $request, $id) {
        $update_gender =  GenderModel::findorfail($id);
        $data = [
            'gender' => $request->input('gender')
        ];
        $update_gender->update($data);

        return redirect(route('gender-list'))->with('success', 'Gender updated successfully!');
    }

    //Delete gender function
    public function delete_gender(Request $request, $id) {
        try{
            $gender = GenderModel::find($id);
            $gender->delete();
            return redirect(route('gender-list'))->with('success', 'Gender deleted successfully!');
        }
        catch (\Exception $e) {
            return redirect(route('gender-list'))->with('error', 'Failed to delete gender!');
        }
    }
}

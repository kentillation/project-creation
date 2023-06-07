<?php

namespace App\Http\Controllers;

use App\Models\SectionModel;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    // //Create course function
    // public function create_section() {
    //     return view('info/section/section-list');
    // }

    //Save section function
    public function save_section(Request $request) {
        $section = new SectionModel;
        $section->section = $request->input('section');
        $section->save();

        return redirect(route('section-list'))->with('success', 'Section added successfully!');
    }

    //Update section function
    public function update_section(Request $request, $id) {
        $section = SectionModel::find($id);
        $response = [
            'tble_section' => $section
        ];

        return view('info/section/update-section', $response);
    }

    //Save update section function
    public function saveUpdate_section(Request $request, $id) {
        $update_section =  SectionModel::findorfail($id);
        $data = [
            'section' => $request->input('section')
        ];
        $update_section->update($data);

        return redirect(route('course-list'))->with('success', 'Section updated successfully!');
    }

    //Delete section function
    public function delete_section(Request $request, $id) {
        try{
            $section = SectionModel::find($id);
            $section->delete();
            return redirect(route('section-list'))->with('success', 'Section deleted successfully!');
        }
        catch (\Exception $e) {
            return redirect(route('section-list'))->with('error', 'Failed to delete section!');
        }
    }
}

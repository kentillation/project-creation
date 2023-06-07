<?php

namespace App\Http\Controllers;

use App\Models\SectionModel;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function section_list() {
        $section = SectionModel::all();
        return view('section/section-list', ['tbl_section' => $section]);
    }

    public function save_section(Request $request) {
        $section = new SectionModel;
        $section->section = $request->input('section');
        $section->save();

        return redirect(route('section-list'))->with('success', 'Section added successfully!');
    }
}

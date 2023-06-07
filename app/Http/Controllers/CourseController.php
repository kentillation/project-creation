<?php

namespace App\Http\Controllers;

use App\Models\CourseModel;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function course_list() {
        $course = CourseModel::all();
        return view('course/course-list', ['tbl_course' => $course]);
    }

    public function save_course(Request $request) {
        $course = new CourseModel;
        $course->course = $request->input('course');
        $course->save();

        return redirect(route('course-list'))->with('success', 'Course added successfully!');
    }
}

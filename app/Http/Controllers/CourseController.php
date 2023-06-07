<?php

namespace App\Http\Controllers;

use App\Models\CourseModel;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //Create course function
    public function create_course() {
        return view('info/course/course-list');
    }

    //Course list function
    public function course_list() {
        $course = CourseModel::all();
        return view('info/course/course-list', ['tbl_course' => $course]);
    }

    //Save course function
    public function save_course(Request $request) {
        $course = new CourseModel;
        $course->course = $request->input('course');
        $course->save();

        return redirect(route('course-list'))->with('success', 'Course added successfully!');
    }

    //Update course function
    public function update_course(Request $request, $id) {
        $course = CourseModel::find($id);
        $response = [
            'tble_course' => $course
        ];

        return view('info/course/update-course', $response);
    }

    //Save update course function
    public function saveUpdate_course(Request $request, $id) {
        $update_course =  CourseModel::findorfail($id);
        $data = [
            'course' => $request->input('course')
        ];
        $update_course->update($data);

        return redirect(route('course-list'))->with('success', 'Course updated successfully!');
    }

    //Delete course function
    public function delete_course(Request $request, $id) {
        try{
            $course = CourseModel::find($id);
            $course->delete();
            return redirect(route('course-list'))->with('success', 'Course deleted successfully!');
        }
        catch (\Exception $e) {
            return redirect(route('course-list'))->with('error', 'Failed to delete course!');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CourseModel;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //Create course function
    // public function create_course() {
    //     return view('pages/info/course/course-list');
    // }

    //CREATING RECORD OF STAFF
    public function save_course(Request $request)
    {
        $course = new CourseModel;
        $course->course = $request->course;
        $course->save();
        return back()->with('success', 'New account has been saved successfully');
    }
    
    //EDITING NURSE COURSE'S RECORD
    public function update_course(Request $request, $id) {
        $course = CourseModel::find($id);
        $response = [
            'tbl_course' => $course
        ];
        return view('pages/info/course/edit-course', $response);
    }

    //UPDATING NURSE STAFF'S RECORD
    public function saveUpdate_course(Request $request, $id) {
        $data = [
            'course' => $request->input()['course']
        ];
        $update_course = CourseModel::where('id', $id)->update($data);
        return redirect(route('course-list'));
    }

    public function delete_course($id) {
        $course = CourseModel::find($id);
        $course->delete();
        return redirect(route('course-list'));
    }
    

    //Save update course function
    // public function saveUpdate_course(Request $request, $id) {
    //     $update_course = CourseModel::findorfail($id);
    //     $data = [
    //         'course' => $request->input('course')
    //     ];
    //     $update_course->update($data);

    //     return redirect(route('course-list'))->with('success', 'Course updated successfully!');
    // }

}

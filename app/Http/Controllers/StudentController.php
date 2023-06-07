<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class StudentController extends Controller
{
    public function student_login()
    {
        return view('pages/student/student-login');
    }

    // CLINICIAN LOGIN
    public function student_loginPost(Request $request)
    {
        $credentials = [
            'student_id' => $request->student_id,
            'password' => md5($request->password)
        ];
        $result_count = StudentModel::where($credentials)->get()->count();
    
        if ($result_count > 0) {

            return view('/pages/student/dashboard');
        }
        return back()->with('error', 'Invalid student id or password.');
    }

    // LOGOUT CLINICIAN
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    
    //CREATING RECORD OF CLINICIAN
    public function save_student(Request $request)
    {
        $student = new StudentModel;
        $request->password = md5($request->password);
        $student->student_id = $request->student_id;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->username = $request->username;
        $student->password = $request->password;
        $student->save();
        return back()->with('success', 'New account has been saved successfully');
    }
    
    //EDITING NURSE CLINICIAN'S RECORD
    public function update_student(Request $request, $id) {
        $student = StudentModel::find($id);
        $response = [
            'tbl_student' => $student
        ];
        return view('pages/student/edit-student', $response);
    }

    //UPDATING CLINICIAN'S RECORD
    public function saveUpdate_student(Request $request, $id) {
        $data = [
            'student_id' => $request->input()['student_id'],
            'name' => $request->input()['name'],
            'email' => $request->input()['email'],
            'username' => $request->input()['username']
        ];
        $update_student = StudentModel::where('id', $id)->update($data);
        return redirect(route('student-list'));
    }

    //DELETE CLINICIAN
    public function delete_student($id) {
        $student = StudentModel::find($id);
        $student->delete();
        return redirect(route('student-list'));
    }
}

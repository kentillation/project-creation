<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class StudentController extends Controller
{

    public function dashboard()
    {
        return view('/pages/student/dashboard');
    }

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

    public function add_medical_record () {
        return view('pages/student/add-record');
    }

    //CREATING RECORD OF USER
    public function save_medical_record(Request $request)
    {
        $student = new StudentModel;

        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->last_name = $request->last_name;
        $student->street_address = $request->street_address;
        $student->barangay = $request->barangay;
        $student->muni_city = $request->muni_city;
        $student->date_of_birth = $request->date_of_birth;
        $student->age = $request->age;
        $student->phone = $request->phone;
        $student->civil_status = $request->civil_status;
        $student->last_name = $request->last_name;
        $student->citizenship = $request->citizenship;
        $student->height = $request->height;
        $student->weight = $request->weight;
        $student->bmi = $request->bmi;
        $student->year_level = $request->year_level;
        $student->section = $request->section;
        $student->gender = $request->gender;
        $student->blood_type = $request->blood_type;
        $student->save();

        //return redirect(route('index'));
        return back()->with('success', 'New account has been saved successfully');
    }
}

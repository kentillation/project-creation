<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\ClinicianModel;
use App\Models\StudentModel;
use App\Models\StudentRecordModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class ClinicianController extends Controller
{
    public function dashboard()
    {
        return view('/pages/clinician/dashboard');
    }

    public function clinician_login()
    {
        return view('pages/clinician/clinician-login');
    }

    // CLINICIAN LOGIN
    public function clinician_loginPost(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => md5($request->password)
        ];
        $result_count = ClinicianModel::where($credentials)->get()->count();
    
        if ($result_count > 0) {

            $result_info = ClinicianModel::where($credentials)->get();

            session()->put('id', $result_info[0]['id']);
            session()->put('name', $result_info[0]['name']);
            session()->put('email', $result_info[0]['email']);

            $clinician =  ClinicianModel::where('name', '=', $request->name)->first();

            return redirect()->route('clinician-dashboard');

        }
        return back()->with('error', 'Invalid username or password.');
    }

    // LOGOUT CLINICIAN
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    
    //CREATING RECORD OF CLINICIAN
    public function save_clinician(Request $request)
    {
        $clinician = new ClinicianModel;
        $request->password = md5($request->password);
        $clinician->name = $request->name;
        $clinician->email = $request->email;
        $clinician->username = $request->username;
        $clinician->password = $request->password;
        $clinician->save();
        return back()->with('success', 'New account has been saved successfully');
    }
    
    //EDITING NURSE CLINICIAN'S RECORD
    public function update_clinician(Request $request, $id) {
        $clinician = ClinicianModel::find($id);
        $response = [
            'tbl_clinician' => $clinician
        ];
        return view('pages/clinician/edit-clinician', $response);
    }

    //UPDATING CLINICIAN'S RECORD
    public function saveUpdate_clinician(Request $request, $id) {
        $data = [
            'name' => $request->input()['name'],
            'email' => $request->input()['email'],
            'username' => $request->input()['username']
        ];
        $update_clinician = ClinicianModel::where('id', $id)->update($data);
        return redirect(route('clinician-list'));
    }

    //DELETE CLINICIAN
    public function delete_clinician($id) {
        $clinician = ClinicianModel::find($id);
        $clinician->delete();
        return redirect(route('clinician-list'));
    }

    //ADD STUDENT MEDICAL RECORD
    public function add_student_med_record () 
    {
        $id = Session::get('id');
        $result_info = StudentModel::where('id',$id)->get();
        return view('pages/clinician/add-student-med-record', ['student'=>$result_info]);

    }


    //CREATING RECORD OF STUDENT
    public function save_student_med_record(Request $request)
    {
        $studentrecord = new StudentRecordModel;
        $studentrecord->student_id = $request->student_id;
        $studentrecord->first_name = $request->first_name;
        $studentrecord->middle_name = $request->middle_name;
        $studentrecord->last_name = $request->last_name;
        $studentrecord->street_address = $request->street_address;
        $studentrecord->barangay = $request->barangay;
        $studentrecord->muni_city = $request->muni_city;
        $studentrecord->date_of_birth = $request->date_of_birth;
        $studentrecord->age = $request->age;
        $studentrecord->phone = $request->phone;
        $studentrecord->civil_status = $request->civil_status;
        $studentrecord->citizenship = $request->citizenship;
        $studentrecord->height = $request->height;
        $studentrecord->weight = $request->weight;
        $studentrecord->bmi = $request->bmi;
        $studentrecord->gender_id = $request->gender;
        $studentrecord->year_level_id = $request->year_level;
        $studentrecord->section_id = $request->section;
        $studentrecord->blood_type_id = $request->blood_type;
        $studentrecord->save();
        return back()->with('success', 'New student medical record has been saved successfully');
    }

    public function view_student_med_record () {
        $student_record = StudentRecordModel::all();
        return view('pages/clinician/view-student-med-record',['tbl_student_record'=>$student_record]);
    }

}

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
        $pending = StudentRecordModel::where('status_record_id', '1')->count();
        $declined = StudentRecordModel::where('status_record_id', '2')->count();
        $approved = StudentRecordModel::where('status_record_id', '3')->count();
        return view('pages/clinician/dashboard', compact('pending', 'declined', 'approved'));
        
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

    public function pending_medical_records () {

        $c_pending_records = StudentRecordModel::where('status_record_id', '1')->get();
        return view('pages/clinician/c-pending-medical-records', compact('c_pending_records'));

    }

    public function declined_medical_records () {

        $c_declined_records = StudentRecordModel::where('status_record_id', '2')->get();
        return view('pages/clinician/c-declined-medical-records', compact('c_declined_records'));

    }

    public function approved_medical_records () {

        $c_approved_records = StudentRecordModel::where('status_record_id', '3')->get();
        return view('pages/clinician/c-approved-medical-records', compact('c_approved_records'));

    }

    //EDITING STUDENT PENDING RECORD
    public function update_pending_record(Request $request, $id) {
        $pending_record = StudentRecordModel::find($id);
        return view('pages/clinician/edit-pending-record', ['c_update_pending'=> $pending_record]);
    }

    //UPDATING STUDENT PENDING RECORD
    public function saveUpdate_pending_record(Request $request, $id) {
        $data = [
            'first_name' => $request->input()['first_name'],
            'middle_name' => $request->input()['middle_name'],
            'last_name' => $request->input()['last_name'],
            'street_address' => $request->input()['street_address'],
            'barangay' => $request->input()['barangay'],
            'muni_city' => $request->input()['muni_city'],
            'date_of_birth' => $request->input()['date_of_birth'],
            'age' => $request->input()['age'],
            'phone' => $request->input()['phone'],
            'civil_status' => $request->input()['civil_status'],
            'citizenship' => $request->input()['citizenship'],
            'height' => $request->input()['height'],
            'weight' => $request->input()['weight'],
            'bmi' => $request->input()['bmi'],
            'year_level_id' => $request->input()['year_level'],
            'section_id' => $request->input()['section'],
            'blood_type_id' => $request->input()['blood_type'],
            'gender_id' => $request->input()['gender'],
            'status_record_id' =>$request->input()['status_record']
        ];

        $update_pending_record = StudentRecordModel::where('id', $id)->update($data);
        return redirect(route('clinician-dashboard'));
    }


}

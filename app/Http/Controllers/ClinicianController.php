<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClinicianModel;
use App\Models\ClinicianAppointmentModel;
use App\Models\StudentModel;
use App\Models\StudentRecordModel;
use App\Models\ActivityLogsModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Mail;
use App\Mail\Clinician_Acc_Creation_Email;
use App\Mail\Clinician_Acc_Creation_Receipt_Email;

class ClinicianController extends Controller
{
    public function dashboard()
    {
        $pending = StudentRecordModel::where('status_record_id', '1')->count();
        $approved = StudentRecordModel::where('status_record_id', '2')->count();
        return view('pages/clinician/dashboard', compact('pending', 'approved'));
        
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
            session()->put('email', $result_info[0]['email']);
            session()->put('username', $result_info[0]['username']);
            session()->put('first_name', $result_info[0]['first_name']);
            session()->put('middle_name', $result_info[0]['middle_name']);
            session()->put('last_name', $result_info[0]['last_name']);

            $clinician =  ClinicianModel::where('username', '=', $request->username)->first();

            return redirect()->route('clinician-dashboard');

        }
        return back()->with('error', 'Invalid username or password.');
    }
    
    //CREATING RECORD OF CLINICIAN
    public function save_clinician(Request $request)
    {
        $clinician = new ClinicianModel;
        $clinician->first_name = "no-firstname";
        $clinician->middle_name = "no-middlename";
        $clinician->last_name = "no-lastname";
        $clinician->email = $request->email;
        $clinician->admin_email = $request->admin_email;
        $clinician->username = $request->username;
        $clinician->password = $request->password;

        //For Email
        Mail::to($clinician->email)->send(new Clinician_Acc_Creation_Email($clinician));
        Mail::to($clinician->admin_email)->send(new Clinician_Acc_Creation_Receipt_Email($clinician));

        //For Activity Logs
        $activity_logs = new ActivityLogsModel;
        date_default_timezone_set('Asia/Manila');
        $activity_logs->description = "Admin " . Session::get('username') . " created an account for School Nurse with $request->username username on " . date("F j, Y | l") . " at " . date("h : i : s a") . " ";
        $activity_logs->save();

        $clinician->password = md5($request->password);
        $clinician->save();
        return redirect(route('admin-dashboard'))->with('success', 'New School Nurse user has been saved successfully');
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
            'email' => $request->input()['email'],
            'first_name' => $request->input()['first_name'],
            'middle_name' => $request->input()['middle_name'],
            'last_name' => $request->input()['last_name'],
            'username' => $request->input()['username']
        ];
        $update_clinician = ClinicianModel::where('id', $id)->update($data);

        //For Activity Logs
        $activity_logs = new ActivityLogsModel;
        date_default_timezone_set('Asia/Manila');
        $activity_logs->description = "Admin " . Session::get('username') . " updated the information of School Nurse with $request->username username on " . date("F j, Y | l") . " at " . date("h : i : s a") . " ";
        $activity_logs->save();

        return redirect(route('clinician-list'))->with('success', 'The information of School Nurse ' . $request->input()['first_name'] . ' ' . $request->input()['middle_name'] . ' ' . $request->input()['last_name'] . ' has been updated successfully. ');
    }

    //DELETE CLINICIAN
    public function delete_clinician($id) {
        $clinician = ClinicianModel::find($id);
        $clinician->delete();
        return redirect(route('clinician-list'));
    }

    //CLINICIAN PROFILE
    public function clinician_profile() {

        $id = Session::get('id');
        $clinician = ClinicianModel::find($id);

        return view('pages/clinician/clinician-profile', ['clinician_profile'=>$clinician]);
    }

    //CLINICIAN ACCOUNT SETTINGS
    public function clinician_account_settings() {
        $id = Session::get('id');
        $clinician = ClinicianModel::find($id);
        return view('pages/clinician/clinician-account-settings', ['clinician_acount'=>$clinician]);
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

        $c_approved_records = StudentRecordModel::where('status_record_id', '2')->get();
        return view('pages/clinician/c-approved-medical-records', compact('c_approved_records'));

    }

    //EDITING STUDENT PENDING RECORD
    public function update_pending_record(Request $request, $id) {
        $pending_record = StudentRecordModel::find($id);
        return view('pages/clinician/c-view-pending-record', ['c_update_pending'=> $pending_record]);
    }

    //UPDATING STUDENT PENDING RECORD
    public function saveUpdate_pending_record(Request $request, $id) {
        $data = [
            'first_name' => $request->input()['first_name'],
            'middle_name' => $request->input()['middle_name'],
            'last_name' => $request->input()['last_name'],
            'age' => $request->input()['age'],
            'phone' => $request->input()['phone'],
            'street_number' => $request->input()['street_number'],
            'street_address' => $request->input()['street_address'],
            'barangay' => $request->input()['barangay'],
            'muni_city' => $request->input()['muni_city'],
            'date_of_birth' => $request->input()['date_of_birth'],
            'civil_status' => $request->input()['civil_status'],
            'citizenship' => $request->input()['citizenship'],
            'height' => $request->input()['height'],
            'weight' => $request->input()['weight'],
            'bmi' => $request->input()['bmi'],
            'gender_id' => $request->input()['gender'],
            'year_level_id' => $request->input()['year_level'],
            'section_id' => $request->input()['section'],
            'blood_type_id' => $request->input()['blood_type'],
            'status_record_id' =>$request->input()['status_record_id'],
            'cbc_file' => $request->input()['cbc_file'],
            'urinalysis_file' => $request->input()['urinalysis_file'],
            'fecalysis_file' => $request->input()['fecalysis_file'],
            'x_ray_file' => $request->input()['x_ray_file'],
            'hba_file' => $request->input()['hba_file'],
            'hbv_file' => $request->input()['hbv_file'],
            'status_record_id'=> $request->input()['status_record_id'],
        ];

        $update_pending_record = StudentRecordModel::where('id', $id)->update($data);
        return redirect(route('clinician-dashboard'))->with('success', 'You approved the medical record of Student Nurse named '. $request->input()['first_name'] .' '. $request->input()['middle_name'] .' '. $request->input()['last_name']. ' ');
    }

    public function save_clinician_appointment(Request $request)
    {
        // date_default_timezone_set('Asia/Manila');
        // $request->date = date_format("F j, Y | l");
        // $request->time = date_format("h : i : s a");

        $apppointment = new ClinicianAppointmentModel;
        $apppointment->from = $request->from;
        $apppointment->to = $request->to;
        $apppointment->date = $request->date;
        $apppointment->time = $request->time;
        $apppointment->room = $request->room;
        $apppointment->lab_test = $request->lab_test;
        $apppointment->status_appointment = 1;
        $apppointment->save();

        if ($request->lab_test == 1) {
            $lab_test = "CBC";
        }
        if ($request->lab_test == 2) {
            $lab_test = "Urinalysis";
        }
        if ($request->lab_test == 3) {
            $lab_test = "Fecalysis";
        }
        if ($request->lab_test == 4) {
            $lab_test = "Chest X-ray (PA)";
        }
        if ($request->lab_test == 5) {
            $lab_test = "Hepa B Antigen";
        }
        if ($request->lab_test == 6) {
            $lab_test = "Hepa B Vaccine";
        }
        
        return back()->with('success', 'Appointment for '. $lab_test  .' - Laboratory Test has been sent successfully');
    }

    // LOGOUT CLINICIAN
    public function logout()
    {
        $activity_logs = new ActivityLogsModel;
        date_default_timezone_set('Asia/Manila');
        $activity_logs->description = "Admin " . Session::get('username') . " logged out on " . date("F j, Y | l") . " at " . date("h : i : s a") . " ";
        $activity_logs->save();
        Auth::logout();
        return redirect('/');
    }


}

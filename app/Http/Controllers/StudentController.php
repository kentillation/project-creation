<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\StudentModel;
use App\Models\StudentRecordModel;
use App\Models\MedicalHistoryModel;
use App\Models\ClinicianAppointmentModel;
use App\Models\ClinicianModel;
use App\Models\ActivityLogsModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Mail;
use App\Mail\Student_Acc_Creation_Email;
use App\Mail\Student_Acc_Creation_Receipt_Email;

//for SMS Notification
use Exception;
use Twilio\Rest\Client;

class StudentController extends Controller
{

    public function dashboard()
    {
        $id = Session::get('id');
        $pending_appointment = ClinicianAppointmentModel::where('to', $id)->get();
        $cilinician_record = ClinicianModel::all();
        return view('pages/student/dashboard', ['pending_appointment' => $pending_appointment], compact('cilinician_record'));
    }

    public function student_login()
    {
        return view('pages/student/student-login');
    }

    // STUDENT LOGIN
    public function student_loginPost(Request $request)
    {
        $credentials = [
            'student_id' => $request->student_id,
            'password' => md5($request->password)
        ];
        $result_count = StudentModel::where($credentials)->get()->count();
    
        if ($result_count > 0) {

            $result_info = StudentModel::where($credentials)->get();

            session()->put('id', $result_info[0]['id']);
            session()->put('student_id', $result_info[0]['student_id']);
            session()->put('email', $result_info[0]['email']);
            session()->put('first_name', $result_info[0]['first_name']);
            session()->put('middle_name', $result_info[0]['middle_name']);
            session()->put('last_name', $result_info[0]['last_name']);
            session()->put('street_number', $result_info[0]['street_number']);
            session()->put('street_address', $result_info[0]['street_address']);
            session()->put('barangay', $result_info[0]['barangay']);
            session()->put('muni_city', $result_info[0]['muni_city']);
            session()->put('phone', $result_info[0]['phone']);
            session()->put('appointment_response_id', $result_info[0]['appointment_response_id']);

            $student =  StudentModel::where('student_id', '=', $request->student_id)->first();
            return redirect()->route('student-dashboard');

        }
        return back()->with('error', 'Invalid student id or password.');
    }

    // LOGOUT STUDENT
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    
    //CREATING RECORD OF STUDENT
    public function save_student(Request $request)
    {
        $student = new StudentModel;
        // $admin = new AdminModel;
       
            $student->student_id = $request->student_id;
            $student->first_name = "no-firstname";
            $student->middle_name = "no-middlename";
            $student->last_name = "no-lastname";
            $student->email = $request->email;
            $student->password = $request->password;
            $student->admin_email = $request->admin_email;

            //For Email
            Mail::to($student->email)->send(new Student_Acc_Creation_Email($student));
            Mail::to($student->admin_email)->send(new Student_Acc_Creation_Receipt_Email($student));

            //For Activity Logs
            $activity_logs = new ActivityLogsModel;
            date_default_timezone_set('Asia/Manila');
            $activity_logs->description = "Admin " . Session::get('username') . " created an account for Nursing Student with $request->student_id ID on " . date("F j, Y | l") . " at " . date("h : i : s a") . " ";
            $activity_logs->save();

            $student->password = md5($request->password);
            $student->save();
        
            return back()->with('success', 'New Student Nurse account has been created successfully.');

            // $admin_name = $request->name;
            // $phone_number = $student->phone;
            // $first_name = $student->first_name;
            // $middle_name = $student->middle_name;
            // $last_name = $student->last_name;
            // $student_id = $student->student_id;
            // $password = $student->password;
            // $receiverNumber = "+63 945 314 5499";
            // $message = "Date: ";
            // $message .= date("F j, Y | l");
            // $message .= "\n";
            // $message .= "Time: ";
            // $message .= date("h : i : s");
            // $message .= "\n \n";
            // $message .= "Admin ";
            // $message .= " just created an account for nursing student named ";
            // $message .= $first_name;
            // $message .= " ";
            // $message .= $middle_name;
            // $message .= " ";
            // $message .= $last_name;
            // $message .= "\n \n";
            // $message .= "Phone number: ";
            // $message .= $phone_number;
            // $message .= "\n";
            // $message .= "Student ID: ";
            // $message .= $student_id;
            // $message .= "\n";
            // $message .= "Password: ";
            // $message .= $password;
            // $message .= "\n \n";
            // $message .= "Note: Make sure to get a copy for this preferences. Thank you!";
            // $account_sid = getenv("TWILIO_SID");
            // $auth_token = getenv("TWILIO_TOKEN");
            // $twilio_number = getenv("TWILIO_FROM");
            // $client = new Client($account_sid, $auth_token);
            // $client->messages->create($receiverNumber, [
            //     'from' => $twilio_number, 
            //     'body' => $message]);

    }
    
    //EDITING STUDENT'S RECORD
    public function update_student(Request $request, $id) {
        $student = StudentModel::find($id);
        $response = [
            'tbl_student' => $student
        ];
        return view('pages/student/edit-student', $response);
    }

    //UPDATING STUDENT'S RECORD
    public function saveUpdate_student(Request $request, $id) {
        $data = [
            'student_id' => $request->input()['student_id'],
            'first_name' => $request->input()['first_name'],
            'middle_name' => $request->input()['middle_name'],
            'last_name' => $request->input()['last_name'],
            'email' => $request->input()['email']
        ];
        $update_student = StudentModel::where('id', $id)->update($data);

        //For Activity Logs
        $activity_logs = new ActivityLogsModel;
        date_default_timezone_set('Asia/Manila');
        $activity_logs->description = "Admin " . Session::get('username') . " updated the information of Nursing Student with $request->student_id ID on " . date("F j, Y | l") . " at " . date("h : i : s a") . " ";
        $activity_logs->save();

        return redirect(route('student-list'))->with('success', 'The information of Student Nurse with '. $request->input()['student_id'] .' ID has been updated successfully.');
    }

    //DELETE STUDENT
    public function delete_student($id) {
        $student = StudentModel::find($id);
        $student->delete();
        return redirect(route('student-list'));
    }

    //UPDATE PENDING APPOINTMENT - COME
    public function update_pending_appointment_come() {
        $id = Session::get('appointment_response_id');
        $data = [
            'appointment_response_id' => 1,
        ];
        $update_student_account = StudentRecordModel::where('id', $id)->update($data);
        return redirect(route('pages/student/pending-appointments'))->with('success', 'Great!');
    }

    public function student_profile() {

        $id = Session::get('id');
        $student = StudentModel::find($id);

        return view('pages/student/student-profile', ['student_profile'=>$student]);
    }

    //UPDATING ADMIN'S RECORD
    public function saveUpdate_profile(Request $request) {
        $id = Session::get('id');
        $data = [
            'first_name' => $request->input()['first_name'],
            'middle_name' => $request->input()['middle_name'],
            'last_name' => $request->input()['last_name'],
            'email' => $request->input()['email'],
        ];
        $update_student_account = StudentModel::where('id', $id)->update($data);
        return redirect(route('student-login'))->with('success', 'Account has been updated successfully');
    }

    public function student_account_settings() {
        $id = Session::get('id');
        $student = StudentModel::find($id);
        return view('pages/student/student-account-settings', ['student_acount'=>$student]);
    }

    //ADD STUDENT MEDICAL RECORD
    public function add_medical_record () 
    {
        $student_id = Session::get('student_id');
        $result_info = StudentModel::where('student_id',$student_id)->get();
        return view('pages/student/add-medical-record', ['student'=>$result_info]);
    }

    public function add_medical_history () 
    {
        $id = Session::get('id');
        $result_info = StudentModel::where('id',$id)->get();
        return view('pages/student/add-medical-history', ['student'=>$result_info]);
    }

    public function view_medical_records () {
        //Filtering Records with Session
        $id = Session::get('id');
        $student_records = StudentRecordModel::where('student_id', $id)->get();
        return view('pages/student/view-medical-records',['student_records'=>$student_records]);
    }

    public function view_record () {
        //Filtering Records with Session
        $id = Session::get('id');

        $student_record = StudentRecordModel::where('student_id', $id)->get();
        $medical_history = MedicalHistoryModel::all();

        return view('pages/student/view-record',['student_record'=>$student_record], compact('medical_history'));
        // return view('pages/student/view-record',['student_record'=>$student_record]);
    }

    public function view_medical_histories () {
        //Filtering Records with Session
        $id = Session::get('id');
        $student_record = StudentRecordModel::where('student_id', $id)->get();
        return view('pages/student/view-medical-histories',['tbl_student_record'=>$student_record]);
    }


    // public function view_history () {

    //     $medical_history = MedicalHistoryModel::all();
    //     return view('pages/student/view-record', compact('medical_history'));
    // }

    //CREATING RECORD OF STUDENT
    public function save_medical_record(Request $request)
    {
        $studentrecord = new StudentRecordModel;
        $studentrecord->student_id = $request->student_id;
        $studentrecord->first_name = $request->first_name;
        $studentrecord->middle_name = $request->middle_name;
        $studentrecord->last_name = $request->last_name;
        $studentrecord->street_number = $request->street_number;
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
        $studentrecord->status_record_id = 1;
        $studentrecord->status_appointment_id = 1;
        $studentrecord->save();
        return back()->with('success', 'New request for medical record has been sent successfully');
    }

    public function save_medical_history(Request $request)
    {
        $medical_history = new MedicalHistoryModel;
        $medical_history->student_id = $request->student_id;
        $medical_history->first_name = $request->first_name;
        $medical_history->last_name = $request->last_name;
        $medical_history->middle_name = $request->middle_name;
        $medical_history->year_level_id = $request->year_level;
        $medical_history->phone = $request->phone;
        $medical_history->age = $request->age;
        $medical_history->gender_id = $request->gender;
        $medical_history->condition_option = json_encode($request->conditions);
        $medical_history->symptoms_option = json_encode($request->symptoms);
        $medical_history->consume_alcohol = json_encode($request->consume_alcohol);
        $medical_history->medication = $request->medication;
        $medical_history->allergies = $request->allergies;
        $medical_history->using_tobacco = $request->using_tobacco;
        $medical_history->using_illegal_drug = $request->using_illegal_drug;
        $medical_history->other_condition_option = $request->other_condition_option;
        $medical_history->other_symptoms_option = $request->other_symptoms_option;
        $medical_history->created_at = $request->created_at;
        $medical_history->save();
        return redirect()->back()->with('success', 'Medical history saved successfully.');
    }

    public function pending_appointments() {
        
        $id = Session::get('id');
        $pending_appointment = ClinicianAppointmentModel::where('to', $id)->get();
        $cilinician_record = ClinicianModel::all();
        return view('pages/student/pending-appointments',['pending_appointment'=>$pending_appointment], compact('cilinician_record'));
    }

}

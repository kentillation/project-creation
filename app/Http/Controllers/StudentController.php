<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentModel;
use App\Models\StudentRecordModel;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

//for SMS Notification
use Exception;
use Twilio\Rest\Client;

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
        // $admin = new AdminModel;
        
        try 
        {

            $student->student_id = $request->student_id;
            $student->first_name = $request->first_name;
            $student->middle_name = $request->middle_name;
            $student->last_name = $request->last_name;
            $student->phone = $request->phone;
            $student->email = $request->email;
            $student->username = $request->username;
            $student->password = $request->password;

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
            $student->password = md5($request->password);
            $student->save();

            return back()->with('success', 'New account has been saved successfully and SMS Notification has been sent to the nursing student.');
        } 
        catch (Exception $e) 
        {
            dd("Error: ". $e->getMessage());
        }

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

    public function view_medical_record () {
        return view('pages/student/view-record');
    }

    //CREATING RECORD OF USER
    public function save_medical_record(Request $request)
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
        $studentrecord->gender = $request->gender;
        $studentrecord->year_level = $request->year_level;
        $studentrecord->section = $request->section;
        $studentrecord->blood_type = $request->blood_type;
        $studentrecord->save();

        //return redirect(route('index'));
        return back()->with('success', 'New request for medical record has been sent successfully');
    }
}

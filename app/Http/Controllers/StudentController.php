<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\StudentModel;
use App\Models\StudentRecordModel;
use App\Models\MedicalHistoryModel;
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
            session()->put('first_name', $result_info[0]['first_name']);
            session()->put('middle_name', $result_info[0]['middle_name']);
            session()->put('last_name', $result_info[0]['last_name']);

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
            'phone' => $request->input()['phone'],
            'email' => $request->input()['email'],
            'username' => $request->input()['username']
        ];
        $update_student = StudentModel::where('id', $id)->update($data);
        return redirect(route('student-list'));
    }

    //DELETE STUDENT
    public function delete_student($id) {
        $student = StudentModel::find($id);
        $student->delete();
        return redirect(route('student-list'));
    }

    //ADD STUDENT MEDICAL RECORD
    public function add_medical_record () 
    {
        $id = Session::get('id');
        $result_info = StudentModel::where('id',$id)->get();
        return view('pages/student/add-record', ['student'=>$result_info]);
    }

    public function add_medical_history () 
    {
        $id = Session::get('id');
        $result_info = StudentModel::where('id',$id)->get();
        return view('pages/student/add-medical-history', ['student'=>$result_info]);
    }

    public function view_medical_record () {

        //Filtering Records with Session
        $id = Session::get('id');
        $student_record = StudentRecordModel::where('student_id', $id)->get();
        return view('pages/student/view-record',['tbl_student_record'=>$student_record]);
    }

    public function view_medical_history () {

        //Filtering Records with Session
        $id = Session::get('id');
        $student_record = StudentRecordModel::where('student_id', $id)->get();
        return view('pages/student/view-record',['tbl_student_record'=>$student_record]);
    }

    //CREATING RECORD OF STUDENT
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
        $studentrecord->gender_id = $request->gender;
        $studentrecord->year_level_id = $request->year_level;
        $studentrecord->section_id = $request->section;
        $studentrecord->blood_type_id = $request->blood_type;
        $studentrecord->status_record_id = 1;
        $studentrecord->save();
        return back()->with('success', 'New request for medical record has been sent successfully');
    }

    public function save_medical_history(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'conditions' => 'nullable|array',
            'symptoms' => 'nullable|array',
            'consume_alcohol' => 'nullable|array',
            'other_condition_option' => 'nullable|required_if:conditions.*,other',
            'other_symptoms_option' => 'nullable|required_if:symptoms.*,other',
            'medication' => 'required|in:yes,no',
            'allergies' => 'required|in:yes,no,unsure',
            'using_tobacco' => 'required|in:yes,no',
            'using_illegal_drug' => 'required|in:yes,no'
        ]);

        // Create a new MedicalHistory instance
        $medicalHistory = new MedicalHistoryModel();
        
        // Save the conditions
        if ($request->has('conditions')) {
            $medicalHistory->conditions = $request->input('conditions');
            
            // Remove "other" from conditions array
            $conditions = array_diff(['other']);
            
            // Check if "other" input is provided and add it to conditions
            if ($request->filled('other_condition_option')) {
                $conditionOther = $request->input('other_condition_option');
                $conditions[] = $conditionOther;
            }
            
            $medicalHistory->conditions = $conditions;
        }

        // Save the symptoms
        if ($request->has('symptoms')) {
            $medicalHistory->symptoms = $request->input('symptoms');
            $symptoms = array_diff(['other']);

            if ($request->filled('other_symptoms_option')) {
                $symptomsOther = $request->input('other_symptoms_option');
                $symptoms[] = $symptomsOther;
            }
            $medicalHistory->symptoms = $symptoms;
        }

        // Save the consume_alcohol
        if ($request->has('consume_alcohol')) {
            $medicalHistory->symptoms = $request->input('consume_alcohol');
        }
        
        // Save the medication status
        $medicalHistory->medication = $request->input('medication');
        $medicalHistory->allergies = $request->input('allergies');
        $medicalHistory->using_tobacco = $request->input('using_tobacco');
        $medicalHistory->using_illegal_drug = $request->input('using_illegal_drug');
        
        // Save the medical history record
        $medicalHistory->save();
        
        // Redirect to a success page or perform any other desired actions
        
        return redirect()->back()->with('success', 'Medical history saved successfully.');
    }
}

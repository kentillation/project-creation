<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\StaffModel;
use App\Models\ClinicianModel;
use App\Models\StudentModel;
use App\Models\StudentRecordModel;
use App\Models\CourseModel;
use App\Models\BloodTypeModel;
use App\Models\GenderModel;
use App\Models\SectionModel;
use App\Models\YearLevelModel;
use App\Models\ActivityLogsModel;
use App\Models\AppointmentModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Mail;
use App\Mail\Admin_Acc_Creation_Email;
use App\Mail\Admin_Acc_Creation_Receipt_Email;

class AuthController extends Controller
{

    public function index () {
        return view('pages/index');
    }

    //CREATING RECORD OF ADMIN
    public function signup () 
    {
        return view('pages/signup');
    }

    //SAVING RECORD OF ADMIN
    public function save_admin(Request $request)
    {
        $admin = new AdminModel;
        $admin->first_name = "no-firstname";
        $admin->middle_name = "no-middlename";
        $admin->last_name = "no-lastname";
        $admin->email = $request->email;
        $admin->admin_email = $request->admin_email;
        $admin->username = $request->username;
        $admin->password = $request->password;

        // For Activity Logs
        $activity_logs = new ActivityLogsModel;
        date_default_timezone_set('Asia/Manila');
        $activity_logs->description = "Admin " . Session::get('username') . " added " . $request->username . " as new System Admin on " . date("F j, Y | l") . " at " . date("h : i : s a") . " ";
        $activity_logs->save();

        //For Email
        Mail::to($admin->email)->send(new Admin_Acc_Creation_Email($admin));
        Mail::to($admin->admin_email)->send(new Admin_Acc_Creation_Receipt_Email($admin));

        //For Activity Logs
        $activity_logs = new ActivityLogsModel;
        date_default_timezone_set('Asia/Manila');
        $activity_logs->description = "Admin " . Session::get('username') . " created an account for System Admin with $request->username username on " . date("F j, Y | l") . " at " . date("h : i : s a") . " ";
        $activity_logs->save();
        
        $admin->password = md5($request->password);
        $admin->save();

        return redirect(route('admin-dashboard'))->with('success', 'New System Admin user has been created successfully');
    }

    //ADMIN LOGIN
    public function login()
    {
        return view('pages/admin/admin-login');
    }

    //ADMIN LOGIN POST
    public function loginPost(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => md5($request->password)
        ];
        $result_count = AdminModel::where($credentials)->get()->count();
    
        if ($result_count > 0) {

            // Schema::drop('tbl_educator');
            /*Schema::table('tbl_stocks', function (Blueprint $table) {
                $table->dropColumn(['created_at', 'updated_at']);
            });*/

            $result_info = AdminModel::where($credentials)->get();

            session()->put('id', $result_info[0]['id']);
            session()->put('email', $result_info[0]['email']);
            session()->put('username', $result_info[0]['username']);
            session()->put('first_name', $result_info[0]['first_name']);
            session()->put('middle_name', $result_info[0]['middle_name']);
            session()->put('last_name', $result_info[0]['last_name']);
            session()->put('street_number', $result_info[0]['street_number']);
            session()->put('street_address', $result_info[0]['street_address']);
            session()->put('barangay', $result_info[0]['barangay']);
            session()->put('muni_city', $result_info[0]['muni_city']);
            session()->put('phone', $result_info[0]['phone']);
            $admin =  AdminModel::where('username', '=', $request->username)->first();
            
            // For Activity Logs
            $activity_logs = new ActivityLogsModel;
            date_default_timezone_set('Asia/Manila');
            $activity_logs->description = "Admin " . Session::get('username') . " logged in on " . date("F j, Y | l") . " at " . date("h : i : s a") . " ";
            $activity_logs->save();
            
            return redirect()->route('admin-dashboard');
        }
        return back()->with('error', 'Invalid username or password.');
    }

    //ADMIN DASHBOARD
    public function dashboard () {
        // $count_pending = $this->countPendingWithFilter();
        // return view('pages/admin/dashboard', ['pending' => $count_pending]);

        $pending = StudentRecordModel::where('status_record_id', '1')->count();
        $declined = StudentRecordModel::where('status_record_id', '2')->count();
        $approved = StudentRecordModel::where('status_record_id', '3')->count();
        return view('pages/admin/dashboard', compact('pending', 'declined', 'approved'));
    }

    //READING ALL RECORDS OF ADMINS
    public function admin_list () {
        $users = AdminModel::all();
        return view('pages/admin/admin-list',['tbl_admin'=>$users]);
    }

    public function print_admin_list () {
        $users = AdminModel::all();
        return view('pages/print/print-admin_list',['tbl_admin'=>$users]);
    }
    
    
    //EDITING ADMIN'S RECORD
    public function update(Request $request, $id) {
        $admin = AdminModel::find($id);
        $response = [
            'tbl_admin' => $admin
        ];
        return view('pages/admin/edit-admin', $response);
    }

    //UPDATING ADMIN'S RECORD
    public function saveUpdate_profile(Request $request) {
        $id = Session::get('id');
        $data = [
            'first_name' => $request->input()['first_name'],
            'middle_name' => $request->input()['middle_name'],
            'last_name' => $request->input()['last_name'],
            'street_number' => $request->input()['street_number'],
            'street_address' => $request->input()['street_address'],
            'barangay' => $request->input()['barangay'],
            'muni_city' => $request->input()['muni_city'],
            'phone' => $request->input()['phone'],
            'email' => $request->input()['email']
        ];
        $update_admin_account = AdminModel::where('id', $id)->update($data);
        
        $activity_logs = new ActivityLogsModel;
        date_default_timezone_set('Asia/Manila');
        $activity_logs->description = "Admin " . $request->input()['first_name'] . " " . $request->input()['middle_name'] . " " . $request->input()['last_name'] . " updated his/her profile on " . date("F j, Y | l") . " at " . date("h : i : s a") . " ";
        $activity_logs->save();
        
        return redirect(route('admin-profile'))->with('success', 'Account has been updated successfully');
    }

    // public function delete($id) {
    //     $admin = AdminModel::find($id);
    //     $admin->delete();
    //     return redirect(route('admin-list'))->with('removal', 'Account has been remove successfully');
    // }

    public function admin_profile() {

        $id = Session::get('id');
        $admin = AdminModel::find($id);

        return view('pages/admin/admin-profile', ['admin_profile'=>$admin]);
    }

    public function admin_account_settings() {
        $id = Session::get('id');
        $admin = AdminModel::find($id);
        return view('pages/admin/admin-account-settings', ['admin_acount'=>$admin]);
    }


    //READING ALL RECORDS OF DEPARTMENT STAFF
    public function staff_list () {
        $staff = StaffModel::all();
        return view('pages/admin/staff-list',['tbl_staff'=>$staff]);
    }

    //READING ALL RECORDS OF CLINICIAN
    public function clinician_list () {
        $clinician = ClinicianModel::all();
        return view('pages/admin/clinician-list',['tbl_clinician'=>$clinician]);
    }

    //READING THE LIST OF STUDENT
    public function student_list () {

        $id = Session::get('id');
        $admin = AdminModel::find($id);
        // return view('pages/admin/admin-profile', ['admin_profile'=>$admin]);

        $student = StudentModel::all();
        return view('pages/admin/student-list',['tbl_student'=>$student], ['admin_profile'=>$admin]);
    }

    //ADD STUDENT USER
    public function add_student_user () {

        $id = Session::get('id');
        $admin = AdminModel::find($id);

        $student = StudentModel::all();
        return view('pages/admin/add-student-user', ['admin_profile'=>$admin]);
    }

    //READING THE MEDICAL RECORDS OF STUDENT
    public function view_student_med_record (Request $request ) {

        //Filtering Records
        $student_record = StudentRecordModel::where('student_id', $request->id)->get();
        return view('pages/admin/view-student-med-record',['a_student_record'=>$student_record]);
    }

    public function pending_medical_records () {

        $a_pending_records = StudentRecordModel::where('status_record_id', '1')->get();
        return view('pages/admin/a-pending-medical-records', compact('a_pending_records'));

    }

    public function view_pending_record(Request $request, $id) {
        $pending_record = StudentRecordModel::find($id);
        return view('pages/admin/a-view-pending-record', ['a_update_pending'=> $pending_record]);
    }

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
            'status_record_id' =>$request->input()['status_record'],
            'cbc_file' => $request->input()['cbc_file'],
            'urinalysis_file' => $request->input()['urinalysis_file'],
            'fecalysis_file' => $request->input()['fecalysis_file'],
            'x_ray_file' => $request->input()['x_ray_file'],
            'hba_file' => $request->input()['hba_file'],
            'hbv_file' => $request->input()['hbv_file'],
        ];

        $update_pending_record = StudentRecordModel::where('id', $id)->update($data);
        
        $activity_logs = new ActivityLogsModel;
        date_default_timezone_set('Asia/Manila');
        $activity_logs->description = "Admin " . Session::get('username') . " approved the pending medical record of " . $request->input()['first_name'] . " " . $request->input()['middle_name'] . " " . $request->input()['last_name'] . " on " . date("F j, Y | l") . " at " . date("h : i : s a") . " ";
        $activity_logs->save();
        
        return redirect(route('admin-dashboard'))->with('success', 'Medical record request has been approved successfully.');
    }

    public function approved_medical_records () {

        $a_approved_records = StudentRecordModel::where('status_record_id', '3')->get();
        return view('pages/admin/a-approved-medical-records', compact('a_approved_records'));

    }

    //READING ALL RECORDS OF BLOOD TYPE
    public function blood_type_list () {
        $blood_type = BloodTypeModel::all();
        return view('pages/admin/blood-type-list',['tbl_blood_type'=>$blood_type]);
    }

    //READING ALL RECORDS OF GENDER
    public function gender_list () {
        $gender = GenderModel::all();
        return view('pages/admin/gender-list',['tbl_gender'=>$gender]);
    }

    //READING ALL RECORDS OF SECTION
    public function section_list () {
        $section = SectionModel::all();
        return view('pages/admin/section-list',['tbl_section'=>$section]);
    }

    //READING ALL RECORDS OF YEAR LEVEL
    public function year_level_list () {
        $year_level = YearLevelModel::all();
        return view('pages/admin/year-level-list',['tbl_year_level'=>$year_level]);
    }

    public function save_admin_appointment(Request $request)
    {
        // date_default_timezone_set('Asia/Manila');
        // $request->date = date_format("F j, Y | l");
        // $request->time = date_format("h : i : s a");

        $apppointment = new AppointmentModel;
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

    public function pending_appointments() {

        $student = AppointmentModel::where('status_appointment','1')->get();
        return view('pages/admin/pending-appointments',['pending_appointment'=>$student]);
    }

    public function approved_appointments() {

        $student = AppointmentModel::where('status_appointment','2')->get();
        return view('pages/admin/approved-appointments',['approved_appointment'=>$student]);
    }

    //ADMIN LOGOUT
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

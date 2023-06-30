<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\StaffModel;
use App\Models\ClinicianModel;
use App\Models\StudentModel;
use App\Models\StudentRecordModel;
use App\Models\MedicalHistoryModel;
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

    public function index()
    {
        return view('pages/index');
    }

    //CREATING RECORD OF ADMIN
    public function signup()
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
            session()->put('image', $result_info[0]['image']);
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
    public function dashboard()
    {

        $all_medical_records_request = StudentRecordModel::all();
        $pending_medical_record_request = StudentRecordModel::where('status_record_id', '1')->count();
        $approved_medical_record_request = StudentRecordModel::where('status_record_id', '2')->count();
        $all_lab_test_appointments = AppointmentModel::all();
        $pending_lab_test_appointments = AppointmentModel::where('status_appointment', '1')->count();
        $approved_lab_test_appointments = AppointmentModel::where('status_appointment', '2')->count();
        $activity_logs = ActivityLogsModel::all();
        return view('pages/admin/dashboard', compact(
            'all_medical_records_request',
            'pending_medical_record_request',
            'approved_medical_record_request',
            'pending_lab_test_appointments',
            'approved_lab_test_appointments',
            'all_lab_test_appointments',
            'activity_logs'
        ));
    }

    //READING ALL RECORDS OF ADMINS
    public function admin_list()
    {
        $users = AdminModel::all();
        return view('pages/admin/admin-list', ['tbl_admin' => $users]);
    }

    public function print_admin_list()
    {
        $users = AdminModel::all();
        return view('pages/print/print-admin_list', ['tbl_admin' => $users]);
    }


    //EDITING ADMIN'S RECORD
    public function update(Request $request, $id)
    {
        $admin = AdminModel::find($id);
        $response = [
            'tbl_admin' => $admin
        ];
        return view('pages/admin/edit-admin', $response);
    }

    public function admin_profile()
    {
        $id = Session::get('id');
        $admin = AdminModel::find($id);

        return view('pages/admin/admin-profile', ['admin_profile' => $admin]);
    }

    
    //UPDATING ADMIN'S PROFILE
    public function saveUpdate_profile(Request $request)
    {
        $id = Session::get('id');
        $admin = AdminModel::find($id);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $admin->image = time().'_'.$image->getClientOriginalName();
            $image->move(\public_path('profile-folder/'), $admin->image);
            $request['image'] = $admin->image;
        }

        $data = [
            'first_name' => $request->input()['first_name'],
            'middle_name' => $request->input()['middle_name'],
            'last_name' => $request->input()['last_name'],
            'email' => $request->input()['email'],
            'image' => $admin->image,
        ];
        
        $update_admin_account = AdminModel::where('id', $id)->update($data);

        $activity_logs = new ActivityLogsModel;
        date_default_timezone_set('Asia/Manila');
        $activity_logs->description = "Admin " . $request->input()['first_name'] . " " . $request->input()['middle_name'] . " " . $request->input()['last_name'] . " updated his/her profile on " . date("F j, Y | l") . " at " . date("h : i : s a") . " ";
        $activity_logs->save();

        return redirect(route('admin-login'))->with('success', 'Profile has been updated successfully');
    }

    public function admin_account_settings()
    {
        $id = Session::get('id');
        $admin = AdminModel::find($id);
        return view('pages/admin/admin-account-settings', ['admin_acount' => $admin]);
    }

    //UPDATING USERNAME
    public function saveUpdate_username(Request $request)
    {
        $credentials = [
            'username' => $request->newusername
        ];
        $result_count = AdminModel::where($credentials)->get()->count();

        if ($result_count > 0) {
            return back()->with('error', 'Username already exist.');
        } else if ($request->input()['currentusername'] !== Session::get('username')) {
            return back()->with('error', 'Invalid current username.');
        } else {
            $id = Session::get('id');
            $data = [
                'username' => $request->input()['newusername']
            ];
            $update_admin_userame = AdminModel::where('id', $id)->update($data);
            $activity_logs = new ActivityLogsModel;
            date_default_timezone_set('Asia/Manila');
            $activity_logs->description = "Admin " . Session::get('first_name') . " " . Session::get('middle_name') . " " . Session::get('last_name') . " change his/her username on " . date("F j, Y | l") . " at " . date("h : i : s a") . " ";
            $activity_logs->save();
            return redirect(route('admin-login'))->with('success', 'Username has been change successfully.');
        }
    }

    public function saveUpdate_password(Request $request)
    {
        $credentials = [
            'password' => md5($request->currentpassword)
        ];
        $result_count = AdminModel::where($credentials)->get()->count();

        if ($result_count > 0) {
            if ($request->input()['renewpassword'] !== $request->input()['newpassword']) {
                return back()->with('error', 'Re-entered new password does not match.');
            } else {
                $id = Session::get('id');
                $data = [
                    'password' => md5($request->input()['newpassword'])
                ];
                $update_admin_password = AdminModel::where('id', $id)->update($data);
                $activity_logs = new ActivityLogsModel;
                date_default_timezone_set('Asia/Manila');
                $activity_logs->description = "Admin " . Session::get('first_name') . " " . Session::get('middle_name') . " " . Session::get('last_name') . " change his/her password on " . date("F j, Y | l") . " at " . date("h : i : s a") . " ";
                $activity_logs->save();
                return redirect(route('admin-login'))->with('success', 'Password has been changed successfully.');
            }
        }
        else {
            return back()->with('error', 'Current password not found.');
        }
    }

    //READING ALL RECORDS OF DEPARTMENT STAFF
    public function staff_list()
    {
        $staff = StaffModel::all();
        return view('pages/admin/staff-list', ['tbl_staff' => $staff]);
    }

    //READING ALL RECORDS OF CLINICIAN
    public function clinician_list()
    {
        $clinician = ClinicianModel::all();
        return view('pages/admin/clinician-list', ['tbl_clinician' => $clinician]);
    }

    //READING THE LIST OF STUDENT
    public function student_list()
    {

        $id = Session::get('id');
        $admin = AdminModel::find($id);
        // return view('pages/admin/admin-profile', ['admin_profile'=>$admin]);

        $student = StudentModel::all();
        return view('pages/admin/student-list', ['tbl_student' => $student], ['admin_profile' => $admin]);
    }

    //ADD STUDENT USER
    public function add_student_user()
    {

        $id = Session::get('id');
        $admin = AdminModel::find($id);

        $student = StudentModel::all();
        return view('pages/admin/add-student-user', ['admin_profile' => $admin]);
    }

    //READING THE MEDICAL RECORDS OF STUDENT
    public function view_student_med_record(Request $request)
    {

        //Filtering Records
        $student_record = StudentRecordModel::where('student_id', $request->id)->get();
        return view('pages/admin/view-student-med-record', ['a_student_record' => $student_record]);
    }

    public function pending_medical_records()
    {

        $a_pending_records = StudentRecordModel::where('status_record_id', '1')->get();
        return view('pages/admin/a-pending-medical-records', compact('a_pending_records'));
    }

    public function view_pending_record($id)
    {
        $pending_record = StudentRecordModel::find($id);
        $medical_history = MedicalHistoryModel::where('student_id', $pending_record->student_id)->get();
        return view('pages/admin/a-view-pending-record-request', ['a_update_pending' => $pending_record], compact('medical_history'));
    }

    //UPDATING MEDICAL FILES
    public function saveUpdate_lab_test(Request $request, $id)
    {
        $students = StudentRecordModel::find($id);
        $cbcName = '';
        $urinalysisName = '';
        $fecalysisName = '';
        $xrayName = '';
        $hbaName = '';
        $hbvName = '';
        if ($request->hasFile('cbc_file')) {
            $cbc = $request->file('cbc_file');
            $cbcName = time() . '_' . $cbc->getClientOriginalName();
            $cbc->move(\public_path('cbc-folder/'), $cbcName);
        }
        if ($request->hasFile('urinalysis_file')) {
            $urinalysis = $request->file('urinalysis_file');
            $urinalysisName = time() . '_' . $urinalysis->getClientOriginalName();
            $urinalysis->move(\public_path('urinalysis-folder/'), $urinalysisName);
        }
        if ($request->hasFile('fecalysis_file')) {
            $fecalysis = $request->file('fecalysis_file');
            $fecalysisName = time() . '_' . $fecalysis->getClientOriginalName();
            $fecalysis->move(\public_path('fecalysis-folder/'), $fecalysisName);
        }
        if ($request->hasFile('x_ray_file')) {
            $xray = $request->file('x_ray_file');
            $xrayName = time() . '_' . $xray->getClientOriginalName();
            $xray->move(\public_path('xray-folder/'), $xrayName);
        }
        if ($request->hasFile('hba_file')) {
            $hba = $request->file('hba_file');
            $hbaName = time() . '_' . $hba->getClientOriginalName();
            $hba->move(\public_path('hba-folder/'), $hbaName);
        }
        if ($request->hasFile('hbv_file')) {
            $hbv = $request->file('hbv_file');
            $hbvName = time() . '_' . $hbv->getClientOriginalName();
            $hbv->move(\public_path('hbv-folder/'), $hbvName);
        }
        if ($students->cbc_file == ""){
            $students->cbc_file = $cbcName;
        }
        if ($students->urinalysis_file == "") {
            $students->urinalysis_file = $urinalysisName;
        }
        if ($students->fecalysis_file == "") {
            $students->fecalysis_file = $fecalysisName;
        }
        if ($students->x_ray_file == "") {
            $students->x_ray_file = $xrayName;
        }
        if ($students->hba_file == "") {
            $students->hba_file = $hbaName;
        }
        if ($students->hbv_file == "") {
            $students->hbv_file = $hbvName;
        }
        $students->save();
        
        return redirect()->back()->with('success', 'You update the laboratory test of Student Nurse named ' . $students->first_name . ' ' . $students->middle_name . ' ' . $students->last_name . ' ');
    }

    public function saveUpdate_pending_record(Request $request, $id)
    {
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
        ];

        $update_pending_record = StudentRecordModel::where('id', $id)->update($data);

        $activity_logs = new ActivityLogsModel;
        date_default_timezone_set('Asia/Manila');
        $activity_logs->description = "Admin " . Session::get('username') . " approved the pending medical record of " . $request->input()['first_name'] . " " . $request->input()['middle_name'] . " " . $request->input()['last_name'] . " on " . date("F j, Y | l") . " at " . date("h : i : s a") . " ";
        $activity_logs->save();

        return back()->with('success', 'You update the Medical Record of Student Nurse '. $request->input()['first_name']. ' ' . $request->input()['middle_name'] . ' '. $request->input()['last_name'] .' .');
    }

    //EDITING STUDENT PENDING RECORD
    public function view_approved_medical_record($id)
    {
        $approved_record = StudentRecordModel::find($id);
        $medical_history = MedicalHistoryModel::where('student_id', $approved_record->student_id)->get();
        return view('pages/admin/a-view-approved-medical-record', ['a_view_approved_medical_record' => $approved_record], compact('medical_history'));
    }

    public function saveUpdate_access_code(Request $request, $id)
    {
        $data = [
            'access_code_from_admin' => $request->input()['access_code'],
        ];
        $update_access_code = StudentRecordModel::where('id', $id)->update($data);
        
        $student = StudentRecordModel::find($id);
        $activity_logs = new ActivityLogsModel;
        date_default_timezone_set('Asia/Manila');
        $activity_logs->description = "Admin " . Session::get('username') . " update the access code of " . $student->first_name . " " . $student->middle_name . " " . $student->last_name . " on " . date("F j, Y | l") . " at " . date("h : i : s a") . " ";
        $activity_logs->save();

        return back()->with('success', 'Access code has been updated successfully.');
    }

    public function approve_request($id)
    {
        $data = [
            'status_record_id' => 2
        ];
        StudentRecordModel::where('id', $id)->update($data);

        $student = StudentRecordModel::find($id);
        $activity_logs = new ActivityLogsModel;
        date_default_timezone_set('Asia/Manila');
        $activity_logs->description = "Admin " . Session::get('username') . " approved the medical request of " . $student->first_name . " " . $student->middle_name . " " . $student->last_name . " on " . date("F j, Y | l") . " at " . date("h : i : s a") . " ";
        $activity_logs->save();

        return redirect(route('admin-dashboard'))->with('success', 'Medical record request has been approved successfully.');
    }

    public function approved_medical_records()
    {

        $a_approved_records = StudentRecordModel::where('status_record_id', '2')->get();
        return view('pages/admin/a-approved-medical-records', compact('a_approved_records'));
    }

    public function all_medical_records_request()
    {

        $all_medical_records_request = StudentRecordModel::all();
        return view('pages/admin/all-medical-records-request', compact('all_medical_records_request'));
    }

    //READING ALL RECORDS OF BLOOD TYPE
    public function blood_type_list()
    {
        $blood_type = BloodTypeModel::all();
        return view('pages/admin/blood-type-list', ['tbl_blood_type' => $blood_type]);
    }

    //READING ALL RECORDS OF GENDER
    public function gender_list()
    {
        $gender = GenderModel::all();
        return view('pages/admin/gender-list', ['tbl_gender' => $gender]);
    }

    //READING ALL RECORDS OF SECTION
    public function section_list()
    {
        $section = SectionModel::all();
        return view('pages/admin/section-list', ['tbl_section' => $section]);
    }

    //READING ALL RECORDS OF YEAR LEVEL
    public function year_level_list()
    {
        $year_level = YearLevelModel::all();
        return view('pages/admin/year-level-list', ['tbl_year_level' => $year_level]);
    }

    public function pending_appointments()
    {

        $student = AppointmentModel::where('status_appointment', '1')->get();
        return view('pages/admin/a-pending-appointments', ['pending_appointment' => $student]);
    }

    public function approved_appointments()
    {

        $student = AppointmentModel::where('status_appointment', '2')->get();
        return view('pages/admin/a-approved-appointments', ['approved_appointment' => $student]);
    }

    public function all_lab_test_appointments()
    {

        $id = Session::get('id');
        $clinician = AppointmentModel::where('from', $id)->get();
        return view('pages/admin/all-lab-test-appointments', ['all_lab_test_appointments' => $clinician]);
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


    // public function save_admin_appointment(Request $request)
    // {
    //     $apppointment = new AppointmentModel;
    //     $apppointment->from = $request->from;
    //     $apppointment->to = $request->to;
    //     $apppointment->date = $request->date;
    //     $apppointment->time = $request->time;
    //     $apppointment->room = $request->room;
    //     $apppointment->lab_test = $request->lab_test;
    //     $apppointment->status_appointment = 1;
    //     $apppointment->save();
    //     if ($request->lab_test == 1) {
    //         $lab_test = "CBC";
    //     }
    //     if ($request->lab_test == 2) {
    //         $lab_test = "Urinalysis";
    //     }
    //     if ($request->lab_test == 3) {
    //         $lab_test = "Fecalysis";
    //     }
    //     if ($request->lab_test == 4) {
    //         $lab_test = "Chest X-ray (PA)";
    //     }
    //     if ($request->lab_test == 5) {
    //         $lab_test = "Hepa B Antigen";
    //     }
    //     if ($request->lab_test == 6) {
    //         $lab_test = "Hepa B Vaccine";
    //     }
    //     return back()->with('success', 'Appointment for '. $lab_test  .' - Laboratory Test has been sent successfully');
    // }


}

<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\StaffModel;
use App\Models\ClinicianModel;
use App\Models\StudentModel;
use App\Models\StudentRecordModel;
use App\Models\CourseModel;
use App\Models\InfoModel;
use App\Http\Controllers\AuthController;
use App\Models\BloodTypeModel;
use App\Models\GenderModel;
use App\Models\SectionModel;
use App\Models\YearLevelModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AuthController extends Controller
{

    public function index () {
        return view('pages/index');
    }

    public function dashboard () {
        // $count_pending = $this->countPendingWithFilter();
        // return view('pages/admin/dashboard', ['pending' => $count_pending]);

        $pending = StudentRecordModel::where('status_record_id', '1')->count();
        $declined = StudentRecordModel::where('status_record_id', '2')->count();
        $approved = StudentRecordModel::where('status_record_id', '3')->count();
        return view('pages/admin/dashboard', compact('pending', 'declined', 'approved'));
    }

    // public function countPendingWithFilter()
    // {
    //     $filter = 1;
    //     $count = StudentRecordModel::where('status_record_id', $filter)->count();
    //     return $count;
    // }

    //READING ALL RECORDS OF ADMINS
    public function admin_list () {
        $users = AdminModel::all();
        return view('pages/admin/admin-list',['tbl_admin'=>$users]);
    }

    public function print_admin_list () {
        $users = AdminModel::all();
        return view('pages/print/print-admin_list',['tbl_admin'=>$users]);
    }

    public function login()
    {
        return view('pages/admin/admin-login');
    }

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
            session()->put('name', $result_info[0]['name']);
            session()->put('email', $result_info[0]['email']);

            $clinician =  AdminModel::where('name', '=', $request->name)->first();

            return redirect()->route('admin-dashboard');
        }
        return back()->with('error', 'Invalid username or password.');
    }

    public function logout()
    {
        Auth::logout();
        
        return redirect('/');
    }

    public function signup () 
    {
        return view('pages/signup');
    }
    
    //CREATING RECORD OF ADMIN
    public function save_admin(Request $request)
    {
        $users = new AdminModel;
        $request->password = md5($request->password);
        
        $users->name = $request->name;
        $users->email = $request->email;
        $users->username = $request->username;
        $users->password = $request->password;
        $users->save();

        //return redirect(route('index'));
        return back()->with('success', 'New account has been saved successfully');
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
    public function saveUpdate(Request $request, $id) {
        $data = [
            'name' => $request->input()['name'],
            'email' => $request->input()['email'],
            'username' => $request->input()['username']
        ];
        $update_admin = AdminModel::where('id', $id)->update($data);
        return redirect(route('admin-list'))->with('success', 'Account has been updated successfully');
    }

    public function delete($id) {
        $admin = AdminModel::find($id);
        $admin->delete();
        return redirect(route('admin-list'))->with('removal', 'Account has been remove successfully');
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
        $student = StudentModel::all();
        return view('pages/admin/student-list',['tbl_student'=>$student]);
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

    public function declined_medical_records () {

        $a_declined_records = StudentRecordModel::where('status_record_id', '2')->get();
        return view('pages/admin/a-declined-medical-records', compact('a_declined_records'));

    }

    public function approved_medical_records () {

        $a_approved_records = StudentRecordModel::where('status_record_id', '3')->get();
        return view('pages/admin/a-approved-medical-records', compact('a_approved_records'));

    }

    //READING ALL RECORDS OF COURSE
    public function course_list () {
        $course = CourseModel::all();
        return view('pages/admin/course-list',['tbl_course'=>$course]);
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


    // public function info_list () {
    //     $gender = InfoModel::all();
    //     return view('pages/admin/info-list',['tbl_gender'=>$gender]);
    // }
}

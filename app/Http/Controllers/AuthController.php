<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\StaffModel;
use App\Models\ClinicianModel;
use App\Models\StudentModel;
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
        return view('pages/admin/dashboard');
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

            return redirect('/dashboard');
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

    //READING ALL RECORDS OF STUDENT
    public function student_list () {
        $student = StudentModel::all();
        return view('pages/admin/student-list',['tbl_student'=>$student]);
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

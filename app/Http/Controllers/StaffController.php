<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaffModel;
use App\Models\StudentRecordModel;
use App\Models\MedicalHistoryModel;
use App\Models\ActivityLogsModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\Staff_Acc_Creation_Email;
use App\Mail\Staff_Acc_Creation_Receipt_Email;

class StaffController extends Controller
{
    public function dashboard()
    {
        $all_medical_records_request = StudentRecordModel::all();
        $pending = StudentRecordModel::where('status_record_id', '1')->count();
        $approved = StudentRecordModel::where('status_record_id', '2')->count();
        return view('pages/staff/dashboard', compact('pending', 'approved', 'all_medical_records_request'));
    }

    public function staff_login()
    {
        return view('pages/staff/staff-login');
    }

    public function staff_loginPost(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => md5($request->password)
        ];

        $result_count = StaffModel::where($credentials)->get()->count();

        if ($result_count > 0) {

            $result_info = StaffModel::where($credentials)->get();

            session()->put('id', $result_info[0]['id']);
            session()->put('first_name', $result_info[0]['first_name']);
            session()->put('middle_name', $result_info[0]['middle_name']);
            session()->put('last_name', $result_info[0]['last_name']);
            session()->put('username', $result_info[0]['username']);
            session()->put('email', $result_info[0]['email']);

            $clinician =  StaffModel::where('username', '=', $request->username)->first();

            return redirect()->route('staff-dashboard');
        }
        return back()->with('error', 'Invalid username or password.');
    }

    //CREATING RECORD OF STAFF
    public function save_staff(Request $request)
    {
        $staff = new StaffModel;
        $staff->first_name = "no-firstname";
        $staff->middle_name = "no-middlename";
        $staff->last_name = "no-lastname";
        $staff->email = $request->email;
        $staff->admin_email = $request->admin_email;
        $staff->username = $request->username;
        $staff->password = $request->password;

        //For Email
        Mail::to($staff->email)->send(new Staff_Acc_Creation_Email($staff));
        Mail::to($staff->admin_email)->send(new Staff_Acc_Creation_Receipt_Email($staff));

        //For Activity Logs
        $activity_logs = new ActivityLogsModel;
        date_default_timezone_set('Asia/Manila');
        $activity_logs->description = "Admin " . Session::get('username') . " created an account for Department Staff with $request->username username on " . date("F j, Y | l") . " at " . date("h : i : s a") . " ";
        $activity_logs->save();

        $staff->password = md5($request->password);
        $staff->save();

        return redirect(route('admin-dashboard'))->with('success', 'New Department Staff user has been created successfully');
    }

    //EDITING NURSE STAFF'S RECORD
    public function update_staff(Request $request, $id)
    {
        $staff = StaffModel::find($id);
        $response = [
            'tbl_staff' => $staff
        ];
        return view('pages/staff/edit-staff', $response);
    }

    //UPDATING NURSE STAFF'S RECORD
    public function saveUpdate_staff(Request $request, $id)
    {
        $data = [
            'first_name' => $request->input()['first_name'],
            'middle_name' => $request->input()['middle_name'],
            'last_name' => $request->input()['last_name'],
            'email' => $request->input()['email'],
            'username' => $request->input()['username']
        ];
        $update_staff = StaffModel::where('id', $id)->update($data);

        //For Activity Logs
        $activity_logs = new ActivityLogsModel;
        date_default_timezone_set('Asia/Manila');
        $activity_logs->description = "Admin " . Session::get('username') . " updated the information of Department Staff with $request->username username on " . date("F j, Y | l") . " at " . date("h : i : s a") . " ";
        $activity_logs->save();

        return redirect(route('staff-list'))->with('success', 'The information of Department Staff ' . $request->input()['first_name'] . ' ' . $request->input()['middle_name'] . ' ' . $request->input()['last_name'] . ' has been updated successfully. ');
    }

    public function delete_staff($id)
    {
        $staff = StaffModel::find($id);
        $staff->delete();
        return redirect(route('staff-list'));
    }

    //Staff PROFILE
    public function staff_profile()
    {
        $id = Session::get('id');
        $clinician = StaffModel::find($id);

        return view('pages/staff/staff-profile', ['staff_profile' => $clinician]);
    }

    //UPDATING Staff'S PROFILE
    public function saveUpdate_profile(Request $request)
    {
        $id = Session::get('id');
        $data = [
            'first_name' => $request->input()['first_name'],
            'middle_name' => $request->input()['middle_name'],
            'last_name' => $request->input()['last_name'],
            'email' => $request->input()['email'],

        ];
        $update_student_account = StaffModel::where('id', $id)->update($data);
        return redirect(route('staff-login'))->with('success', 'Profile has been updated successfully');
    }

    public function save_image_profile(Request $request)
    {

        $id = Session::get('id');

        $students = StudentRecordModel::find($id);
        $other = StudentRecordModel::find($id);
        $imageName = '';


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(\public_path('profile-folder/'), $imageName);
        }

        if ($students->image == "") {
            $students->image = $imageName;
        }
        $students->save();

        $students->save();
        // $update_student_account = StaffModel::where('id', $id)->update($data);
        return redirect(route('staff-login'))->with('success', 'Profile has been updated successfully');
    }

    public function saveUpdate_image_profile(Request $request)
    {
        $id = Session::get('id');

        $students = StudentRecordModel::find($id);
        $other = StudentRecordModel::find($id);
        $imageName = '';

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(\public_path('profile-folder/'), $imageName);
        }
        if ($students->image !== "") {
            $students->image = $other->image;
        } else {
            $students->image = $imageName;
        }

        $students->save();
        // $update_student_account = StaffModel::where('id', $id)->update($data);
        return redirect(route('staff-login'))->with('success', 'Profile has been updated successfully');
    }

    //STAFF ACCOUNT SETTING
    public function staff_account_settings()
    {
        $id = Session::get('id');
        $staff = StaffModel::find($id);
        return view('pages/staff/staff-account-settings', ['staff_acount' => $staff]);
    }

    //UPDATING USERNAME
    public function saveUpdate_username(Request $request)
    {
        $credentials = [
            'username' => $request->newusername
        ];
        $result_count = StaffModel::where($credentials)->get()->count();

        if ($result_count > 0) {
            return back()->with('error', 'Username already exist.');
        } else if ($request->input()['currentusername'] !== Session::get('username')) {
            return back()->with('error', 'Invalid current username.');
        } else {
            $id = Session::get('id');
            $data = [
                'username' => $request->input()['newusername']
            ];
            $update_admin_userame = StaffModel::where('id', $id)->update($data);
            $activity_logs = new ActivityLogsModel;
            date_default_timezone_set('Asia/Manila');
            $activity_logs->description = "Department Staff " . Session::get('first_name') . " " . Session::get('middle_name') . " " . Session::get('last_name') . " change his/her username on " . date("F j, Y | l") . " at " . date("h : i : s a") . " ";
            $activity_logs->save();
            return redirect(route('staff-login'))->with('success', 'Username has been change successfully.');
        }
    }

    public function saveUpdate_password(Request $request)
    {
        $credentials = [
            'password' => md5($request->currentpassword)
        ];
        $result_count = StaffModel::where($credentials)->get()->count();

        if ($result_count > 0) {
            if ($request->input()['renewpassword'] !== $request->input()['newpassword']) {
                return back()->with('error', 'Re-entered new password does not match.');
            } else {
                $id = Session::get('id');
                $data = [
                    'password' => md5($request->input()['newpassword'])
                ];
                $update_admin_password = StaffModel::where('id', $id)->update($data);
                $activity_logs = new ActivityLogsModel;
                date_default_timezone_set('Asia/Manila');
                $activity_logs->description = "Department Staff " . Session::get('first_name') . " " . Session::get('middle_name') . " " . Session::get('last_name') . " change his/her password on " . date("F j, Y | l") . " at " . date("h : i : s a") . " ";
                $activity_logs->save();
                return redirect(route('staff-login'))->with('success', 'Password has been changed successfully.');
            }
        }
        else {
            return back()->with('error', 'Current password not found.');
        }
    }


    //EDITING STUDENT PENDING RECORD

    public function pending_medical_records()
    {
        $s_pending_records = StudentRecordModel::where('status_record_id', '1')->get();
        return view('pages/staff/s-pending-medical-records', compact('s_pending_records'));
    }

    public function approved_medical_records()
    {
        $s_approved_records = StudentRecordModel::where('status_record_id', '2')->get();
        return view('pages/staff/s-approved-medical-records', compact('s_approved_records'));
    }

    public function all_medical_records_request()
    {
        $all_medical_records_request = StudentRecordModel::all();
        return view('pages/staff/all-medical-records-request', compact('all_medical_records_request'));
    }

    public function view_pending_record($id)
    {
        $pending_record = StudentRecordModel::find($id);
        $medical_history = MedicalHistoryModel::where('student_id', $pending_record->student_id)->get();
        return view('pages/staff/s-view-pending-record', ['s_view_pending' => $pending_record], compact('medical_history'));
    }
    public function view_approved_record($id)
    {
        $approved_record = StudentRecordModel::find($id);
        $medical_history = MedicalHistoryModel::where('student_id', $approved_record->student_id)->get();
        return view('pages/staff/s-view-approved-medical-record', ['s_view_approved' => $approved_record], compact('medical_history'));
    }

    public function update_pending_record($id)
    {
        $pending_record = StudentRecordModel::find($id);
        $medical_history = MedicalHistoryModel::where('student_id', $pending_record->student_id)->get();
        return view('pages/staff/s-view-pending-record', ['s_update_pending' => $pending_record], compact('medical_history'));
    }

    public function update_approved_record($id)
    {
        $approved_record = StudentRecordModel::find($id);
        $medical_history = MedicalHistoryModel::where('student_id', $approved_record->student_id)->get();
        return view('pages/staff/s-view-aprroved-record', ['s_update_approved' => $approved_record], compact('medical_history'));
    }


    public function logout()
    {
        $activity_logs = new ActivityLogsModel;
        date_default_timezone_set('Asia/Manila');
        $activity_logs->description = " " . Session::get('username') . " logged out on " . date("F j, Y | l") . " at " . date("h : i : s a") . " ";
        $activity_logs->save();

        Auth::logout();

        return redirect('/');
    }
}

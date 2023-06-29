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
    public function update_staff(Request $request, $id) {
        $staff = StaffModel::find($id);
        $response = [
            'tbl_staff' => $staff
        ];
        return view('pages/staff/edit-staff', $response);
    }

    //UPDATING NURSE STAFF'S RECORD
    public function saveUpdate_staff(Request $request, $id) {
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

    public function delete_staff($id) {
        $staff = StaffModel::find($id);
        $staff->delete();
        return redirect(route('staff-list'));
    }

    public function pending_medical_records () {

        $s_pending_records = StudentRecordModel::where('status_record_id', '1')->get();
        return view('pages/staff/s-pending-medical-records', compact('s_pending_records'));

    }

     //EDITING STUDENT PENDING RECORD
    public function view_pending_record($id) {
        $pending_record = StudentRecordModel::find($id);
        return view('pages/staff/s-view-pending-record', ['s_view_pending'=> $pending_record]);
    }
    public function view_approved_record($id) {
        $pending_record = StudentRecordModel::find($id);
        return view('pages/staff/s-view-approved-record', ['s_view_approved'=> $pending_record]);
    }
    
    public function approved_medical_records () {
        $s_approved_records = StudentRecordModel::where('status_record_id', '2')->get();
        return view('pages/staff/s-approved-medical-records', compact('s_approved_records'));

    }

    public function all_medical_records_request () {

        $all_medical_records_request = StudentRecordModel::all();
        return view('pages/staff/all-medical-records-request', compact('all_medical_records_request'));

    }
    public function view_approved_medical_record($id) {
        $approved_record = StudentRecordModel::find($id);
        $medical_history = MedicalHistoryModel::where('student_id', $approved_record->student_id)->get();
        return view('pages/staff/s-view-approved-record', ['s_view_approved_medical_record'=> $approved_record], compact('medical_history'));

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

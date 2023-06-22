<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaffModel;
use App\Models\StudentRecordModel;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class StaffController extends Controller
{
    public function dashboard()
    {
        $pending = StudentRecordModel::where('status_record_id', '1')->count();
        $declined = StudentRecordModel::where('status_record_id', '2')->count();
        $approved = StudentRecordModel::where('status_record_id', '3')->count();
        return view('pages/staff/dashboard', compact('pending', 'declined', 'approved'));
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

    public function logout()
    {
        Auth::logout();
        
        return redirect('/');
    }
    
    //CREATING RECORD OF STAFF
    public function save_staff(Request $request)
    {
        $staff = new StaffModel;
        $request->password = md5($request->password);
        $staff->email = $request->email;
        $staff->username = $request->username;
        $staff->password = $request->password;
        $staff->save();

        return back()->with('success', 'New account has been saved successfully');
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
        return redirect(route('staff-list'));
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
     public function view_pending_record(Request $request, $id) {
        $pending_record = StudentRecordModel::find($id);
        return view('pages/staff/s-view-pending-record', ['s_view_pending'=> $pending_record]);
    }

    public function approved_medical_records () {

        $s_approved_records = StudentRecordModel::where('status_record_id', '3')->get();
        return view('pages/staff/s-approved-medical-records', compact('s_approved_records'));

    }

}

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
            session()->put('name', $result_info[0]['name']);
            session()->put('email', $result_info[0]['email']);

            $clinician =  StaffModel::where('name', '=', $request->name)->first();

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
        $staff->name = $request->name;
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
            'name' => $request->input()['name'],
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
}

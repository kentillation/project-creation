<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClinicianModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class ClinicianCotroller extends Controller
{
    public function clinician_login()
    {
        return view('pages/clinician/clinician-login');
    }

    // CLINICIAN LOGIN
    public function clinician_loginPost(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => md5($request->password)
        ];
        $result_count = ClinicianModel::where($credentials)->get()->count();
    
        if ($result_count > 0) {

            return view('/pages/clinician/dashboard');
        }
        return back()->with('error', 'Invalid username or password.');
    }

    // LOGOUT CLINICIAN
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    
    //CREATING RECORD OF CLINICIAN
    public function save_clinician(Request $request)
    {
        $clinician = new ClinicianModel;
        $request->password = md5($request->password);
        $clinician->name = $request->name;
        $clinician->email = $request->email;
        $clinician->username = $request->username;
        $clinician->password = $request->password;
        $clinician->save();
        return back()->with('success', 'New account has been saved successfully');
    }
    
    //EDITING NURSE CLINICIAN'S RECORD
    public function update_clinician(Request $request, $id) {
        $clinician = ClinicianModel::find($id);
        $response = [
            'tbl_clinician' => $clinician
        ];
        return view('pages/clinician/edit-clinician', $response);
    }

    //UPDATING CLINICIAN'S RECORD
    public function saveUpdate_clinician(Request $request, $id) {
        $data = [
            'name' => $request->input()['name'],
            'email' => $request->input()['email'],
            'username' => $request->input()['username']
        ];
        $update_clinician = ClinicianModel::where('id', $id)->update($data);
        return redirect(route('clinician-list'));
    }

    //DELETE CLINICIAN
    public function delete_clinician($id) {
        $clinician = ClinicianModel::find($id);
        $clinician->delete();
        return redirect(route('clinician-list'));
    }
}

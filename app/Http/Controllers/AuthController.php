<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\InfoModel;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AuthController extends Controller
{
    public function dashboard () {
        return view('pages/admin/dashboard');
    }

    //READING ALL RECORDS OF ADMINS
    public function admin_list () {
        $users = AdminModel::all();
        return view('pages/admin/admin-list',['tbl_admin'=>$users]);
    }

    // public function print_admin_list () {
    //     $users = AdminModel::all();
    //     return view('pages/Print/print-admin-list',['tbl_admin'=>$users]);
    // }

    //EDITING SPECIFIC RECORD OF ADMIN
    // public function edit_admin(Request $request, $id) {
    //     $users = AdminModel::find($id);
    //     $response = [
    //         'tbl_users' => $users
    //     ];
    //     return view('pages/Editables/admin-update', $response);
    // }

    //UPDATING SPECIFIC RECORD OF ADMIN
    // public function admin_update (Request $request, $id) {
    //     $name = $request->input()['name'];
    //     $data = [
    //         'name' => $request->input()['name'],
    //         'fb_name' => $request->input()['fb_name'],
    //         'age' => $request->input()['age'],
    //         'address' => $request->input()['address'],
    //         'contact' => $request->input()['contact'],
    //         'email' => $request->input()['email'],
    //         'username' => $request->input()['username'],
    //         'password' => $request->input()['password']
    //     ];
    //     $updated_user = AdminModel::where('id', $id)->update($data);
    //     return redirect(route('users-list'))->with("success", "The information of '$name' has been updated successfully.");
    // }

    //DELETING SPECIFIC RECORD OF ADMIN
    // public function remove_admin($id) {
    //     $users = AdminModel::find($id);
    //     $users->delete();
    //     return redirect(route('admin-list'))->with("removal", "A user has been remove.");
    // }

    public function login()
    {
        return view('pages/index');
    }

    public function loginPost(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => md5($request->password)
        ];

        $result_count = AdminModel::where($credentials)->get()->count();
    
        if ($result_count > 0) {

            //Schema::drop('tbl_stocks');
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
    
    //CREATING RECORD OF USER
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

    public function info_list () {
        $gender = InfoModel::all();
        return view('pages/admin/info-list',['tbl_gender'=>$gender]);
    }
}

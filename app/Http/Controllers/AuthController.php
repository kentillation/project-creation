<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\EducatorModel;
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
        return view('pages/admin/admin-signup');
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
        return redirect(route('admin-list'));
    }

    public function delete($id) {
        $admin = AdminModel::find($id);
        $admin->delete();
        return redirect(route('admin-list'));
    }

    //READING ALL RECORDS OF ADMINS
    public function educator_list () {
        $educator = EducatorModel::all();
        return view('pages/admin/educator-list',['tbl_educator'=>$educator]);
    }


    // public function info_list () {
    //     $gender = InfoModel::all();
    //     return view('pages/admin/info-list',['tbl_gender'=>$gender]);
    // }
}

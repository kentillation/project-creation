<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EducatorModel;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class EducatorController extends Controller
{
    // public function nurse_educator_dashboard () {
    //     return view('pages/educator/dashboard');
    // }

    public function educator_login()
    {
        return view('pages/educator/educator-login');
    }

    public function educator_loginPost(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => md5($request->password)
        ];

        $result_count = EducatorModel::where($credentials)->get()->count();
    
        if ($result_count > 0) {

            //Schema::drop('tbl_stocks');
            /*Schema::table('tbl_stocks', function (Blueprint $table) {
                $table->dropColumn(['created_at', 'updated_at']);
            });*/

            return view('/pages/educator/dashboard');
        }
        return back()->with('error', 'Invalid username or password.');
    }

    // public function logout()
    // {
    //     Auth::logout();
        
    //     return redirect('/');
    // }

    // public function signup () 
    // {
    //     return view('pages/signup');
    // }
    
    //CREATING RECORD OF USER
    public function save_educator(Request $request)
    {
        $educator = new EducatorModel;
        $request->password = md5($request->password);
        $educator->name = $request->name;
        $educator->email = $request->email;
        $educator->username = $request->username;
        $educator->password = $request->password;
        $educator->save();

        //return redirect(route('index'));
        return back()->with('success', 'New account has been saved successfully');
    }
    
    //EDITING NURSE EDUCATOR'S RECORD
    public function update_educator(Request $request, $id) {
        $educator = EducatorModel::find($id);
        $response = [
            'tbl_educator' => $educator
        ];
        return view('pages/educator/edit-educator', $response);
    }

    //UPDATING NURSE EDUCATOR'S RECORD
    public function saveUpdate_educator(Request $request, $id) {
        $data = [
            'name' => $request->input()['name'],
            'email' => $request->input()['email'],
            'username' => $request->input()['username']
        ];
        $update_educator = EducatorModel::where('id', $id)->update($data);
        return redirect(route('educator-list'));
    }

    public function delete_educator($id) {
        $educator = EducatorModel::find($id);
        $educator->delete();
        return redirect(route('educator-list'));
    }
}

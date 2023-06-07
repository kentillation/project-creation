<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleModel;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class RoleController extends Controller
{
    public function create() {
        return view('role/role');
    }
    public function save(Request $request) {
        $role = new RoleModel;
        $role->role = $request->input('role');
        $role->save();
        return redirect(route('role-list'));
    }

    public function role_list() {
        $role = RoleModel::all();
        return view("role/role", ['tbl_role' => $role]);
    }

    public function update(Request $request, $id) {
        $role = RoleModel::find($id);
        $response = [
            'tbl_role' => $role
        ];
        return view('role/edit-role', $response);
    }

    public function saveUpdate(Request $request, $id) {
        $data = [
            'role' => $request->input()['role']
        ];
        $update_role = RoleModel::where('id', $id)->update($data);
        return redirect(route('role-list'));
    }

    public function delete($id) {
        $role = RoleModel::find($id);
        $role->delete();
        return redirect(route('role-list'));
    }
}

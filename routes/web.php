<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('/pages/index');
});

//NURSE EDUCATOR CONTROLLER
Route::get('/educator-list', 'EducatorController@educator_list')->name('educator-list');

//AUTH CONTROLLER
Route::get('/', 'AuthController@login')->name('index');
Route::post('/index', 'AuthController@loginPost')->name('login');
Route::get('/signup', 'AuthController@signup')->name('signup');
Route::post('/save-admin', 'AuthController@save_admin')->name('save-admin');
Route::delete('/logout', 'AuthController@logout')->name('logout');
Route::get('/dashboard', 'AuthController@dashboard')->name('dashboard');
Route::get('/admin-list', 'AuthController@admin_list')->name('admin-list');

Route::get('/info-list', 'AuthController@info_list')->name('info-list');

//Role
Route::get('/role', 'RoleController@create')->name('create-role'); //create
Route::post('/role/save', 'RoleController@save')->name('save-role'); //save function
Route::get('/role/list', 'RoleController@role_list')->name('role-list'); //list
Route::get('/role/update/{id}', 'RoleController@update')->name('update-role'); //edit
Route::post('/role/save-update/{id}', 'RoleController@saveUpdate')->name('update-save-role'); //save update
Route::get('/role/list/{id}', 'RoleController@delete')->name('delete-role'); //delete

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/pages/index');
});

//AUTH CONTROLLER
Route::get('/admin-login', 'AuthController@login')->name('admin-login');
Route::post('/admin-login', 'AuthController@loginPost')->name('login');
Route::get('/signup', 'AuthController@signup')->name('signup');
Route::post('/save-admin', 'AuthController@save_admin')->name('save-admin');
Route::delete('/logout', 'AuthController@logout')->name('logout');
Route::get('/dashboard', 'AuthController@dashboard')->name('dashboard');
Route::get('/admin/update/{id}', 'AuthController@update')->name('update-admin');
Route::post('/admin/save-update/{id}', 'AuthController@saveUpdate')->name('update-save-admin');
Route::get('/admin/list/{id}', 'AuthController@delete')->name('delete-admin');

Route::get('/admin-list', 'AuthController@admin_list')->name('admin-list');
Route::get('/educator-list', 'AuthController@educator_list')->name('educator-list');
Route::get('/clinician-list', 'AuthController@clinician_list')->name('clinician-list');

//NURSE EDUCATOR CONTROLLER
Route::get('/educator-login', 'EducatorController@educator_login')->name('educ-login');
Route::post('/educator-login', 'EducatorController@educator_loginPost')->name('educator-login');
Route::post('/save-nurse-educator', 'EducatorController@save_educator')->name('save-educator');
Route::delete('/nurse-educator/logout', 'EducatorController@logout')->name('educator-logout');
Route::get('/nurse-educator/dashboard', 'EducatorController@dashboard')->name('nurse-educator-dashboard');
Route::get('/nurse-educator/update/{id}', 'EducatorController@update_educator')->name('update-educator');
Route::post('/nurse-educator/save-update/{id}', 'EducatorController@saveUpdate_educator')->name('update-save-educator');
Route::get('/nurse-educator/list/{id}', 'EducatorController@delete_educator')->name('delete-educator');

//CLINICIAN CONTROLLER
Route::get('/clinician-login', 'ClinicianController@clinician_login')->name('clinician-login');
Route::post('/clinician-login', 'ClinicianController@clinician_loginPost')->name('login-clinician');
Route::post('/save-clinician', 'ClinicianController@save_clinician')->name('save-clinician');
Route::delete('/clinician/logout', 'ClinicianController@logout')->name('clinician-logout');
Route::get('/clinician/dashboard', 'ClinicianController@dashboard')->name('clinician-dashboard');
Route::get('/clinician/update/{id}', 'ClinicianController@update_clinician')->name('update-clinician');
Route::post('/clinician/save-update/{id}', 'ClinicianController@saveUpdate_clinician')->name('update-save-clinician');
Route::get('/clinician/list/{id}', 'ClinicianController@delete_clinician')->name('delete-clinician');

// Route::get('/info-list', 'AuthController@info_list')->name('info-list');

//Role
Route::get('/role', 'RoleController@create')->name('create-role'); //create
Route::post('/role/save', 'RoleController@save')->name('save-role'); //save function
Route::get('/role/list', 'RoleController@role_list')->name('role-list'); //list
Route::get('/role/update/{id}', 'RoleController@update')->name('update-role'); //edit
Route::post('/role/save-update/{id}', 'RoleController@saveUpdate')->name('update-save-role'); //save update
Route::get('/role/list/{id}', 'RoleController@delete')->name('delete-role'); //delete

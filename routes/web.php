<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'AuthController@index')->name('index');

//AUTH CONTROLLER
Route::get('/admin-login', 'AuthController@login')->name('admin-login');
Route::post('/admin-login', 'AuthController@loginPost')->name('login');
Route::get('/signup', 'AuthController@signup')->name('signup');
Route::post('/admin/save-admin', 'AuthController@save_admin')->name('save-admin');
Route::delete('/admin/logout', 'AuthController@logout')->name('logout');
Route::get('/admin/dashboard', 'AuthController@dashboard')->name('admin-dashboard');
Route::get('/admin/update/{id}', 'AuthController@update')->name('update-admin');
Route::post('/admin/save-update/{id}', 'AuthController@saveUpdate')->name('update-save-admin');
Route::get('/admin/list/{id}', 'AuthController@delete')->name('delete-admin');
Route::get('/admin/admin-list', 'AuthController@admin_list')->name('admin-list');
Route::get('/admin/print-admin_list', 'AuthController@print_admin_list')->name('print-admin_list');
Route::get('/admin/staff-list', 'AuthController@staff_list')->name('staff-list');
Route::get('/admin/clinician-list', 'AuthController@clinician_list')->name('clinician-list');
Route::get('/admin/student-list', 'AuthController@student_list')->name('student-list');
Route::get('/admin/view-student-medical-record', 'AuthController@view_student_med_record')->name('view-stud-med-record');

//DEPARTMENT STAFF CONTROLLER
Route::get('/staff-login', 'StaffController@staff_login')->name('staff-login');
Route::post('/staff-login', 'StaffController@staff_loginPost')->name('login-staff');
Route::post('/save-staff', 'StaffController@save_staff')->name('save-staff');
Route::delete('/staff/logout', 'StaffController@logout')->name('staff-logout');
Route::get('/staff/dashboard', 'StaffController@dashboard')->name('staff-dashboard');
Route::get('/staff/update/{id}', 'StaffController@update_staff')->name('update-staff');
Route::post('/staff/save-update/{id}', 'StaffController@saveUpdate_staff')->name('update-save-staff');
Route::get('/staff/list/{id}', 'StaffController@delete_staff')->name('delete-staff');

//CLINICIAN CONTROLLER
Route::get('/clinician-login', 'ClinicianController@clinician_login')->name('clinician-login');
Route::post('/clinician-login', 'ClinicianController@clinician_loginPost')->name('login-clinician');
Route::post('/save-clinician', 'ClinicianController@save_clinician')->name('save-clinician');
Route::delete('/clinician/logout', 'ClinicianController@logout')->name('clinician-logout');
Route::get('/clinician/dashboard', 'ClinicianController@dashboard')->name('clinician-dashboard');
Route::get('/clinician/update/{id}', 'ClinicianController@update_clinician')->name('update-clinician');
Route::post('/clinician/save-update/{id}', 'ClinicianController@saveUpdate_clinician')->name('update-save-clinician');
Route::get('/clinician/list/{id}', 'ClinicianController@delete_clinician')->name('delete-clinician');
Route::get('/clinician/add-student-medical-record', 'ClinicianController@add_student_med_record')->name('add-student-med-record');
Route::post('/clinician/save-student-medical-record', 'ClinicianController@save_student_med_record')->name('save-student-med-record');
Route::get('/clinician/view-student-medical-record', 'ClinicianController@view_student_med_record')->name('view-student-med-record');

//STUDENT CONTROLLER
Route::get('/student-login', 'StudentController@student_login')->name('student-login');
Route::post('/student-login', 'StudentController@student_loginPost');
Route::get('/student-dashboard', 'StudentController@dashboard')->name('student-dashboard');
Route::delete('/student/logout', 'StudentController@logout')->name('student-logout');
Route::post('/save-student', 'StudentController@save_student')->name('save-student');
Route::get('/student/update/{id}', 'StudentController@update_student')->name('update-student');
Route::post('/student/save-update/{id}', 'StudentController@saveUpdate_student')->name('update-save-student');
Route::get('/student/delete/{id}', 'StudentController@delete_student')->name('delete-student');
Route::get('/student/add-medical-record', 'StudentController@add_medical_record')->name('add-medical-record');
Route::post('/student/save-medical-record', 'StudentController@save_medical_record')->name('save-medical-record');
Route::get('/student/view-medical-record', 'StudentController@view_medical_record')->name('view-medical-record');

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

Route::get('/admin/pending-medical-record-requests', 'AuthController@pending_medical_records')->name('a-pending-medical-records');
Route::get('/admin/view-pending-record-request/{id}', 'AuthController@view_pending_record')->name('a-view-pending-record');
Route::post('/admin/save-update-pending-record-request/{id}', 'AuthController@saveUpdate_pending_record')->name('a-save-update-pending-record');

Route::get('/admin/declined-medical-record-requests', 'AuthController@declined_medical_records')->name('a-declined-medical-records');
Route::get('/admin/approved-medical-record-requests', 'AuthController@approved_medical_records')->name('a-approved-medical-records');

//ADMIN PROFILE
Route::get('/admin/profile', 'AuthController@admin_profile')->name('admin-profile');
Route::get('/admin/update-profile/{id}', 'AuthController@profile')->name('update-admin-profile');
Route::post('/admin/save-update-profile/{id}', 'AuthController@saveUpdate_profile')->name('update-save-admin-profile');

//ADMIN ACCOUNT SETTINGS
Route::get('/admin/account-settings', 'AuthController@admin_account_settings')->name('admin-account-settings');

//STUDENT CONTROLLER
Route::get('/student-login', 'StudentController@student_login')->name('student-login');
Route::post('/student-login', 'StudentController@student_loginPost');
Route::get('/student-dashboard', 'StudentController@dashboard')->name('student-dashboard');
Route::delete('/student/logout', 'StudentController@logout')->name('student-logout');
Route::post('/save-student', 'StudentController@save_student')->name('save-student');
Route::get('/student/update/{id}', 'StudentController@update_student')->name('update-student');
Route::post('/student/save-update/{id}', 'StudentController@saveUpdate_student')->name('update-save-student');
Route::get('/student/delete/{id}', 'StudentController@delete_student')->name('delete-student');
//Medical Record
Route::get('/student/add-medical-record', 'StudentController@add_medical_record')->name('add-medical-record');
Route::post('/student/save-medical-record', 'StudentController@save_medical_record')->name('save-medical-record');
Route::get('/student/view-medical-records', 'StudentController@view_medical_records')->name('view-medical-records');
Route::get('/student/view-record', 'StudentController@view_record')->name('view-record');
//Medical History
Route::get('/student/add-medical-history', 'StudentController@add_medical_history')->name('add-medical-history');
Route::post('/student/save-medical-history', 'StudentController@save_medical_history')->name('save-medical-history');
Route::get('/student/view-medical-histories', 'StudentController@view_medical_histories')->name('view-medical-histories');
//Student Profile
Route::get('/student/profile', 'StudentController@student_profile')->name('student-profile');
Route::post('/student/save-update-profile/{id}', 'StudentController@saveUpdate_profile')->name('update-save-student-profile');

Route::get('/student/account-settings', 'StudentController@student_account_settings')->name('student-account-settings');

Route::get('/student/pending-appointments', 'StudentController@pending_appointments')->name('pending-appointments');
Route::post('/student/pending-appointment', 'StudentController@update_pending_appointment_come')->name('update-pending-appointment-come');
Route::post('/student/pending-appointment', 'StudentController@update_pending_appointment_not')->name('update-pending-appointment-not');

//DEPARTMENT STAFF CONTROLLER
Route::get('/staff-login', 'StaffController@staff_login')->name('staff-login');
Route::post('/staff-login', 'StaffController@staff_loginPost')->name('login-staff');
Route::post('/save-staff', 'StaffController@save_staff')->name('save-staff');
Route::delete('/staff/logout', 'StaffController@logout')->name('staff-logout');
Route::get('/staff/dashboard', 'StaffController@dashboard')->name('staff-dashboard');
Route::get('/staff/update/{id}', 'StaffController@update_staff')->name('update-staff');
Route::post('/staff/save-update/{id}', 'StaffController@saveUpdate_staff')->name('update-save-staff');
Route::get('/staff/list/{id}', 'StaffController@delete_staff')->name('delete-staff');

Route::get('/staff/pending-medical-records', 'StaffController@pending_medical_records')->name('s-pending-medical-records');
Route::get('/staff/view-pending-record/{id}', 'StaffController@view_pending_record')->name('s-view-pending-record');
Route::get('/staff/approved-medical-records', 'StaffController@approved_medical_records')->name('s-approved-medical-records');

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

Route::get('/clinician/pending-medical-records', 'ClinicianController@pending_medical_records')->name('c-pending-medical-records');
Route::get('/clinician/update-pending-record/{id}', 'ClinicianController@update_pending_record')->name('c-update-pending-record');
Route::post('/clinician/save-update-pending-record/{id}', 'ClinicianController@saveUpdate_pending_record')->name('c-save-update-pending-record');

Route::get('/clinician/declined-medical-records', 'ClinicianController@declined_medical_records')->name('c-declined-medical-records');
Route::get('/clinician/approved-medical-records', 'ClinicianController@approved_medical_records')->name('c-approved-medical-records');

Route::post('/save-clinician-appointment', 'ClinicianController@save_clinician_appointment')->name('save-clinician-appointment');

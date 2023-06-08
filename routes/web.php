<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('/pages/index');
// });

Route::get('/', 'AuthController@index')->name('index');

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
Route::get('/print-admin_list', 'AuthController@print_admin_list')->name('print-admin_list');
Route::get('/staff-list', 'AuthController@staff_list')->name('staff-list');
Route::get('/clinician-list', 'AuthController@clinician_list')->name('clinician-list');
Route::get('/student-list', 'AuthController@student_list')->name('student-list');
Route::get('/course-list', 'AuthController@course_list')->name('course-list');
Route::get('/section-list', 'AuthController@section_list')->name('section-list');
Route::get('/blood-type-list', 'AuthController@blood_type_list')->name('blood-type-list');
Route::get('/gender-list', 'AuthController@gender_list')->name('gender-list');
Route::get('/year-level-list', 'AuthController@year_level_list')->name('year-level-list');

//NURSE STAFF CONTROLLER
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

//STUDENT CONTROLLER
Route::get('/student-login', 'StudentController@student_login')->name('student-login');
Route::post('/student-login', 'StudentController@student_loginPost');
Route::get('/student/dashboard', 'StudentController@dashboard')->name('student-dashboard');
Route::post('/save-student', 'StudentController@save_student')->name('save-student'); //save
Route::get('/student/update/{id}', 'StudentController@update_student')->name('update-student'); //edit
Route::post('/student/save-update/{id}', 'StudentController@saveUpdate_student')->name('update-save-student'); //save update
Route::get('/student/list/{id}', 'StudentController@delete_student')->name('delete-student'); //delete

Route::get('/add-medical-record', 'StudentController@add_medical_record')->name('add-medical-record');

//Course Routes
Route::post('/save-course', 'CourseController@save_course')->name('save-course'); //save
Route::get('/course/update/{id}', 'CourseController@update_course')->name('update-course'); //edit
Route::post('/course/save-update/{id}', 'CourseController@saveUpdate_course')->name('update-save-course'); //save update
Route::get('/course/list/{id}', 'CourseController@delete_course')->name('delete-course'); //delete

//Section Routes
Route::post('/section/save-section', 'SectionController@save_section')->name('save-section'); //save
Route::get('/section/update-section/{id}', 'SectionController@update_section')->name('update-section'); //edit
Route::post('/section/saveUpdate-section/{id}', 'SectionController@saveUpdate_section')->name('saveUpdate-section'); //save update
Route::get('/section/section-list/{id}', 'SectionController@delete_section')->name('delete-section'); //delete

//Blood Type Routes
Route::post('/blood-type/save-blood-type', 'BloodTypeController@save_blood_type')->name('save-blood-type'); //save
Route::get('/blood-type/update-blood-type/{id}', 'BloodTypeController@update_blood_type')->name('update-blood-type'); //edit/update
Route::post('/blood-type/saveUpdate-blood-type/{id}', 'BloodTypeController@saveUpdate_blood_type')->name('saveUpdate-blood-type'); //save update
Route::get('/blood-type/blood-type-list/{id}', 'BloodTypeController@delete_blood_type')->name('delete-blood-type'); //delete



//Gender Routes
Route::post('/gender/save-gender', 'GenderController@save_gender')->name('save-gender'); //save
Route::get('/gender/update-gender/{id}', 'GenderController@update_gender')->name('update-gender'); //edit
Route::post('/gender/saveUpdate-gender/{id}', 'GenderController@saveUpdate_gender')->name('saveUpdate-gender'); //save update
Route::get('/gender/gender-list/{id}', 'GenderController@delete_gender')->name('delete-gender'); //delete


//Year Level Routes
Route::post('/year-level/save-year-level', 'YearLevelController@save_year_level')->name('save-year-level'); //save
Route::get('/year-level/update-year-level/{id}', 'YearLevelController@update_year_level')->name('update-year-level'); //edit
Route::post('/year-level/saveUpdate-year-level/{id}', 'YearLevelController@saveUpdate_year_level')->name('saveUpdate-year-level'); //save update
Route::get('/year-level/year-level-list/{id}', 'YearLevelController@delete_year_level')->name('delete-year-level'); //delete

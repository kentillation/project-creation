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

//AUTH CONTROLLER
Route::get('/', 'AuthController@login')->name('index');
Route::post('/index', 'AuthController@loginPost')->name('login');
Route::get('/signup', 'AuthController@signup')->name('signup');
Route::post('/save-admin', 'AuthController@save_admin')->name('save-admin');
Route::delete('/logout', 'AuthController@logout')->name('logout');
Route::get('/dashboard', 'AuthController@dashboard')->name('dashboard');
Route::get('/admin-list', 'AuthController@admin_list')->name('admin-list');

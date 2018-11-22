<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Authentication Routes...
Route::get('patient.login', 'Auth\PatientLoginController@showLoginForm')->name('patient.login');
Route::post('patient.login', 'Auth\PatientLoginController@login')->name('patient.login.submit');

Route::get('doctor.login', 'Auth\DoctorLoginController@showLoginForm')->name('doctor.login');
Route::post('doctor.login', 'Auth\DoctorLoginController@login')->name('doctor.login.submit');

Route::get('admin.login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('admin.login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register.submit');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Entered Page
Route::get('patient/profile', 'PatientController@index')->name('patient.profile');
Route::get('doctor/profile', 'DoctorController@index')->name('doctor.profile');
Route::get('admin/dashboard', 'AdminController@index')->name('admin.dashboard');

// Main Pages
Route::get('/', 'PagesController@getIndex')->name('pages.index');
/*Route::get('/admin/search', 'CRUDController@index')->name('admin.search');
Route::resource('doctor', 'CRUDController');*/

Route::get('/admin/create', 'CRUDController@index')->name('admin.create');
Route::post('/admin/create', 'CRUDController@store')->name('admin.create.submit');

Route::get('admin/live_search', 'LiveSearchController@index')->name('live_search');
Route::get('admin/live_search/action', 'LiveSearchController@action')->name('live_search.action');

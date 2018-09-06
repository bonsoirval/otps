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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('alumni')->group(function() {
  /*
  <li> <a href="{{route('alumni.apply')}}">Apply</a></li>
  <li> <a href="{{route('alumni.my.application')}}">My Applications</a></li>
  <li> <a href="{{route('alumni.payments')}}">Payments</a></li>
  */
  Route::get('/apply', 'AlumniController@showApplyNow')->name('alumni.apply');
  Route::post('/apply', 'AlumniController@apply')->name('alumni.apply.submit');
  Route::get('/myApplications', 'AlumniController@showApplications')->name('alumni.my.applications');
  Route::get('/payments', 'AlumniController@showPayments')->name('alumni.payments');
  Route::post('/payment', 'AlumniController@paymentProcessor')->name('paymentProcessor');

  Route::get('/register', 'Auth\AlumniRegisterController@showRegisterForm')->name('alumni.register');
  Route::post('/register', 'Auth\AlumniRegisterController@register')->name('alumni.register.submit');

  Route::get('/login', 'Auth\AlumniLoginController@showLoginForm')->name('alumni.login');
  Route::post('/login', 'Auth\AlumniLoginController@login')->name('alumni.login.submit');
  Route::get('/', 'AlumniController@index')->name('alumni.dashboard');
  Route::get('/logout', 'Auth\AlumniLoginController@logout')->name('alumni.logout');

  // Password reset routes
  Route::post('/password/email', 'Auth\AlumniForgotPasswordController@sendResetLinkEmail')->name('alumni.password.email');
  Route::get('/password/reset', 'Auth\AlumniForgotPasswordController@showLinkRequestForm')->name('alumni.password.request');
  Route::post('/password/reset', 'Auth\AlumniResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AlumniResetPasswordController@showResetForm')->name('alumni.password.reset');
});

Route::prefix('admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

  // Password reset routes
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});

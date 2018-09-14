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
  Route::get('/printTranscript/{alumni_id}', 'AdminController@printTranscript')->name('printTranscript');
  Route::get('/printedTranscrips', 'AdminController@showPrintedTranscrips')->name('printedTranscrips');
  Route::get('/readyForPrint', 'AdminController@showReadyForPrint')->name('readyForPrint');


  Route::get('/transcript1First/{id}',"AdminController@transcript1First")->name('transcript1First');
  Route::post('/transcript1FirstSubmit', "AdminController@transcript1FirstSubmit")->name('transcript1FirstSubmit');
  Route::get('/transcript1Second/{alumni_id}', "AdminController@transcript1Second")->name('transcript1Second');
  Route::post('/transcript1SecondSubmit', 'AdminController@transcript1SecondSubmit')->name('transcript1SecondSubmit');

  Route::get('/transcript2First/{alumni_id}', "AdminController@transcript2First")->name('transcript2First');
  Route::post('/transcript2FirstSubmit', 'AdminController@transcript2FirstSubmit')->name('transcript2FirstSubmit');
  Route::get('/transcript2Second/{alumni_id}', "AdminController@transcript2Second")->name('transcript2Second');
  Route::post('/transcript2SecondSubmit', "AdminController@transcript2SecondSubmit")->name('transcript2SecondSubmit');

  Route::get('/transcript3First/{alumni_id}', "AdminController@transcript3First")->name('transcript3First');
  Route::post('/transcript3FirstSubmit', "AdminController@transcript3FirstSubmit")->name('transcript3FirstSubmit');

  Route::get('/transcript3Second/{alumni_id}', "AdminController@transcript3Second")->name('transcript3Second');
  Route::post('/transcript3SecondSubmit', "AdminController@transcript3SecondSubmit")->name('transcript3SecondSubmit');

  Route::get('/transcript4First/{alumni_id}', "AdminController@transcript4First")->name('transcript4First');
  Route::post('/transcript4FirstSubmit', "AdminController@transcript4FirstSubmit")->name('transcript4FirstSubmit');

  Route::get('/transcript4Second/{alumni_id}', "AdminController@transcript4Second")->name('transcript4Second');
  Route::post('/transcript4SecondSubmit', "AdminController@transcript4SecondSubmit")->name('transcript4SecondSubmit');

  Route::get('/checkCompilation', 'AdminController@checkCompilation')->name('checkCompilation');

  Route::get('/uploadTranscriptResult/{id}','AdminController@showUploadTranscriptResult')->name('uploadTranscriptResult');

  Route::get('/paymentReport', 'AdminController@paymentReport')->name('paymentReport');
  Route::get('/applicationReport', 'AdminController@applicationReport')->name('applicationReport');
  Route::get('/completeReport', 'AdminController@completeReport')->name('completeReport');

  Route::get('/payments', 'AdminController@showPayments')->name('adminShowPayments');
  Route::post('/payments', 'AdminController@payments')->name('adminPayments');

  Route::get('/applications', 'AdminController@applications')->name('adminApplications');
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

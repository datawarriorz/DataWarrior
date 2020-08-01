<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});
Auth::routes(['verify' => true]);

Route::get('/verifymail', function () {
    return view('auth.verify');
})->name('verifymail');



Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'HomeController@test')->name('test');

Route::get('/contact', 'NoAuthController@contact');
Route::post('/contactusreq', 'NoAuthController@contactusreq');

Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/dashboard', 'DashboardController@showDashboard')->middleware('auth');

Route::get('/viewprofile', 'ProfileController@viewProfile')->middleware('auth');

Route::get('/userdetails', 'ProfileController@userDetails')->middleware('auth');
Route::post('/userdetails', 'ProfileController@userDetails')->middleware('auth');
Route::post('/updateuserdetails', 'ProfileController@updateUser')->middleware('auth');

Route::get('/qualification', 'ProfileController@qualificationDetails')->middleware('auth');
Route::post('/qualification', 'ProfileController@qualificationDetails')->middleware('auth');
Route::post('/updateQualification', 'ProfileController@updateQualification')->middleware('auth');
Route::post('/deletequalification', 'ProfileController@deleteQualification')->middleware('auth');

Route::get('/jobexperience', 'ProfileController@jobExperience')->middleware('auth');
Route::post('/jobexperience', 'ProfileController@jobExperience')->middleware('auth');
Route::post('/updateJobexperience', 'ProfileController@updateJobexperience')->middleware('auth');
Route::post('/deleteJobexperience', 'ProfileController@deleteJobexperience')->middleware('auth');

Route::get('/skills', 'ProfileController@skills')->middleware('auth');
Route::post('/skills', 'ProfileController@skills')->middleware('auth');
Route::post('/updateskills', 'ProfileController@updateSkills')->middleware('auth');
Route::post('/deleteskills', 'ProfileController@deleteSkills')->middleware('auth');

Route::get('/internship', 'InternshipController@showinternship')->middleware('auth');
Route::post('/internshipform', 'InternshipController@applyInternship')->middleware('auth');
Route::get('/internshipfinal', 'InternshipController@showinternship')->middleware('auth');
Route::get('/internshipack', 'InternshipController@showack')->middleware('auth');
Route::post('/deleteInternship', 'InternshipController@deleteInternship')->middleware('auth');

Route::get('/job', 'JobController@showjob')->middleware('auth');
Route::post('/jobform', 'JobController@applyJob')->middleware('auth');
Route::get('/jobfinal', 'JobController@showjob')->middleware('auth');
Route::get('/joback', 'JobController@showack')->middleware('auth');
Route::post('/deleteJob', 'JobController@deleteJob')->middleware('auth');

Route::get('/certification', 'CertificationController@showallcertification')->middleware('auth');
Route::post('/applycertification', 'CertificationController@applycertification')->middleware('auth');
Route::post('/requestcertification', 'CertificationController@requestcertification')->middleware('auth');

Route::get('/expertlogin', 'Auth\ExpertLoginController@showLoginForm')->name('expert.login');
Route::post('/expertlogin', 'Auth\ExpertLoginController@login')->name('expert.login.submit');
Route::get('/expertdashboard', 'ExpertController@index')->name('expert.home');

Route::get('/expert-postarticle', 'ArticleController@viewarticleform');
Route::post('/expert-postarticle', 'ArticleController@postarticle');
Route::get('/expert-listarticles', 'ArticleController@viewexpertarticles');
Route::post('/expert-viewarticle', 'ArticleController@viewarticle');

Route::post('/logoutexpert', 'ExpertController@logoutexpert');
Route::get('/logoutexpert', 'ExpertController@logoutexpert');

Route::get('/adminlogin', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/adminlogin', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admindashboard', 'AdminController@index')->name('admin.home');


Route::post('/logoutadmin', 'AdminController@logoutadmin');
Route::get('/logoutadmin', 'AdminController@logoutadmin');

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
Route::get('/verifymail', function () {
    return view('auth.verify');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');


Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

Route::post('/profile', 'ProfileController@showProfile')->middleware('auth');
Route::get('/profile', 'ProfileController@showProfile')->middleware('auth');
Route::post('/updateUser', 'ProfileController@updateUser')->middleware('auth');


Route::get('/qualification', 'ProfileController@qualificationDetails')->middleware('auth');
Route::post('/updateQualification', 'ProfileController@updateQualification')->middleware('auth');
Route::post('/deletequalification', 'ProfileController@deleteQualification')->middleware('auth');

Route::get('/jobexperience', 'ProfileController@jobExperience')->middleware('auth');
Route::post('/updateJobexperience', 'ProfileController@updateJobexperience')->middleware('auth');
Route::post('/deleteJobexperience', 'ProfileController@deleteJobexperience')->middleware('auth');

Route::get('/skills', 'ProfileController@skills')->middleware('auth');
Route::post('/updateskills', 'ProfileController@updateSkills')->middleware('auth');
Route::post('/deleteskills', 'ProfileController@deleteSkills')->middleware('auth');

Route::get('/internship', 'Internship@showintership')->middleware('auth');
Route::post('/internshipform', 'Internship@applyInternship')->middleware('auth');
Route::post('/internshipskills', 'Internship@internshipSkills')->middleware('auth');
Route::post('/internshipexp', 'Internship@v')->middleware('auth');





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

Route::get('/', 'HomeController@index')->name('welcome');

Auth::routes();

// Students Route
Route::get('/student', 'StudentController@dashboard')->name('student')->middleware(['auth', 'student']);
Route::get('/student/myteachers', 'StudentController@myteachers')->name('myteachers')->middleware(['auth', 'student']);
Route::get('/student/mypayments', 'StudentController@mypayments')->name('mypayments')->middleware(['auth', 'student']);
Route::get('/student/mysubjects', 'StudentController@mysubjects')->name('mysub')->middleware(['auth', 'student']);
Route::get('/student/subject/{id}', 'StudentController@showsubject')->name('showsub')->middleware(['auth', 'student']);
Route::get('/student/topic/{id}', 'StudentController@showtopic')->name('showtop')->middleware(['auth', 'student']);


// Teachers Route
Route::get('/teacher', 'TeacherController@dashboard')->name('teacher')->middleware(['auth', 'teacher']);
Route::get('/teacher/mystudents', 'TeacherController@mystudents')->name('mystudents')->middleware(['auth', 'teacher']);
Route::get('/teacher/mysubjects', 'TeacherController@mysubjects')->name('mysubjects')->middleware(['auth', 'teacher']);
Route::get('/teacher/subject/{id}', 'TeacherController@showsubject')->name('showsubject')->middleware(['auth', 'teacher']);
Route::get('/teacher/topic/{id}', 'TeacherController@showtopic')->name('showtopic')->middleware(['auth', 'teacher']);

Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/home', 'AdminController@index')->name('admin.dashboard');
	Route::get('/payments', 'AdminController@payments')->name('admin.payments');
	Route::get('/students', 'AdminController@students')->name('admin.students');
	Route::get('/teachers', 'AdminController@teachers')->name('admin.teachers');
	Route::get('/subjects', 'AdminController@subjects')->name('admin.subjects');
	Route::post('addsubject', 'AdminController@createsubject')->name('addsubject');
	Route::post('editsubject','AdminController@updatesubject')->name('updatesubject');
	Route::delete('/deletesubject/{id}/destroy/', 'AdminController@deletesubject')->name('deletesubject');
	Route::get('/topics', 'AdminController@topics')->name('admin.topics');
	Route::post('addtopic', 'AdminController@createtopic')->name('addtopic');
	Route::post('edittopic','AdminController@updatetopic')->name('updatetopic');
	Route::delete('/deletetopic/{id}/destroy/', 'AdminController@deletetopic')->name('deletetopic');
	Route::get('/resources', 'AdminController@resources')->name('admin.resources');
	Route::post('addresource', 'AdminController@createresource')->name('addresource');
	Route::post('editresource','AdminController@updateresource')->name('updateresource');
	Route::delete('/deleteresource/{id}/destroy/', 'AdminController@deleteresource')->name('deleteresource');
	

	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');


	// Password Reset Routes

	Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
	Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});
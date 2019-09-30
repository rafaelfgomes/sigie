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

Route::get('/', 'Auth\LoginController@showLoginForm')->name('index');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::group(['prefix' => 'institutions'], function () {

    Route::get('/', 'InstitutionController@index')->name('institutions');
    Route::post('/', 'InstitutionController@store')->name('institution.save');
    Route::get('info/{id}', 'InstitutionController@getInfo')->name('institution.data');
    Route::post('update/{id}', 'InstitutionController@update')->name('institution.update');
    Route::get('toggle/{id}', 'InstitutionController@toggleStatus')->name('institution.status');

});

Route::group(['prefix' => 'courses'], function () {
    
    Route::get('/', 'CourseController@index')->name('courses');
    Route::post('/', 'CourseController@store')->name('course.save');
    Route::get('info/{id}', 'CourseController@getInfo')->name('course.data');
    Route::post('update/{id}', 'CourseController@update')->name('course.update');
    Route::get('toggle/{id}', 'CourseController@toggleStatus')->name('course.status');

});

Route::group(['prefix' => 'students'], function () {
    
    Route::get('/', 'StudentController@index')->name('students');
    Route::post('/', 'StudentController@store')->name('student.save');
    Route::get('info/{id}', 'StudentController@getInfo')->name('student.data');
    Route::post('update/{id}', 'StudentController@update')->name('student.update');
    Route::get('toggle/{id}', 'StudentController@toggleStatus')->name('student.status');

});

Route::group(['prefix' => 'enrolments'], function () {
    Route::get('/', 'EnrolmentController@index')->name('enrolments');
});

Route::group(['prefix' => 'associations'], function () {
    Route::get('/', 'AssociationsController@index')->name('associations');
});

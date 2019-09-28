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
    Route::post('/', 'CourseController@store')->name('courses.save');
    Route::get('info/{id}', 'CourseController@getInfo')->name('courses.data');
    Route::post('update/{id}', 'CourseController@update')->name('courses.update');
    Route::get('toggle/{id}', 'CourseController@toggleStatus')->name('courses.status');

});

Route::group(['prefix' => 'students'], function () {
    
    Route::get('/', 'StudentController@index')->name('students');
    Route::post('/', 'StudentController@store')->name('students.save');
    Route::get('info/{id}', 'StudentController@getInfo')->name('students.data');
    Route::post('update/{id}', 'StudentController@update')->name('students.update');
    Route::get('toggle/{id}', 'StudentController@delete')->name('students.status');

});

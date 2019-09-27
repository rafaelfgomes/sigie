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
    Route::post('/', 'InstitutionController@store')->name('institutions.save');
    
});



Route::get('/courses', 'CourseController@index')->name('courses');
Route::get('/students', 'StudentController@index')->name('students');

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
    Route::post('{id}', 'InstitutionController@show')->name('institutions.show');

});

Route::group(['prefix' => 'courses'], function () {
    
    Route::get('/', 'CourseController@index')->name('institutions');
    Route::post('/', 'CourseController@store')->name('institutions.save');
    Route::post('{id}', 'CourseController@show')->name('institutions.show');

});

Route::group(['prefix' => 'students'], function () {
    
    Route::get('/', 'StudentController@index')->name('institutions');
    Route::post('/', 'StudentController@store')->name('institutions.save');
    Route::post('{id}', 'StudentController@show')->name('institutions.show');

});

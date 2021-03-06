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

//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Routes added to be accessed only with authenticated users
Route::group( ['middleware' => 'auth' ], function()
{
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('companies','Company\CompanyController');
    Route::resource('employees','Employee\EmployeeController');
});
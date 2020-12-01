<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth:web')->name('home');

Route::get('/admin/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login.index');
Route::post('/admin/login', 'AuthAdmin\LoginController@postLogin')->name('admin.login');
Route::prefix('/admin')->name('admin.')->middleware('auth:admin')->group(function(){
    Route::get('/logout', 'AuthAdmin\LoginController@postLogout')->name('logout');

    Route::get('/home', 'Admin\HomeController@index')->name('home');
    Route::get('/user', 'Admin\UserController@index')->name('user');
    Route::get('data', 'Admin\UserController@loadData')->name('user.data');
    Route::get('user/create', 'Admin\UserController@create')->name('user.create');
    Route::post('user/create', 'Admin\UserController@store')->name('user.store');
    Route::get('user/edit/{id}', 'Admin\UserController@edit')->name('user.edit');
    Route::post('user/edit/{id}', 'Admin\UserController@update')->name('user.update');
});

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

Route::get('/home', 'HomeController@index')->name('home');


// GOM NHÓM CHO QUẢN TRỊ VIÊN

Route::prefix('admin')->group(function (){
    //trả về view dashboard
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');

    //view đăng ký
    Route::get('register', 'AdminController@create')->name('admin.register');
    //xử lý thông tin đăng kí
    Route::post('register','AdminController@store')->name('admin.register.store');

    //view đăng nhập admin
    Route::get('login', 'Auth\Admin\LoginController@login')->name('admin.auth.login');
    //xử lý thông tin đăng nhập
    Route::post('login', 'Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');

    //đăng xuất
    Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');



});
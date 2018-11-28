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
    return redirect('/home');
});

Auth::routes(['verify'=>true]);

Route::get('/logout', 'Auth\LoginController@logout')->name('user.logout');

Route::get('/home', 'HomeController@index')->name('home');
//관리자

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect('admin/home');
    });
    Route::get('/register', [ 'as' => 'register', 'uses' => 'Auth\AdminRegisterController@showRegistrationForm'])->name('admin.register');
    Route::post('/register', [ 'as' => '', 'uses' => 'Auth\AdminRegisterController@register'])->name('admin.register');

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    Route::get('/system/', 'Operator\System\SystemController@index');
    Route::get('/resetPassword/{id}', 'Operator\System\SystemController@resetPassword');
    Route::post('/system/reset', 'Operator\System\SystemController@reset');
});
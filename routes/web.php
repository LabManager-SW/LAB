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
    /** 연구원 Auth **/
    Route::get('/register', [ 'as' => 'register', 'uses' => 'Auth\AdminRegisterController@showRegistrationForm'])->name('admin.register');
    Route::post('/register', [ 'as' => '', 'uses' => 'Auth\AdminRegisterController@register'])->name('admin.register');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    /** 시스템 운영자용 **/
    Route::get('/system/', 'Operator\System\SystemController@index');
    Route::get('/resetPassword/{id}', 'Operator\System\SystemController@resetPassword');
    Route::post('/system/reset', 'Operator\System\SystemController@reset');

    /** 연구원 실험 공고 관리용 **/
    Route::get('/experiment_details/', 'Admin\Experiment_Details\Experiment_DetailsController@index');
    Route::get('/experiment_details/create', 'Admin\Experiment_Details\Experiment_DetailsController@create');
    Route::get('/experiment_details/{id}/edit', 'Admin\Experiment_Details\Experiment_DetailsController@edit');
    Route::put('/experiment_details/{id}/update', 'Admin\Experiment_Details\Experiment_DetailsController@update')->name('admin.experiment_details.update');
    Route::delete('/experiment_details/{id}', 'Admin\Experiment_Details\Experiment_DetailsController@delete')->name('admin.experiment_details.delete');
    Route::post('/experiment_details/store/', 'Admin\Experiment_Details\Experiment_DetailsController@store')->name('admin.experiment_details.store');;

    /** 연구원 실험 결과 관리용 **/
    Route::get('/result/', 'Admin\Experiment_Result\Experiment_ResultController@index');
    Route::get('/result/create', 'Admin\Experiment_Result\Experiment_ResultController@create');
    Route::get('/result/{id}/edit', 'Admin\Experiment_Result\Experiment_ResultController@edit');
    Route::put('/result/{id}/update', 'Admin\Experiment_Result\Experiment_ResultController@update')->name('admin.result.update');
    Route::delete('/result/{id}', 'Admin\Experiment_Result\Experiment_ResultController@delete')->name('admin.result.delete');
    Route::post('/result/store/', 'Admin\Experiment_Result\Experiment_ResultController@store')->name('admin.result.store');;
    Route::get('/result/download/{id}', 'Admin\Experiment_Result\Experiment_ResultController@download');

});
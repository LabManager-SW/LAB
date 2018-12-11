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

Auth::routes(['verify' => true]);
Route::Post('/login', 'Auth\LoginController@login')->name('user.login');
Route::group(['middleware' => ['auth']], function () {

    Route::get('/logout', 'Auth\LoginController@logout')->name('user.logout');

    Route::get('/home', 'HomeController@index')->name('home');

    /****유저 홈페이지****/
    Route::get('/user_home', 'User\UserHomeController@index')->name('user_home');
    Route::get('/user_home/all', 'User\UserHomeController@show_all')->name('user_home.all');
    Route::get('/user_home/{id}', 'User\UserHomeController@show');
    Route::get('/apply/{exp_id}/{id}', 'User\UserHomeController@apply')->name('user.apply');

    /****유저 마이페이지****/
    Route::get('/user_mypage/', 'User\UserMyPageController@index')->name('user.mypage');
    Route::get('/user_mypage/{id}', 'User\UserMyPageController@show');
    Route::delete('/user_mypage/delete/{id}', 'User\UserMyPageController@delete')->name('user_mypage.delete');
});

/********************************관리자******************************/
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect('admin/home');
    });
    Route::get('/home', 'Admin\Experiment\ExperimentController@index')->name('admin_home');
    /** 연구원 Auth **/
    Route::get('/register', ['as' => 'register', 'uses' => 'Auth\AdminRegisterController@showRegistrationForm'])->name('admin.register');
    Route::post('/register', ['as' => '', 'uses' => 'Auth\AdminRegisterController@register'])->name('admin.register');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    /** 시스템 운영자용 **/
    Route::get('/system/', 'Operator\System\SystemController@index');
    Route::get('/resetPassword/{id}', 'Operator\System\SystemController@resetPassword');
    Route::post('/system/reset', 'Operator\System\SystemController@reset');

    /** 연구원 실험 공고 관리용 **/
    Route::get('/experiment/', 'Admin\Experiment\ExperimentController@index');
    Route::get('/experiment/create', 'Admin\Experiment\ExperimentController@create')->name('admin.experiment.create');
    Route::get('/experiment/{id}/edit', 'Admin\Experiment\ExperimentController@edit');
    Route::put('/experiment/{id}/update', 'Admin\Experiment\ExperimentController@update')->name('admin.experiment.update');
    Route::delete('/experiment/{id}', 'Admin\Experiment\ExperimentController@delete')->name('admin.experiment.delete');
    Route::post('/experiment/store/', 'Admin\Experiment\ExperimentController@store')->name('admin.experiment.store');;

    Route::get('/experiment_details/', 'Admin\Experiment\Experiment_DetailsController@index');
    Route::get('/experiment_details/create', 'Admin\Experiment\Experiment_DetailsController@create')->name('admin.experiment_details.create');
    Route::get('/experiment_details/{id}/edit', 'Admin\Experiment\Experiment_DetailsController@edit');
    Route::put('/experiment_details/{id}/update', 'Admin\Experiment\Experiment_DetailsController@update')->name('admin.experiment_details.update');
    Route::delete('/experiment_details/{id}', 'Admin\Experiment\Experiment_DetailsController@delete')->name('admin.experiment_details.delete');
    Route::post('/experiment_details/store/', 'Admin\Experiment\Experiment_DetailsController@store')->name('admin.experiment_details.store');;


    /** 연구원 실험 결과 관리용 **/
    Route::get('/result/', 'Admin\Experiment_Result\Experiment_ResultController@index');
    Route::get('/result/create', 'Admin\Experiment_Result\Experiment_ResultController@create');
    Route::get('/result/{id}/edit', 'Admin\Experiment_Result\Experiment_ResultController@edit');
    Route::put('/result/{id}/update', 'Admin\Experiment_Result\Experiment_ResultController@update')->name('admin.result.update');
    Route::delete('/result/{id}', 'Admin\Experiment_Result\Experiment_ResultController@delete')->name('admin.result.delete');
    Route::post('/result/store/', 'Admin\Experiment_Result\Experiment_ResultController@store')->name('admin.result.store');;
    Route::get('/result/download/{id}', 'Admin\Experiment_Result\Experiment_ResultController@download');

});
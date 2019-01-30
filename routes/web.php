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
    return view('shared.index');
});

/**this two routes below is generated when we make Auth */
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
/** end */

Route::group(['middleware' => ['auth' => 'role:admin']], function(){
    Route::resource('admin', 'AdminController');
    Route::get('/admin-dashboard', 'AdminController@index');
    // Route::get('/file/download/{$path}', 'AdminController@download')->name('downloadfile');
    Route::resource('download','FileDownloadController');
    // Route::get('/download/{$id}','AdminController@download')->name('download');
});

Route::group(['middleware' => ['auth' => 'role:user']], function(){
    Route::get('/user','HomeController@index')->name('user.index');
    Route::post('/profile-store', 'HomeController@store')->name('profile.store');
    Route::get('/create-profiles','HomeController@create')->name('create-profiles');

    Route::resource('userdash','UserDashController');
    Route::resource('edu-backgrounds','EduBackgroundsController');
    Route::resource('work-experiences','WorkExperiencesController');
});

// Route::group(['middleware' => ['auth', 'role:manager,employee']], function(){
//     Route::resource('articles','ArticlesController');
// });
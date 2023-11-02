<?php

use Illuminate\Support\Facades\Route;



//rutas de la administracion
Route::group(['middleware' => 'can:accessAdminpanel'], function() {

    Route::name('admin.index')->get('/admin/index', 'Admin\AdminController@index')->middleware('auth');
    Route::name('admin.start')->get('/admin/start','Admin\AdminController@start');

    Route::name('mysettings.index')->get('/admin/mysettings/index','Admin\MySettingController@index');

    Route::name('admin.config.env')->get('/admin/config/env','Admin\EnvConfigController@index');
    Route::name('admin.config.env.update')->post('/admin/config/env/update','Admin\EnvConfigController@update');
    //Route::name('admin.config.email.test')->post('/admin/config/email/test','Email\EmailController@test');

    // storeconfig
    Route::name('admin.store.config')->get('/admin/store/config','Admin\StoreConfigController@index');
    Route::name('admin.store.edit')->post('/admin/store/config/edit','Admin\StoreConfigController@edit');
    Route::name('admin.store.config.logo')->get('/admin/store/config/logo','Admin\StoreConfigController@logo')->middleware('auth');

    Route::name('admin.store.config.update')->put('/admin/store/config/{id}/update','Admin\StoreConfigController@update');


    //users
    Route::name('admin.users')->get('/admin/users/','Admin\UserController@index')->middleware('auth');
    Route::name('admin.users.create')->get('/admin/users/create','Admin\UserController@create')->middleware('auth');
    Route::name('admin.users.store')->post('/admin/users/store','Admin\UserController@store')->middleware('auth');
    Route::name('admin.users.edit')->get('/admin/users/{id}/edit','Admin\UserController@edit')->middleware('auth');
    Route::name('admin.users.update')->put('/admin/users/{id}/update','Admin\UserController@update')->middleware('auth');

    //category
    Route::name('admin.categories.index')->get('/admin/categories/index','Admin\CategoryController@index');
    Route::name('admin.categories.create')->get('/admin/categories/create','Admin\CategoryController@create');
    Route::name('admin.categories.store')->post('/admin/categories/store','Admin\CategoryController@store');
    Route::name('admin.categories.edit')->get('/admin/categories/{id}/edit','Admin\CategoryController@edit');
    Route::name('admin.categories.update')->put('/admin/categories/{id}/update','Admin\CategoryController@update');
    Route::name('admin.categories.destroy')->get('/admin/categories/{id}/destroy','Admin\CategoryController@destroy');

    //course
    Route::name('admin.courses.index')->get('/admin/courses','Admin\CourseController@index');
    Route::name('admin.courses.create')->get('/admin/courses/create','Admin\CourseController@create');
    Route::name('admin.courses.store')->post('/admin/courses/store','Admin\CourseController@store');
    Route::name('admin.courses.show')->get('/admin/courses/{id}/show','Admin\CourseController@show');
    Route::name('admin.courses.edit')->get('/admin/courses/{id}/edit','Admin\CourseController@edit');
    Route::name('admin.courses.update')->put('/admin/courses/{id}/update','Admin\CourseController@update');
    Route::name('admin.courses.destroy')->get('/admin/courses/{id}/destroy','Admin\CourseController@destroy');
    Route::name('admin.courses.certification')->get('/admin/courses/{id}/certification','Admin\CourseController@certification');
    Route::name('admin.courses.destroy.image')->get('/admin/courses/{id}/destroy/{section}','Admin\CourseController@destroyImage');

});

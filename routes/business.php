<?php

use Illuminate\Support\Facades\Route;

//rutas de la administracion
Route::group(['middleware' => 'can:accessBusinesspanel'], function() {

    Route::name('businesses.index')->get('/supervisor/index', 'Business\DashboardController@index')->middleware('auth');

    Route::name('businesses.configuration')->get('/supervisor/configuration', 'Business\BusinessController@configuration')->middleware('auth');
    Route::name('businesses.images')->post('/supervisor/imagenes', 'Business\BusinessController@images')->middleware('auth');

    Route::name('businesses.users')->get('/supervisor/usuarios/index', 'Business\UserController@index')->middleware('auth');
    Route::name('businesses.users.show')->get('/supervisor/usuarios/ver', 'Business\UserController@show')->middleware('auth');
    Route::name('businesses.users.create')->get('/supervisor/usuarios/crear', 'Business\UserController@create')->middleware('auth');
    Route::name('businesses.users.store')->post('/supervisor/usuarios/store','Business\UserController@store')->middleware('auth');
    Route::name('businesses.users.invite')->get('/supervisor/usuarios/invitar', 'Business\UserController@invite')->middleware('auth');
    Route::name('businesses.users.import')->get('/supervisor/usuarios/importar', 'Business\UserController@import')->middleware('auth');
    Route::name('businesses.users.import.upload')->post('/supervisor/usuarios/importar/upload', 'Business\UserController@upload')->middleware('auth');
    Route::name('businesses.users.download')->get('/supervisor/usuarios/download', 'Business\UserController@download')->middleware('auth');

    //course
    Route::name('businesses.courses.index')->get('/businesses/courses','Business\CourseController@index');
});

<?php

use Illuminate\Support\Facades\Route;

//rutas de la administracion
Route::group(['middleware' => 'can:accessMemberpanel'], function() {

    Route::name('members.index')->get('/campus/index', 'Member\DashboardController@index')->middleware('auth:sanctum');
    Route::name('members.mycourses')->get('/campus/cursos', 'Member\CourseController@index')->middleware('auth:sanctum');
    Route::name('members.profile')->get('/campus/perfil', 'Member\DashboardController@profile')->middleware('auth:sanctum');
    Route::name('members.profilepw')->get('/campus/perfil/pw', 'Member\DashboardController@profilepw')->middleware('auth:sanctum');
    Route::name('members.update.my.avatar')->post('/members/update/my/avatar','Member\DashboardController@updateMyAvatar')->middleware('auth');

    //cursos
    Route::name('members.courses.show')->get('/campus/curso/{id}/contenido', 'Member\CourseController@content')->middleware('auth:sanctum');
    // Route::name('members.courses.certification')->get('/campus/curso/{id}/certificacion', 'Member\CertificationController@index')->middleware('auth:sanctum');
    // Route::name('members.courses.evaluate')->post('/campus/curso/certificacion/evaluar', 'Member\CertificationController@evaluate')->middleware('auth:sanctum');
    // Route::name('members.courses.result')->get('/campus/curso/certificacion/resultado/{uuid}', 'Member\CertificationController@result')->middleware('auth:sanctum');
    // Route::name('members.pdf.certification')->get('/campus/pdf/certification/{uuid}', 'Member\CertificationController@certification')->middleware('auth:sanctum');

    Route::name('members.course.detail')->get('/campus/curso/{id}/{slug}','Member\CourseController@detail')->middleware('auth:sanctum');


});

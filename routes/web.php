<?php
use Spatie\Sitemap\SitemapGenerator;

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

Route::get('/', 'HomeController@index');

Auth::routes();
Route::get('auth/activate', 'Auth\ActivationController@activate')->name('auth.activate');
Route::get('auth/activate/resend', 'Auth\ActivationResendController@showResendForm')->name('auth.activate.resend');
Route::post('auth/activate/resend', 'Auth\ActivationResendController@resend');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/series', 'HomeController@series')->name('series');
Route::get('/series/{id}', 'HomeController@serieDetail')->name('series.detail');
Route::get('/series/subject/{slug}', 'HomeController@seriesBySubject')->name('series.subject');
Route::get('/series/software/{slug}', 'HomeController@seriesBySoftware')->name('series.software');
Route::get('/series/{id}/episode/{ep}', 'HomeController@serieDetailShow')->name('series.detail.show');
Route::get('/about', 'HomeController@about')->name('idstack.about');

Route::get('/search', 'HomeController@search')->name('series.search');


Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'HomeController@admin')->name('admin');
        Route::resource('subject', 'SubjectController', ['names' => 'admin.subject']);
        Route::resource('software', 'SoftwareController', ['names' => 'admin.software']);
        Route::resource('level', 'LevelController', ['names' => 'admin.level']);
        Route::resource('course', 'CourseController', ['names' => 'admin.course']);
        Route::get('course/{id}/detail', 'CourseController@detail')->name('admin.course.lesson');
        Route::resource('course/detail', 'CourseDetailController', ['names' => 'admin.course.detail']);
        Route::resource('user', 'UserController', ['names' => 'admin.user']);
    });

    Route::group(['prefix' => 'data'], function () {
        Route::get('subject', 'SubjectController@subjectData')->name('data.subject');
        Route::get('software', 'SoftwareController@softwareData')->name('data.software');
        Route::get('level', 'LevelController@levelData')->name('data.level');
        Route::get('course', 'CourseController@courseData')->name('data.course');
        Route::get('course/{id}/detail', 'CourseController@courseDetailData')->name('data.course.detail');
        Route::get('user', 'UserController@userData')->name('data.user');
    });

    Route::get('sitemap', function() {
        $path = public_path('/sitemap.xml');
        SitemapGenerator::create('http://idstack.net')->writeToFile($path);
        return redirect()->route('admin');
    });
});

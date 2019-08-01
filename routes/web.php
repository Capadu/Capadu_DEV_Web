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


//Start Static Pages

    Route::get('/', 'PagesController@landing');
    Route::get('/main', 'PagesController@main');

//End Static Pages


//Start Authentication Pages

    Route::post('/login', 'Authentication@login')->middleware('visitation');
    Route::post('/logout', 'Authentication@logout')->middleware('authentication');
    Route::post('/register', 'Registration@register')->middleware('visitation');

//End Authentication Pages


//Start Teacher Pages

    Route::group(['middleware' => 'authentication'], function () {

        Route::get('/dashboard', 'PagesController@dashboard');

        Route::get('/page_settings', 'PagesMasterController@index');
        Route::post('/page_settings/edit/{id}', 'PagesMasterController@edit');

        Route::get('/page_manager', 'PagesManagerController@index');
        Route::get('/page_manager/create', 'PagesManagerController@create');
        Route::get('/page_manager/read/{id}', 'PagesManagerController@read');
        Route::post('/page_manager/add', 'PagesManagerController@add');
        Route::post('/page_manager/edit/{id}', 'PagesManagerController@edit');
        Route::post('/page_manager/delete/{id}', 'PagesManagerController@delete');

    });

//End Teacher Pages
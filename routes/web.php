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

    });

//End Teacher Pages
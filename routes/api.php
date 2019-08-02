<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* CapaPP Connections */

//validator

Route::get('validator/{token}', 'AppComunicator@app_validate');

//recivecapadus

Route::post('recivecapadus/{token}', 'AppComunicator@app_recivecapadus');

//sendcapadus

Route::get('sendcapadus/{token}', 'AppComunicator@app_sendcapadus');

<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'SetupController@start');
Route::get('setup/shared', 'SetupController@shared');
Route::get('setup/external', 'SetupController@external');

Route::get('test/start/{type}', 'TestController@start');
Route::post('test/start/{type}', 'TestController@start');
Route::get('test/shared/{type}', 'TestController@shared');
Route::post('test/shared/{type}', 'TestController@shared');
Route::get('test/external/{type}', 'TestController@external');
Route::post('test/external/{type}', 'TestController@external');

Route::get('results', 'TestController@results');

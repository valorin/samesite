<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', 'SetupController@start');
$router->get('setup/shared', 'SetupController@shared');
$router->get('setup/external', 'SetupController@external');

$router->get('test/start/{type}', 'TestController@start');
$router->post('test/start/{type}', 'TestController@start');
$router->get('test/shared/{type}', 'TestController@shared');
$router->post('test/shared/{type}', 'TestController@shared');
$router->get('test/external/{type}', 'TestController@external');
$router->post('test/external/{type}', 'TestController@external');

$router->get('results', 'TestController@results');

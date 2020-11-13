<?php

/** @var Router $router */

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

use Laravel\Lumen\Routing\Router;

$router->get('/usersApp', 'UsersAppController@index');
$router->post('/usersApp', 'UsersAppController@store');
$router->get('/usersApp/{username}', 'UsersAppController@show');
$router->put('/usersApp/{username}', 'UsersAppController@update');
$router->patch('/usersApp/{username}', 'UsersAppController@update');
$router->delete('/usersApp/{username}', 'UsersAppController@destroy');

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

/*
 * Owner Controller
 */
$router->get('/owners', 'OwnerController@index');
$router->post('/owners', 'OwnerController@store');
$router->get('/owners/{owner}', 'OwnerController@show');
$router->put('/owners/{owner}', 'OwnerController@update');
$router->patch('/owners/{owner}', 'OwnerController@update');
$router->delete('/owners/{owner}', 'OwnerController@destroy');
/*
 * Users App Controller
 */
$router->get('/usersApp', 'UsersAppController@index');
$router->post('/usersApp', 'UsersAppController@store');
$router->get('/usersApp/{username}', 'UsersAppController@show');
$router->put('/usersApp/{username}', 'UsersAppController@update');
$router->patch('/usersApp/{username}', 'UsersAppController@update');
$router->delete('/usersApp/{username}', 'UsersAppController@destroy');

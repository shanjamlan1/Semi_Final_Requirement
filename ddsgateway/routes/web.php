<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['middleware' => 'client.credentials'], function() use ($router) {
    //routes for site1
    $router->get('/users1','User1Controller@index'); //get all users from site 1
    $router->post('/users1', 'User1Controller@addUser'); //create new user from site 1
    $router->get('/users1/{id}', 'User1Controller@showUser'); //get user using a specific user id from site 1
    $router->put('/users1/{id}', 'User1Controller@updateUser'); //update users using a specific user id from site 1
    $router->delete('/users1/{id}', 'User1Controller@deleteUser'); //delete users using a specific user id from site 1

    //routes for site2
    $router->get('/users2','User2Controller@index'); //get all users from site 2
    $router->post('/users2', 'User2Controller@addUser'); //create new user from site 2
    $router->get('/users2/{id}', 'User2Controller@showUser'); //get user using a specific user id from site 2
    $router->put('/users2/{id}', 'User2Controller@updateUser'); //update users using a specific user id from site 2
    $router->delete('/users2/{id}', 'User2Controller@deleteUser'); //delete users using a specific user id from site 2
});

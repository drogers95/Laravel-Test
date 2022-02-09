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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('orders',  ['uses' => 'OrderController@showAllOrders']);
    $router->get('orders/{uuid}', ['uses' => 'OrderController@showOneOrder']);

    $router->post('orders', ['uses' => 'OrderController@create']);

    $router->delete('orders/{uuid}', ['uses' => 'OrderController@delete']);

    $router->put('orders/{uuid}', ['uses' => 'OrderController@update']);
});

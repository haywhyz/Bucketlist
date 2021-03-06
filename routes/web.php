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

$router->group(['prefix'=>'api/v1'], function() use($router){

    $router->get('/bucketlists', 'BucketlistController@index');
    $router->post('/bucketlists', 'BucketlistController@create');
    $router->get('/bucketlists/{id}', 'BucketlistController@show');
    $router->put('/bucketlists/{id}', 'BucketlistController@update');
    $router->delete('/bucketlists/{id}', 'BucketlistController@destroy');
    // $router->post('/bucketlists/{id}item', 'BucketlistController@itemCreate');
    $router->get('/bucketlists/{bucket}item', 'BucketlistController@itemList');


});

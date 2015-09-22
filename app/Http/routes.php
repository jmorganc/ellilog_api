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


$app->get('/', function () use ($app) {
    return $app->welcome();
});


$app->group(['prefix' => 'api/v0'], function($app) {
    $app->get('/', function () use ($app) {
        return $app->welcome();
    });
});


// $app->group(['prefix' => 'api/v0/users', 'namespace' => 'App\Http\Controllers'], function($app) {
$app->group(['prefix' => 'api/v0/users'], function($app) {
    // $app->get('/', 'UserController@index');
    $app->get('/', function() use($app) {
        $controller = $app->make('App\Http\Controllers\UserController');
        return $controller->index();
    });
    // $users = app('users')->select('SELECT * FROM users');
    // $users = app('users')->paginate(2);
    // $users = DB::table('users')->paginate(2);
    // $users = DB::table('users')->query('SELECT * FROM users');
    // echo '<pre>';print_r($users);exit();

    // $users = array_map(function($user)
    // {
    //     return [
    //         'first_name' => $user->{'first_name'},
    //         'last_name' => $user->{'last_name'},
    //         'email' => $user->{'email'},
    //         'active' => (boolean) $user->{'active'}
    //     ];
    // }, $users);

    // return response()->json(['data' => $users], '200');
});


$app->group(['prefix' => 'api/v0/babies'], function($app) {
    $app->get('/', function() use($app) {
        $controller = $app->make('App\Http\Controllers\BabyController');
        return $controller->index();
    });
});


$app->group(['prefix' => 'api/v0/things'], function($app) {
    $app->get('/', function() use($app) {
        $controller = $app->make('App\Http\Controllers\ThingController');
        return $controller->index();
    });
});


$app->group(['prefix' => 'api/v0/logs'], function($app) {
    $app->get('/', function() use($app) {
        $controller = $app->make('App\Http\Controllers\LogController');
        return $controller->index();
    });


    $app->post('/', function() use($app) {
        $controller = $app->make('App\Http\Controllers\LogController');
        return $controller->save();
    });
});

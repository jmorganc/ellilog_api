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

use Illuminate\Http\Response;

$app->group(['prefix' => 'api/v0'], function($app) {
    $app->get('/', function () use ($app) {
        return $app->welcome();
    });

    $app->get('/users', function () use ($app) {
        $users = app('db')->select('SELECT * FROM users');

        $users = array_map(function($user)
        {
            return [
                'first_name' => $user->{'first_name'},
                'last_name' => $user->{'last_name'},
                'email' => $user->{'email'},
                'active' => (boolean) $user->{'active'}
            ];
        }, $users);

        return response()->json(['data' => $users], '200');
    });
});

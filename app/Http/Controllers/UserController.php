<?php

namespace App\Http\Controllers;

use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        $users = array_map(function($user)
        {
            return [
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'email' => $user['email'],
                'active' => (boolean) $user['active']
            ];
        }, $users->toArray());

        return response()->json(['data' => $users], '200');
    }
}

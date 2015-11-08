<?php

namespace App\Http\Controllers;

use App\Models\User;
use DB;


class UserController extends Controller
{
    public function index()
    {
        $filters = app('request')->input();
        // $users = User::all();
        $users = DB::select('SELECT * FROM users WHERE active = :active', ['active' => (boolean) $filters['active']]);
        // $users = User::paginate(2);

        $users = array_map(function($user)
        {
            return [
                'id' => (int) $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'active' => (boolean) $user->active
            ];
        }, $users);

        return response()->json(['data' => $users], '200');
    }
}

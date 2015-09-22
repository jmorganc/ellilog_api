<?php

namespace App\Http\Controllers;

use App\Models\Thing;
use DB;


class ThingController extends Controller
{
    public function index()
    {
        $filters = app('request')->input();
        $things = DB::select('SELECT * FROM things WHERE active = :active', ['active' => (boolean) $filters['active']]);

        $things = array_map(function($thing)
        {
            return [
                'thing' => $thing->thing
            ];
        }, $things);

        return response()->json(['data' => $things], '200');
    }
}

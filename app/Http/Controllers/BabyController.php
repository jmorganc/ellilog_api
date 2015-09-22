<?php

namespace App\Http\Controllers;

use App\Models\Baby;
use DB;


class BabyController extends Controller
{
    public function index()
    {
        $filters = app('request')->input();
        $babies = DB::select('SELECT * FROM babies WHERE active = :active AND id = :id', [
            'active' => (boolean) $filters['active'],
            'id' => (int) $filters['id']
        ]);

        $babies = array_map(function($baby)
        {
            return [
                'id' => (int) $baby->id,
                'first_name' => $baby->first_name,
                'last_name' => $baby->last_name,
                'active' => (boolean) $baby->active
            ];
        }, $babies);

        return response()->json(['data' => $babies], '200');
    }
}

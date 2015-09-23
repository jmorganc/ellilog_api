<?php

namespace App\Http\Controllers;

use App\Models\Log;
use DB;


class LogController extends Controller
{
    public function index()
    {
        $filters = app('request')->input();
        $logs = DB::select('SELECT * FROM logs');

        $logs = array_map(function($log)
        {
            return [
                'user_id' => (int) $log->user_id,
                'baby_id' =>(int) $log->baby_id,
                'thing_id' => $log->thing_id,
                'data' => $log->data,
                'notes' => $log->notes,
                'created_at' => $log->created_at
            ];
        }, $logs);

        return response()->json(['data' => $logs], '200');
    }


    public function save()
    {
        $filters = app('request')->input();
        $res = DB::insert('INSERT INTO logs(user_id, baby_id, thing_id, data, notes) VALUES(:user_id, :baby_id, :thing_id, :data, :notes)', [
            'user_id' => (int) $filters['user_id'],
            'baby_id' => (int) $filters['baby_id'],
            'thing_id' => $filters['thing_id'],
            'data' => $filters['data'],
            'notes' => $filters['notes']
        ]);
        dd($res);

        return 'asdf';
    }
}

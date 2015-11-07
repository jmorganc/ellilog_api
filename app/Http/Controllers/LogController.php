<?php

namespace App\Http\Controllers;

use App\Models\Log;
use DB;


class LogController extends Controller
{
    public function index()
    {
        $filters = app('request')->input();

        $query = 'SELECT * FROM logs WHERE baby_id = :baby_id AND created_at >= DATE_SUB(NOW(), INTERVAL 12 HOUR) ORDER BY created_at DESC';
        // if (array_key_exists('date', $filters) {
        //     $query = 'SELECT * FROM logs WHERE ';
        // }

        $logs = DB::select($query, [
            'baby_id' => (int) $filters['baby_id']
        ]);
        // $babies = DB::select('SELECT * FROM babies WHERE active = :active AND id = :id', [
        //     'active' => (boolean) $filters['active'],
        //     'id' => (int) $filters['id']
        // ]);

        $logs = array_map(function($log)
        {
            return [
                'user_id' => (int) $log->user_id,
                'baby_id' => (int) $log->baby_id,
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

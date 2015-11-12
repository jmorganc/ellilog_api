<?php

namespace App\Http\Controllers;

use App\Models\Log;
use DB;


class LogController extends Controller
{
    public function index()
    {
        $filters = app('request')->input();

        $query = 'SELECT * FROM logs WHERE baby_id = :baby_id AND created_at >= DATE_SUB(NOW(), INTERVAL 24 HOUR) ORDER BY created_at DESC';
        $filter_on = 'baby_id';

        if (array_key_exists('id', $filters)) {
            $query = 'SELECT * FROM logs WHERE id = :id';
            $filter_on = 'id';
        }

        $logs = DB::select($query, [
            $filter_on => (int) $filters[$filter_on]
        ]);

        $logs = array_map(function($log)
        {
            return [
                'id' => (int) $log->id,
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


    public function update($id)
    {
        $datetime = new \DateTime();
        $datetime_string = $datetime->format('Y-m-d H:i:s');

        $filters = app('request')->input();
        $res = DB::update('UPDATE logs SET user_id = :user_id, baby_id = :baby_id, thing_id = :thing_id, data = :data, notes = :notes, updated_at = :updated_at WHERE id = :id', [
            'id' => (int) $id,
            'user_id' => (int) $filters['user_id'],
            'baby_id' => (int) $filters['baby_id'],
            'thing_id' => $filters['thing_id'],
            'data' => $filters['data'],
            'notes' => $filters['notes'],
            'updated_at' => $datetime_string
        ]);

        return $res;
    }
}

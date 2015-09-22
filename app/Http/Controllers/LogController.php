<?php

namespace App\Http\Controllers;

use App\Models\Log;
use DB;


class LogController extends Controller
{
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

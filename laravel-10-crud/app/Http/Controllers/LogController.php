<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
    public static function crudLog($request, $action)
    {
        $log = new Log;

        $log->user_id = auth()->user()->id;
        $log->action = $action;
        $log->ip = $request->ip();
        $log->browser = $_SERVER['HTTP_SEC_CH_UA'];

        $log->save();
    }

    public function index()
    {
        return view('logs.index', [
            'logs' => Log::all()
        ]);
    }
}

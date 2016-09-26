<?php

namespace App\Http\Controllers\ElectricGrid;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ObserverDataController extends Controller
{

    public function weather(Request $request) {
        $data = DB::connection()->table('weather')->select()->get();
        return response()
            ->json($data)
            ->setCallback($request->input('callback'));
    }

    public function linesStatus(Request $request) {
        $data = DB::connection()->table('line_status')->select()->get();
        return response()
            ->json($data)
            ->setCallback($request->input('callback'));
    }

    public function gas(Request $request) {
        $data = DB::connection()->table('gas')->select()->get();
        return response()
            ->json($data)
            ->setCallback($request->input('callback'));
    }

}

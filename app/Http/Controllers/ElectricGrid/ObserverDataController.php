<?php

namespace App\Http\Controllers\ElectricGrid;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ObserverDataController extends Controller
{

    public function weather() {
        $data = DB::connection()->table('weather')->select()->get();
        $res = array();
        foreach ($data as $one) {
            $tmp = array();
            $tmp['type'] = 'weathers';
            $tmp['id'] = $one->weather_id;
            $tmp['attributes'] = $one;
            $res[] = $tmp;
        }
        return response()
            ->json(['data'=>$res])
            ->header( 'Access-Control-Allow-Origin', 'http://localhost:4200');
    }

    public function linesStatus() {
        $data = DB::connection()->table('line_status')->select()->get();
        $res = array();
        foreach ($data as $one) {
            $tmp = array();
            $tmp['type'] = 'line-statuses';
            $tmp['id'] = $one->line_status_id;
            $tmp['attributes'] = $one;
            $res[] = $tmp;
        }
        return response()
            ->json(['data'=>$res])
            ->header( 'Access-Control-Allow-Origin', 'http://localhost:4200');
    }

    public function gas() {
        $data = DB::connection()->table('gas')->select()->get();
        $res = array();
        foreach ($data as $one) {
            $tmp = array();
            $tmp['type'] = 'gas';
            $tmp['id'] = $one->gas_id;
            $tmp['attributes'] = $one;
            $res[] = $tmp;
        }
        return response()
            ->json(['data'=>$res])
            ->header( 'Access-Control-Allow-Origin', 'http://localhost:4200');
    }

}

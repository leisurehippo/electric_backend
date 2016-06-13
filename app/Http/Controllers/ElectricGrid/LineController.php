<?php

namespace App\Http\Controllers\ElectricGrid;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LineController extends Controller
{
    public function lines(){

        $data = DB::connection()->table('line')->select()->get();
        $res = array();
        foreach ($data as $one) {
            $tmp = array();
            $tmp['type'] = 'lines';
            $tmp['id'] = $one->line_id;
            $tmp['attributes'] = $one;
            $res[] = $tmp;
        }
        return response()->json(['data'=>$res])
            ->header( 'Access-Control-Allow-Origin', 'http://localhost:4200');
    }
}

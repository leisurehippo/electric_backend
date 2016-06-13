<?php

namespace App\Http\Controllers\ElectricGrid;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EMSController extends Controller
{
    function EMSInfo(Request $request, $type){
        $devid = $request->input('devid');
        $beginDateTime = $request->input('beginDateTime');
        $endDateTime = $request->input('endDateTime');

        if (empty($devid) || empty($beginDateTime) || empty($endDateTime)) {
            print_r($devid . $beginDateTime . $endDateTime);
        }

//        p:有功功率，q：无功功率，i：电流，u：电压，t：油温
        if ($type == 't') {
            $data = DB::connection()->table('weather')->select(['device as devid', 'temperature as t', 'time as clTime'])->whereBetween('time', [$beginDateTime, $endDateTime])->get();
        }else{
            $data = DB::connection()->table('ems')->select(['devid', $type, 'lcTime'])->whereBetween('lcTime', [$beginDateTime, $endDateTime])->get();
        }
        return response()->json($data)->header( 'Access-Control-Allow-Origin', '*');
    }
}

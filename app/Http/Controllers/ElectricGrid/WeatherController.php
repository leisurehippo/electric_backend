<?php

namespace App\Http\Controllers\ElectricGrid;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WeatherController extends Controller
{
    public function weatherInfo(Request $request) {
        $devid = $request->input('devid');
        $beginDateTime = $request->input('beginDateTime');
        $endDateTime = $request->input('endDateTime');
        if (empty($devid) || empty($beginDateTime) || empty($endDateTime)) {
            return null;
        }
        $data = DB::connection()->table('weather')->where('devid',$devid)->whereBetween('dateTime', [$beginDateTime, $endDateTime])->get();

    }   
}

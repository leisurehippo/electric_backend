<?php

namespace App\Http\Controllers\ElectricGrid;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WeatherController extends Controller
{
    public function weather(Request $request) {
        $devStation = $request->input('devStation');
        $beginDateTime = $request->input('beginDateTime');
        $endDateTime = $request->input('endDateTime');
        if (empty($devStation)) {
//            if (!empty($beginDateTime) || !empty($endDateTime)) {
//                $data = DB::connection()->table('weather')->whereBetween('dateTime', [$beginDateTime, $endDateTime])->get();
//                return response()
//                    ->json($data)
//                    ->setCallback($request->input('callback'));
//            } else {
//                $data = DB::connection()->table('weather')->select()->get();
//                return response()
//                    ->json($data)
//                    ->setCallback($request->input('callback'));
//            }
            $data = DB::connection()->table('weather')->select()->get();
                return response()
                    ->json($data)
                    ->setCallback($request->input('callback'));
        } else {
            $data = DB::connection()->table('weather')->select()->where('device', $devStation)->get();
            return response()
                ->json($data)
                ->setCallback($request->input('callback'));
        }
//        if (empty($devid) || empty($beginDateTime) || empty($endDateTime)) {
//            return null;
//        }
//        $data = DB::connection()->table('weather')->where('devid',$devid)->whereBetween('dateTime', [$beginDateTime, $endDateTime])->get();

    }   
}

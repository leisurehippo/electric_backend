<?php

namespace App\Http\Controllers\ElectricGrid;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LineController extends Controller
{
    public function lines(Request $request){
        $lineID = $request->input('LineId');
        if(empty($lineID)){
            $data = DB::connection()->table('line')->select()->get();
            return response()
                ->json($data)
                ->setCallback($request->input('callback'));
        } else{
            $data = DB::connection()->table('line')->select()->where('device_id', $lineID)->get();
            return response()
                ->json($data)
                ->setCallback($request->input('callback'));

        }
    }

    public function linesDeviceCode(Request $request, $id) {
        $data = DB::connection()->table('line')->select()->where('device_code', $id)->get();
        return response()
            ->json($data)
            ->setCallback($request->input('callback'));

    }
}

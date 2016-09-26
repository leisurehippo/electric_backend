<?php

namespace App\Http\Controllers\ElectricGrid;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LineController extends Controller
{
    public function lines(Request $request){
        $data = DB::connection()->table('line')->select()->get();
        return response()
            ->json($data)
            ->setCallback($request->input('callback'));
    }
}

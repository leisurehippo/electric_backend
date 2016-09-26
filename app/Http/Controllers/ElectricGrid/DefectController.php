<?php

namespace App\Http\Controllers\ElectricGrid;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DefectController extends Controller
{
    public function defectsLines(Request $request){
        $data = DB::connection()->table('defect_line')->select()->get();
        return response()
            ->json($data)
            ->setCallback($request->input('callback'));
    }

    public function defectsTransformers(Request $request){
        $data = DB::connection()->table('defect_transformer')->select()->get();
        return response()
            ->json($data)
            ->setCallback($request->input('callback'));
    }
}

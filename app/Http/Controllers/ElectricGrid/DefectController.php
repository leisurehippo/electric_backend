<?php

namespace App\Http\Controllers\ElectricGrid;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DefectController extends Controller
{
    public function defectsLines(Request $request){
        $defectLineId = $request->input('searchDefectLine');
        if (empty($defectLineId)) {
            $data = DB::connection()->table('defect_line')->select()->get();
            return response()
                ->json($data)
                ->setCallback($request->input('callback'));

        } else{
            $data = DB::connection()->table('defect_line')->select()->where('device_id',$defectLineId)->get();
            return response()
                ->json($data)
                ->setCallback($request->input('callback'));

        }
    }

    public function defectlinesLevel(Request $request , $level) {
        $data = DB::connection()->table('defect_line')->select()->where('level',$level)->get();
        return response()
            ->json($data)
            ->setCallback($request->input('callback'));
    }

    public function defectsTransformers(Request $request){
        $defectTransformersId= $request->input('searchDefectTransformer');
        if (empty($defectTransformersId)) {
            $data = DB::connection()->table('defect_transformer')->select()->get();
            return response()
                ->json($data)
                ->setCallback($request->input('callback'));
        } else{
            $data = DB::connection()->table('defect_transformer')->select()->where('device_id', $defectTransformersId)->get();
            return response()
                ->json($data)
                ->setCallback($request->input('callback'));
        }

    }
}

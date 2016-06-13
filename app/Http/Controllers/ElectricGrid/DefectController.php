<?php

namespace App\Http\Controllers\ElectricGrid;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DefectController extends Controller
{
    public function defectsLines(){
        
        $data = DB::connection()->table('defect_line')->select()->get();
        $res = array();
        foreach ($data as $one) {
            $tmp = array();
            $tmp['type'] = 'defect-lines';
            $tmp['id'] = $one->defect_line_id;
            $tmp['attributes'] = $one;
            $res[] = $tmp;
        }
        return response()
            ->json(['data'=>$res])
            ->header( 'Access-Control-Allow-Origin', 'http://localhost:4200');
    }

    public function defectsTransformers(){

        $data = DB::connection()->table('defect_transformer')->select()->get();
        $res = array();
        foreach ($data as $one) {
            $tmp = array();
            $tmp['type'] = 'defect-transformers';
            $tmp['id'] = $one->defect_transformer_id;
            $tmp['attributes'] = $one;
            $res[] = $tmp;
        }
        return response()
            ->json(['data'=>$res])
            ->header( 'Access-Control-Allow-Origin', 'http://localhost:4200');
    }
}

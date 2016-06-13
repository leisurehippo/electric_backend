<?php

namespace App\Http\Controllers\ElectricGrid;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TransformerController extends Controller
{
    public function transformers(){

        $data = DB::connection()->table('transformer')->select()->get();
        $res = array();
        foreach ($data as $one) {
            $tmp = array();
            $tmp['type'] = 'transformers';
            $tmp['id'] = $one->transformer_id;
            $tmp['attributes'] = $one;
            $res[] = $tmp;
        }
        return response()
            ->json(['data'=>$res])
            ->header( 'Access-Control-Allow-Origin', 'http://localhost:4200');
    }
}

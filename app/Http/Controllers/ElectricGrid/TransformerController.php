<?php

namespace App\Http\Controllers\ElectricGrid;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TransformerController extends Controller
{
    public function transformers(Request $request){
        $transformerID = $request->input('transformerId');
        if (empty($transformerID)) {
            $data = DB::connection()->table('transformer')->select()->get();
            return response()
                ->json($data)
                ->setCallback($request->input('callback'));
        } else{
            $data = DB::connection()->table('transformer')->select()->where('device_id',$transformerID)->get();
            return response()
                ->json($data)
                ->setCallback($request->input('callback'));
        }

    }
}

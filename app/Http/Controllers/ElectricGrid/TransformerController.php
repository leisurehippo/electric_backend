<?php

namespace App\Http\Controllers\ElectricGrid;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TransformerController extends Controller
{
    public function transformers(Request $request){
        $data = DB::connection()->table('transformer')->select()->get();
        return response()
            ->json($data)
            ->setCallback($request->input('callback'));
    }
}

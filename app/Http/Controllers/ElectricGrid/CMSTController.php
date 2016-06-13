<?php

namespace App\Http\Controllers\ElectricGrid;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CMSTController extends Controller
{
    public function CMSTInfo(Request $request, $type, $childType) {
        $devid = $request->input('devid');
        $beginDateTime = $request->input('beginDateTime');
        $endDateTime = $request->input('endDateTime');
        if (empty($devid)) {
            return null;
        }
    }
}

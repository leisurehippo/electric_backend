<?php

namespace App\Http\Controllers\ElectricGrid;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

class DefectController extends Controller
{
    public function defectsLines(Request $request){
        $defectLineId = $request->input('searchDefectLine');
        $defectLineLevel = $request->input('searchDefectLineLevel');
        $defectLineDateStart= $request->input('searchDefectLineDateStart');
        $defectLineDateEnd= $request->input('searchDefectLineDateEnd');

        if (empty($defectLineId)) {
            if (empty($defectLineLevel)) {
                if (empty($defectLineDateStart) && empty($defectLineDateEnd)) {
                    $data = DB::connection()->table('defect_line')->select()->get();
                    return response()
                        ->json($data)
                        ->setCallback($request->input('callback'));
                } else {
                    $rawData = DB::connection()->table('defect_line')->select()->get();
                    $newData = [];
                    $defectLineDateStart = Carbon::createFromFormat('Y-m-d H:i', $defectLineDateStart, 'Europe/London');
                    $defectLineDateEnd = Carbon::createFromFormat('Y-m-d H:i', $defectLineDateEnd, 'Europe/London');

                    for ($i = 0; $i < count($rawData); $i++ ) {
                        $rawData[$i]->time =  Carbon::createFromFormat('d/m/Y H:i', $rawData[$i]->time)->format('Y-m-d H:i'); // 1975-05-21 22:00:00
                        $rawData[$i]->time =  Carbon::createFromFormat('Y-m-d H:i', $rawData[$i]->time, 'Europe/London');

                        if ($rawData[$i]->time > $defectLineDateStart && $rawData[$i]->time < $defectLineDateEnd) {
                            $rawData[$i]->time = $rawData[$i]->time->toDateTimeString();
                            array_push($newData,$rawData[$i]);
                        }
                    }
                    return response()
                        ->json($newData)
                        ->setCallback($request->input('callback'));
                }

            } else {
                $data = DB::connection()->table('defect_line')->select()->where('level',$defectLineLevel)->get();
                return response()
                    ->json($data)
                    ->setCallback($request->input('callback'));
            }


        } else{
            $data = DB::connection()->table('defect_line')->select()->where('device_id',$defectLineId)->get();
            return response()
                ->json($data)
                ->setCallback($request->input('callback'));

        }
    }
    public function defectsTransformers(Request $request){
        $defectTransformersId= $request->input('searchDefectTransformer');
        $defectTransformersLevel = $request->input('searchDefectTransformerLevel');
        $defectTransformersDateStart =  $request->input('searchDefectTransDateStart');
        $defectTransformersDateEnd =  $request->input('searchDefectTransDateEnd');

        if (empty($defectTransformersId)) {
            if (empty($defectTransformersLevel)) {
                if (empty($defectTransformersDateStart) && empty($defectTransformersDateEnd))  {
                    $data = DB::connection()->table('defect_transformer')->select()->get();
                    return response()
                        ->json($data)
                        ->setCallback($request->input('callback'));
                } else {
                    $rawData = DB::connection()->table('defect_transformer')->select()->get();
                    $newData = [];
                    $defectTransformersDateStart = Carbon::createFromFormat('Y-m-d H:i', $defectTransformersDateStart, 'Europe/London');
                    $defectTransformersDateEnd = Carbon::createFromFormat('Y-m-d H:i', $defectTransformersDateEnd, 'Europe/London');

                    for ($i = 0; $i < count($rawData); $i++ ) {
                        $rawData[$i]->time =  Carbon::createFromFormat('d/m/Y H:i', $rawData[$i]->time)->format('Y-m-d H:i'); // 1975-05-21 22:00:00
                        $rawData[$i]->time =  Carbon::createFromFormat('Y-m-d H:i', $rawData[$i]->time, 'Europe/London');

                        if ($rawData[$i]->time > $defectTransformersDateStart && $rawData[$i]->time < $defectTransformersDateEnd) {
                            $rawData[$i]->time = $rawData[$i]->time->toDateTimeString();
                            array_push($newData,$rawData[$i]);
                        }
                    }
                    return response()
                        ->json($newData)
                        ->setCallback($request->input('callback'));
                }

            } else {
                if ($defectTransformersLevel === "一般") {
                    $defectTransformersLevel = $defectTransformersLevel."--";
                }
                $data = DB::connection()->table('defect_transformer')->select()->where('level', $defectTransformersLevel)->get();
                return response()
                    ->json($data)
                    ->setCallback($request->input('callback'));
            }

        } else{
            $data = DB::connection()->table('defect_transformer')->select()->where('device_id', $defectTransformersId)->get();
            return response()
                ->json($data)
                ->setCallback($request->input('callback'));
        }

    }
}

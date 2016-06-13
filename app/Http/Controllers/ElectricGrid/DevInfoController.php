<?php

namespace App\Http\Controllers\ElectricGrid;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DevInfoController extends Controller
{
    public function devInfo(Request $request)
    {
        $devType = $request->input('devtype');
        $conditions = $request->input('conditions');
        $resultFeilds = $request->input('resultFeilds');

        print_r($conditions);
        print_r($resultFeilds);

        $conditions = dealConditions($conditions);
        $resultFeilds = dealResultFeilds($resultFeilds);


        $res = null;
        switch ($devType) {
            case 'zb' :
                $res = self::getzbData($conditions, $resultFeilds);
                break;
            case 'blg' :
                $res = self::getblqData($conditions, $resultFeilds);
                break;
            case 'pt' :
                $res = self::getptData($conditions, $resultFeilds);
                break;
            case 'dlq' :
                $res = self::getdlqData($conditions, $resultFeilds);
                break;
            case 'xl' :
                $res = self::getxlData($conditions, $resultFeilds);
                break;
            default :
                $res = null;
        }
        $res = json_encode($res);
        return $res;
    }

    private function getzbData($conditions, $resultFeilds)
    {
        return null;
    }

    private function getxlData($conditions, $resultFeilds)
    {
        return null;
    }

    //TODO
    private function getptData($conditions, $resultFeilds)
    {
        return null;
    }

    //TODO
    private function getdlqData($conditions, $resultFeilds)
    {
        return null;
    }

    //TODO
    private function getblqData($conditions, $resultFeilds)
    {
        return null;
    }
}

   

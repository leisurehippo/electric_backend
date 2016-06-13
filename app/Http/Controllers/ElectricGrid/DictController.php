<?php

namespace App\Http\Controllers\ElectricGrid;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DictController extends Controller
{

    public function dict(Request $request) {
        $deveType = $request->input('devetype');
        $res = null;
        switch ($deveType) {
            case 'zb' :
                $res = ['devid'=>'主变id', 'dydj'=>'电压等级', 'yxzt'=>'运行状态', 'jyjz'=>'绝缘介质', 'syhj'=>'使用环境', 'ccrq'=>'出厂日期', 'sccj'=>'生产厂家', 'kzdl'=>'空载电流', 'eddy'=>'额定电压', 'sbbm'=>'设备编码', 'sszfmc'=>'所属站房名称', 'sszfid'=>'所属站房id'];
        }
        $res = json_encode($res);
        return $res;
    }

    public function xl(Request $request) {

        $res = ['xlid'=>'线路id', 'xlzcd'=>'线路总长度', 'tyrq'=>'投运日期', 'jsfs'=>'架设方式', 'jsxlzcd'=>'假设线路总长度(计量单位=>km)', 'sbzjfs'=>'设备增加方式', 'kqylx'=>'跨区域类型', 'sjdydj'=>'设计电压等级', 'zdyxdl'=>'最大允许电流(计量单位=>A)', 'XLSB'=>'线路色标', 'dljxfs'=>'电缆接线方式(计量单位=>m)' ];
        return $res;
    }

    public function ysp(Request $request) {

        $res = ['s11'=>'h2', 's12'=>'o2', 's13'=>'so2', 's14'=>'n2', 's15'=>'ch4', 's16'=>'c2h4', 's17'=>'c2h2','s18'=>'lcTime'];
        return $res;
    }

    public function ws(Request $request) {

        $res = ['s21'=> 'mositure' , 's22' => 'lcTime'];
        return $res;
    }

    public function zbqx(Request $request) {
        $res = '[bw,flyj,qxxz,,sbzl,sssj,qxnr]';
        return $res;
    }

    public function xlqx(Request $request) {
        $res = '[bw,flyj,qxxz,,sbzl,sssj,qxnr]';
        return $res;
    }

    public function enumData(Request $request) {
        $key = $request->input('key');
        $res = null;
        switch ($key) {
            case 'dev_type' :
                $res = [['id'=>'35', 'name'=>'500kv'],['id'=>'33','name'=>'220kv'],['id'=>'32','name'=>'110kv'],
                        ['id'=>'25','name'=>'35kv'],['id'=>'22','name'=>'10kv']];
                break;
            case 'dev_dydj' :
                $res = [['id'=>'zb', 'name'=>'主变'],['id'=>'blq','name'=>'变路器'],['id'=>'ct','name'=>'CT'],
                        ['id'=>'pt','name'=>'PT'],['id'=>'dlq','name'=>'断路器'],['id'=>'xl','name'=>'线路']];
                break;
        }
        $res = json_encode($res);
        return $res;
    }

    public function resultFields(Request $request) {
        $key = $request->input('key');
        $res = null;
        switch ($key) {
            case 'devinfo _zb' :
                $res = [['fieldName'=>'devid','fieldDescription'=>'主变id'],['fieldName'=>'devname','fieldDescription'=>'设备名称'],['fieldName'=>'dydj','fieldDescription'=>'电压等级'],['fieldName'=>'jyjz','fieldDescription'=>'绝缘介质'],['fieldName'=>'syhj','fieldDescription'=>'使用环境'],['fieldName'=>'ccrq','fieldDescription'=>'出厂日期'],['fieldName'=>'syhj','fieldDescription'=>'生产厂家'],['fieldName'=>'syhj',' fieldDescription'=>'生产厂家'],['fieldName'=>'kzdl',' fieldDescription'=>'空载电流'],['fieldName'=>'eddy',' fieldDescription'=>'额定电压'],['fieldName'=>'sbbm',' fieldDescription'=>'设备编码'],['fieldName'=>'sszfmc','fieldDescription'=>'所属站房名称'],['fieldName'=>'sszfid',' fieldDescription'=>'所属站房id']];
                break;
            case 'devinfo _xl' :
                $res = [['fieldName'=>'xlid','fieldDescription'=>'线路id'],['fieldName'=>'tyrq','fieldDescription'=>'投运日期'],['fieldName'=>'jsfs','fieldDescription'=>'架设方式'],['fieldName'=>'jsxlzc','fieldDescription'=>'设线路总长度(计量单位:km)'],['fieldName'=>'sbzjfs','fieldDescription'=>'设备增加方式'],['fieldName'=>'kqylx','fieldDescription'=>'跨区域类型'],['fieldName'=>'sjdydj','fieldDescription'=>'设计电压等级'],['fieldName'=>'zdyxdl',' fieldDescription'=>'最大允许电流(计量单位:A)'],['fieldName'=>'xlsb',' fieldDescription'=>'线路色标'],['fieldName'=>'dljxfs',' fieldDescription'=>'电缆接线方式(计量单位:m)'],['fieldName'=>'xlzcd',' fieldDescription'=>'线路总长度']];;
                break;
            case 'J_BD_SY_YZRJQTFX' :
                $res = [['fieldName'=>'S21','fieldDescription'=>'CO2'],['fieldName'=>'S22','fieldDescription'=>'H2'],['fieldName'=>'S23','fieldDescription'=>'CO'],['fieldName'=>'S24','fieldDescription'=>'CH4']];
                break;
        }
        $res = json_encode($res);
        return $res;
    }
}

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['namespace' => 'ElectricGrid','prefix' => 'electric', 'middleware' => 'web'],function (){

    Route::get('defect-lines','DefectController@defectsLines');
    Route::get('defect-transformers','DefectController@defectsTransformers');
    ROute::get('lines','LineController@lines');
    Route::get('transformers','TransformerController@transformers');
    Route::get('weathers','ObserverDataController@weather');
    Route::get('line-statuses','ObserverDataController@linesStatus');
    Route::get('gas','ObserverDataController@gas');
    Route::get('lines/deviceCode/{id}', 'LineController@linesDeviceCode');
    Route::get('defect-lines/{level}', 'DefectController@defectlinesLevel' );
});


Route::group(['namespace' => 'ElectricGrid','prefix' => 'transformer', 'middleware' => 'web'],function (){

    //字典数据接口
//	Route::get('dict','DictController@dict');
//	Route::get('zd/xl','DictController@xl');
//	Route::get('zd/pms/ysp','DictController@ysp');
//	Route::get('zd/pms/ws','DictController@ws');
//	Route::get('zd/pms/zbqx','DictController@zbqx');
//	Route::get('zd/pms/xlqx','DictController@xlqx');

    //帮助信息
//	Route::get('getEnumData', 'DictController@enumData');
//	Route::get('getResultFields', 'DictController@resultFields');

    //设备台账接口
//	Route::get('devinfo','DevInfoController@devInfo');

    //EMS数据访问接口
    Route::get('ems/{type}','EMSController@EMSInfo');

    //CMST数据访问接口
//	Route::get('cmst/{type}/{childType?}','CMSTController@CMSTInfo');

    //Weather气象数据访问接口
//	Route::get('weather/ssqx','WeatherController@weatherInfo');

});
Route::auth();
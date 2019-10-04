<?php
namespace App\Models;
use App\Models\Connection;
use DB;
use App\Http\HttpClientCommunication;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserLogin
 *
 * @author haisamsohail
 */
class ActivityReportModel extends Connection
{
	const END_POINT_USER = 'user/';
    public function __construct()
    {
            parent::__construct();
    }


    public function APPInput()
    {
        $data = array();
        $StationListCallAPI = app(HttpClientCommunication::class);
        $response = $StationListCallAPI->storeData(self::END_POINT_USER."APPInput", $data, true);
        return $response->body();
    }



	public function AddStationDB($stationname, $stationdescription )
	{
		$data = array('stationname' => $stationname, 'stationdescription' => $stationdescription);
		//dd($data);	
        $AddStationDBCallAPI = app(HttpClientCommunication::class);
		
		$response = $AddStationDBCallAPI->storeData(self::END_POINT_USER."AddStation", $data, true);
		//dd($response);
		//$array =  (array) $response;
		//dd(gettype($response));
		return $response->body();
	}


    public function SearchActivityReport($Datarequest)
    {
        $StationListCallAPI = app(HttpClientCommunication::class);
        $response = $StationListCallAPI->storeData(self::END_POINT_USER."SearchActivityReport", $Datarequest, true);
        return $response->body();
    }

    public function DeleteStation($stationid)
    {
        $data = array();
        $data = array('stationid' => $stationid);
        $StationListCallAPI = app(HttpClientCommunication::class);
        $response = $StationListCallAPI->storeData(self::END_POINT_USER."DeleteStation", $data, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }


    public function EditPageStation($stationid)
    {
        $data = array();
        $data = array('stationid' => $stationid);
        $StationListCallAPI = app(HttpClientCommunication::class);
        $response = $StationListCallAPI->storeData(self::END_POINT_USER."EditPageStation", $data, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }


    public function EditStation($stationname, $stationdescription, $stationid)
    {
        $data = array();
        $data = array('stationid' => $stationid, 'stationname' => $stationname, 'stationdescription' => $stationdescription);
        //dd($data);
        $StationListCallAPI = app(HttpClientCommunication::class);
        $response = $StationListCallAPI->storeData(self::END_POINT_USER."EditStation", $data, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }

    public function GetLocations($Datarequest)
    {
        $StationListCallAPI = app(HttpClientCommunication::class);
        $response = $StationListCallAPI->storeData(self::END_POINT_USER."GetLocations", $Datarequest, true);
        return $response->body();
    }

    public function SearchActivityReportData($Datarequest)
    {
        $StationListCallAPI = app(HttpClientCommunication::class);
        $response = $StationListCallAPI->storeData(self::END_POINT_USER."SearchActivityReportData", $Datarequest, true);
        return $response->body();
    }
}

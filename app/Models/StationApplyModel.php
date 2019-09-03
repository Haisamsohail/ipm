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
class StationApplyModel extends Connection
{
	const END_POINT_USER = 'user/';
    public function __construct()
    {
            parent::__construct();
    }

    public function CheckStation($Datarequest)
    {
        $AddactivityDBCallAPI = app(HttpClientCommunication::class);
        $response = $AddactivityDBCallAPI->storeData(self::END_POINT_USER."CheckStation", $Datarequest, true);
        return $response->body();
    }


    public function AddStationApplyDB($Datarequest)
	{
        $AddactivityDBCallAPI = app(HttpClientCommunication::class);
		$response = $AddactivityDBCallAPI->storeData(self::END_POINT_USER."AddStationApplyDB", $Datarequest, true);
		//dd($response->body());
		return $response->body();
	}


    public function StationApplyList($companyid,$branchid, $branchlocationid)
    {
        $data = array();
        $data = array('companyid' => $companyid, 'branchid' => $branchid, 'branchlocationid' => $branchlocationid);
        $ActivityListCallAPI = app(HttpClientCommunication::class);
        $response = $ActivityListCallAPI->storeData(self::END_POINT_USER."StationApplyList", $data, true);
        return $response->body();
    }

    public function DeleteStationApply($companyid,$branchid,$branchlocationid, $stationapplyid)
    {
        $data = array();
        $data = array('companyid' => $companyid, 'branchid' => $branchid, 'branchlocationid' => $branchlocationid, 'stationapplyid' => $stationapplyid);
        $ActivityListCallAPI = app(HttpClientCommunication::class);
        $response = $ActivityListCallAPI->storeData(self::END_POINT_USER."DeleteStationApply", $data, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }

    public function EditPageStationApply($companyid,$branchid,$branchlocationid, $stationapplyid)
    {
        $data = array();
        $data = array('companyid' => $companyid, 'branchid' => $branchid, 'branchlocationid' => $branchlocationid, 'stationapplyid' => $stationapplyid);
        $StationListCallAPI = app(HttpClientCommunication::class);
        $response = $StationListCallAPI->storeData(self::END_POINT_USER."EditPageStationApply", $data, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }

    public function EditStationApply($Datarequest)
    {
        //dd($data);
        $StationListCallAPI = app(HttpClientCommunication::class);
        $response = $StationListCallAPI->storeData(self::END_POINT_USER."EditStationApply", $Datarequest, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }
}

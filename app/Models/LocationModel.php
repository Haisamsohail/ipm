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
class LocationModel extends Connection
{
	const END_POINT_USER = 'user/';
    public function __construct()
    {
            parent::__construct();
    }
	public function AddLocationDB($Datarequest)
	{
        $AddactivityDBCallAPI = app(HttpClientCommunication::class);
		$response = $AddactivityDBCallAPI->storeData(self::END_POINT_USER."AddLocationDB", $Datarequest, true);
		return $response->body();
	}


    public function LocationList($companyid,$branchid)
    {
        $data = array();
        $data = array('companyid' => $companyid, 'branchid' => $branchid);
        $ActivityListCallAPI = app(HttpClientCommunication::class);
        $response = $ActivityListCallAPI->storeData(self::END_POINT_USER."LocationList", $data, true);
        return $response->body();
    }

    public function BStation($companyid,$branchid)
    {
        $data = array();
        $data = array('companyid' => $companyid, 'branchid' => $branchid);
        $ActivityListCallAPI = app(HttpClientCommunication::class);
        $response = $ActivityListCallAPI->storeData(self::END_POINT_USER."BStation", $data, true);
        return $response->body();
    }

    public function DeleteLocation($companyid,$branchid,$branchlocationid)
    {
        $data = array();
        $data = array('companyid' => $companyid, 'branchid' => $branchid, 'branchlocationid' => $branchlocationid);
        $ActivityListCallAPI = app(HttpClientCommunication::class);
        $response = $ActivityListCallAPI->storeData(self::END_POINT_USER."DeleteLocation", $data, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }

    public function EditPageLocation($companyid,$branchid,$branchlocationid)
    {
        $data = array();
        $data = array('companyid' => $companyid, 'branchid' => $branchid, 'branchlocationid' => $branchlocationid);
        $StationListCallAPI = app(HttpClientCommunication::class);
        $response = $StationListCallAPI->storeData(self::END_POINT_USER."EditPageLocation", $data, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }

    public function EditLocation($Datarequest)
    {
        //dd($data);
        $StationListCallAPI = app(HttpClientCommunication::class);
        $response = $StationListCallAPI->storeData(self::END_POINT_USER."EditLocation", $Datarequest, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }
}

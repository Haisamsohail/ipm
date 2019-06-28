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

    public function DeleteEmployee($companyid,$branchid,$employeeid)
    {
        $data = array();
        $data = array('companyid' => $companyid, 'branchid' => $branchid, 'employeeid' => $employeeid);
        $ActivityListCallAPI = app(HttpClientCommunication::class);
        $response = $ActivityListCallAPI->storeData(self::END_POINT_USER."DeleteEmployee", $data, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }

    public function EditPageEmployee($companyid,$branchid,$employeeid)
    {
        $data = array();
        $data = array('companyid' => $companyid, 'branchid' => $branchid, 'employeeid' => $employeeid);
        $StationListCallAPI = app(HttpClientCommunication::class);
        $response = $StationListCallAPI->storeData(self::END_POINT_USER."EditPageEmployee", $data, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }

    public function EditEmployee($Datarequest)
    {
        //dd($data);
        $StationListCallAPI = app(HttpClientCommunication::class);
        $response = $StationListCallAPI->storeData(self::END_POINT_USER."EditEmployee", $Datarequest, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }
}

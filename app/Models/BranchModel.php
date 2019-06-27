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
class BranchModel extends Connection
{
	const END_POINT_USER = 'user/';
    public function __construct()
    {
            parent::__construct();
    }
	public function AddBranchDB($Datarequest)
	{
        $AddactivityDBCallAPI = app(HttpClientCommunication::class);
		$response = $AddactivityDBCallAPI->storeData(self::END_POINT_USER."AddBranchDB", $Datarequest, true);
		//dd($response);
		//$array =  (array) $response;
		//dd(gettype($response));
		return $response->body();
	}


    public function BranchList($companyid)
    {
        $data = array();
        $data = array('companyid' => $companyid);
        $ActivityListCallAPI = app(HttpClientCommunication::class);
        $response = $ActivityListCallAPI->storeData(self::END_POINT_USER."BranchList", $data, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }

    public function DeleteBranch($companyid,$branchid)
    {
        $data = array();
        $data = array('companyid' => $companyid, 'branchid' => $branchid);
        $ActivityListCallAPI = app(HttpClientCommunication::class);
        $response = $ActivityListCallAPI->storeData(self::END_POINT_USER."DeleteBranch", $data, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }

    public function EditPageBranch($companyid,$branchid)
    {
        $data = array();
        $data = array('companyid' => $companyid, 'branchid' => $branchid);
        $StationListCallAPI = app(HttpClientCommunication::class);
        $response = $StationListCallAPI->storeData(self::END_POINT_USER."EditPageBranch", $data, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }

    public function EditBranch($Datarequest)
    {
        //dd($data);
        $StationListCallAPI = app(HttpClientCommunication::class);
        $response = $StationListCallAPI->storeData(self::END_POINT_USER."EditBranch", $Datarequest, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }
}

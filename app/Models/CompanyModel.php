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
class CompanyModel extends Connection
{
	const END_POINT_USER = 'user/';
    public function __construct()
    {
            parent::__construct();
    }


    public function IndustryList()
    {
        $data = array();
        $StationListCallAPI = app(HttpClientCommunication::class);
        $response = $StationListCallAPI->storeData(self::END_POINT_USER."IndustryList", $data, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }


	public function AddCompanyDB($companyindustrytypeid, $companyname, $companyurl )
	{
		$data = array('companyindustrytypeid' => $companyindustrytypeid, 'companyname' => $companyname , 'companyurl' => $companyurl);
		//dd($data);
        $AddStationDBCallAPI = app(HttpClientCommunication::class);
		
		$response = $AddStationDBCallAPI->storeData(self::END_POINT_USER."AddCompany", $data, true);
		//dd($response);
		//$array =  (array) $response;
		//dd(gettype($response));
		return $response->body();
	}


    public function CompanyList()
    {
        $data = array();
        $StationListCallAPI = app(HttpClientCommunication::class);
        $response = $StationListCallAPI->storeData(self::END_POINT_USER."CompanyList", $data, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }

    public function DeleteCompany($companyid)
    {
        $data = array();
        $data = array('companyid' => $companyid);
        $StationListCallAPI = app(HttpClientCommunication::class);
        $response = $StationListCallAPI->storeData(self::END_POINT_USER."DeleteCompany", $data, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }


    public function EditPageCompany($companyid)
    {
        $data = array();
        $data = array('companyid' => $companyid);
        $StationListCallAPI = app(HttpClientCommunication::class);
        $response = $StationListCallAPI->storeData(self::END_POINT_USER."EditPageCompany", $data, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }


    public function EditCompany($companyid, $companyname, $companyindustrytypeid, $companyurl)
    {
        $data = array();
        $data = array('companyid' => $companyid, 'companyname' => $companyname, 'companyindustrytypeid' => $companyindustrytypeid, 'companyurl' => $companyurl);
        //dd($data);
        $StationListCallAPI = app(HttpClientCommunication::class);
        $response = $StationListCallAPI->storeData(self::END_POINT_USER."EditCompany", $data, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }
}

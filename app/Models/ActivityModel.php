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
class ActivityModel extends Connection
{
	const END_POINT_USER = 'user/';
    public function __construct()
    {
            parent::__construct();
    }
	public function AddactivityDB($activitytype, $activityName, $activitydescription)
	{
		$data = array('activitytype' => $activitytype, 'activityName' => $activityName, 'activitydescription' => $activitydescription);
		//dd($data);	
        $AddactivityDBCallAPI = app(HttpClientCommunication::class);
		
		$response = $AddactivityDBCallAPI->storeData(self::END_POINT_USER."AddactivityDB", $data, true);
		//dd($response);
		//$array =  (array) $response;
		//dd(gettype($response));
		return $response->body();
	}


    public function ActivityList()
    {
        $data = array();
        $ActivityListCallAPI = app(HttpClientCommunication::class);
        $response = $ActivityListCallAPI->storeData(self::END_POINT_USER."ActivityList", $data, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }

    public function DeleteActivity($activityid)
    {
        $data = array();
        $data = array('activityid' => $activityid);
        $ActivityListCallAPI = app(HttpClientCommunication::class);
        $response = $ActivityListCallAPI->storeData(self::END_POINT_USER."DeleteActivity", $data, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }
}

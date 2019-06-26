<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

 use App\Models\ActivityModel;
 use Symfony\Component\HttpFoundation\Request;
 use App\Models\UserLogin;
 use App\Http\Controllers\Controller;
// use App\Http\HttpClientCommunication;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Session;

/**
 * Description of MainController
 *
 * @author Haisam
 */
class ActivityController extends Controller
{
	protected $token = null;
	public function __construct() 
	{		
		date_default_timezone_set("Asia/Karachi");
	}

	public function CreateActivity( $stationid)
	{
            return view('CreateActivity');
	}

    public function AddactivityDB(Request $request )
    {
        $activitytype = request('activitytype');
        $activityName = request('activityName');
        $stationid = request('stationid');
        $activitydescription = request('activitydescription');

        if(empty($activitytype) & empty($activityName) & empty($activitydescription) & empty($stationid))
        {
            return ["status"=> 404 , "sendadvisor" => "Post data cannot be null"];
        }
        $AddactivityDBMod = app(ActivityModel::class);
        $response = $AddactivityDBMod->AddactivityDB($activitytype, $activityName,$activitydescription, $stationid );
        if($response->status == "Y")
        {
            //dd($stationid);
            return redirect()->action('ActivityController@ActivityList', [$stationid]);
        }
        else
        {
            return redirect()->back()->with('messageForActivity', 'Fail To Add Activity .....!');
        }
    }

    public function ActivityList($stationid )
    {
        $ActivityListObject = app(ActivityModel::class);
        $response = $ActivityListObject->ActivityList($stationid);
        //dd($response->status);
        if($response->status == "Y")
        {
            return View('ActivityList')->with('ActivityList', $response->response);
        }
        else
        {
            return redirect()->action('ActivityController@CreateActivity', [$stationid]);
            //return redirect()->action('ActivityController@CreateActivity');
        }
    }


    public function DeleteActivity($stationid,$activityid )
    {
        $AddactivityDBMod = app(ActivityModel::class);
        $response = $AddactivityDBMod->DeleteActivity($stationid,$activityid);

        if($response->status == "Y")
        {
            return redirect()->action('ActivityController@ActivityList', [$stationid]);
        }
        else
        {
            return redirect()->action('ActivityController@CreateActivity', [$stationid]);
        }
    }


    public function EditPageActivity($stationid,$activityid )
    {
        $StationListObject = app(ActivityModel::class);
        $response = $StationListObject->EditPageActivity($stationid,$activityid);
        //dd($response);
        if($response->status == "Y")
        {
            return View('EditPageActivity')->with('EditPageActivity', $response->response);
        }
        else
        {
            return redirect()->action('ActivityController@CreateActivity');
        }
    }

    public function EditActivity(Request $request )
    {
        $activitytype = request('activitytype');
        $activityName = request('activityName');
        $activitydescription = request('activitydescription');
        $activityid = request('activityid');
        $stationid = request('stationid');

        $StationListObject = app(ActivityModel::class);
        $response = $StationListObject->EditActivity($activitytype, $activityName, $activitydescription, $activityid);
        //dd($response);
        if($response->status == "Y")
        {
            return redirect()->action('ActivityController@ActivityList', [$stationid]);
        }
        else
        {
            return redirect()->action('ActivityController@CreateActivity', [$stationid]);
        }
    }

}

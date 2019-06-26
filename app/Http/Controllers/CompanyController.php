<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

 use App\Models\ActivityModel;
 use App\Models\StationModel;
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
class CompanyController extends Controller
{
	protected $token = null;
	public function __construct() 
	{		
		date_default_timezone_set("Asia/Karachi");
	}

	public function CreateStation( )
	{
            return view('CreateStation');
	}

    public function AddStationDB(Request $request )
    {
        $stationname = request('stationname');
        $stationdescription = request('stationdescription');

        if(empty($stationname) & empty($stationdescription))
        {
            return ["status"=> 404 , "sendadvisor" => "Post data cannot be null"];
        }
        $AddStation_Odject = app(StationModel::class);
        $response = $AddStation_Odject->AddStationDB($stationname, $stationdescription );
        if($response->status == "Y")
        {
            return redirect()->back()->with('messageForStation', 'Station Added.....!');
        }
        else
        {
            return redirect()->back()->with('messageForStation', 'Fail To Add Station .....!');
        }
    }

    public function StationList( )
    {
        $StationListObject = app(StationModel::class);
        $response = $StationListObject->StationList();
        //dd($response);
        if($response->status == "Y")
        {
            return View('StationList')->with('StationList', $response->response);
        }
        else
        {
            return redirect()->action('StationController@CreateStation');
        }
    }


    public function DeleteStation($stationid )
    {
        $StationListObject = app(StationModel::class);
        $response = $StationListObject->DeleteStation($stationid);
        //dd($response->status);
        if($response->status == "Y")
        {
            return redirect()->action('StationController@StationList');
        }
        else
        {
            return redirect()->action('StationController@CreateStation');
        }
    }


    public function EditPageStation($stationid )
    {
        $StationListObject = app(StationModel::class);
        $response = $StationListObject->EditPageStation($stationid);
        //dd($response->status);
        if($response->status == "Y")
        {
            return View('EditPageStation')->with('EditPageStation', $response->response);
        }
        else
        {
            return redirect()->action('StationController@CreateStation');
        }
    }

    public function EditStation(Request $request )
    {
        $stationname = request('stationname');
        $stationdescription = request('stationdescription');
        $stationid = request('stationid');

        $StationListObject = app(StationModel::class);
        $response = $StationListObject->EditStation($stationname, $stationdescription, $stationid);
        //dd($response);
        if($response->status == "Y")
        {
            return redirect()->action('StationController@StationList');
        }
        else
        {
            return redirect()->action('StationController@CreateStation');
        }
    }

}

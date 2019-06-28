<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

 use App\Models\LocationModel;
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
class LocationController extends Controller
{
	protected $token = null;
	public function __construct() 
	{		
		date_default_timezone_set("Asia/Karachi");
	}

	public function CreateLocation($companyid,$branchid)
	{
            return view('CreateLocation');
	}

    public function AddLocationDB(Request $request )
    {
        $companyid = request('companyid');
        $branchid = request('branchid');
        $AddactivityDBMod = app(LocationModel::class);
        $response = $AddactivityDBMod->AddLocationDB($request->input());
        //dd($response);
        if($response->status == "Y")
        {
            //dd($stationid);
            return redirect()->action('LocationController@LocationList', [$companyid, $branchid]);
        }
        else
        {
            return redirect()->back()->with('messageForActivity', 'Fail To Add Activity .....!');
        }
    }

    public function LocationList($companyid,$branchid )
    {
        $ActivityListObject = app(LocationModel::class);
        $response = $ActivityListObject->LocationList($companyid,$branchid);
        //dd($response->response[0]->branchname);
        //dd($response->status);

        if($response->status == "Y")
        {

            return View('LocationList', ['LocationList' => $response->response, 'branchname' => $response->response[0]->branchname ]);
        }
        else
        {
            return redirect()->action('LocationController@CreateLocation', [$companyid, $branchid]);
            //return redirect()->action('ActivityController@CreateActivity');
        }
    }


    public function DeleteEmployee($companyid,$branchid,$employeeid  )
    {
        $AddactivityDBMod = app(LocationModel::class);
        $response = $AddactivityDBMod->DeleteEmployee($companyid,$branchid,$employeeid);

        if($response->status == "Y")
        {
            return redirect()->action('LocationController@LocationList', [$companyid, $branchid]);
        }
        else
        {
            return redirect()->action('LocationController@CreateLocation', [$companyid, $branchid]);
        }
    }


    public function EditPageEmployee($companyid,$branchid,$employeeid )
    {
        $StationListObject = app(LocationModel::class);
        $response = $StationListObject->EditPageEmployee($companyid,$branchid,$employeeid);
        //dd($response);
        if($response->status == "Y")
        {
            return View('EditPageEmployee')->with('EditPageEmployee', $response->response);
        }
        else
        {
            return redirect()->action('LocationController@CreateLocation');
        }
    }

    public function EditEmployee(Request $request )
    {
        $companyid = request('companyid');
        $branchid = request('branchid');

        $StationListObject = app(LocationModel::class);
        $response = $StationListObject->EditEmployee($request->input());
        //dd($response);
        if($response->status == "Y")
        {
            return redirect()->action('LocationController@LocationList', [$companyid, $branchid]);
        }
        else
        {
            return redirect()->action('LocationController@CreateLocation', [$companyid, $branchid]);
        }
    }

}

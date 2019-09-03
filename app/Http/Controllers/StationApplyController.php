<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

 use App\Models\StationApplyModel;
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
class StationApplyController extends Controller
{
	protected $token = null;
	public function __construct() 
	{		
		date_default_timezone_set("Asia/Karachi");
	}


	public function CheckStation(Request $request )
    {
        $stationapplyno = request('stationapplyno');
        $branchlocationid = request('branchlocationid');

        $AddactivityDBMod = app(StationApplyModel::class);
        $response = $AddactivityDBMod->CheckStation($request->input());
        return $response->status;

    }


	public function CreateStationApply($companyid,$branchid, $branchlocationid)
	{
            $StationListObject = app(StationModel::class);
            $response = $StationListObject->StationList();
            return view('CreateStationApply')->with('StationList', $response->response);
	}

    public function AddStationApplyDB(Request $request )
    {
        $companyid = request('companyid');
        $branchid = request('branchid');
        $branchlocationid = request('branchlocationid');
        //dd($request->input());
        $AddactivityDBMod = app(StationApplyModel::class);
        $response = $AddactivityDBMod->AddStationApplyDB($request->input());
        //dd($response->response);
        if($response->status == "Y")
        {
            //dd($stationid);
            return redirect()->action('StationApplyController@StationApplyList', [$companyid, $branchid, $branchlocationid]);
        }
        else
        {
            return redirect()->back()->with('messageForActivity', 'Fail To Add Activity .....!');
        }
    }

    public function StationApplyList($companyid,$branchid,$branchlocationid)
    {
        $ActivityListObject = app(StationApplyModel::class);
        $response = $ActivityListObject->StationApplyList($companyid,$branchid, $branchlocationid);
        //dd($response->response[0]->branchlocationname);
        //dd($response->status);
        //dd($response->response);

        if($response->status == "Y")
        {

            return View('StationApplyList', ['StationApplyList' => $response->response, 'branchlocationname' => $response->response[0]->branchlocationname ]);
        }
        else
        {
            return redirect()->action('StationApplyController@CreateStationApply', [$companyid, $branchid,$branchlocationid]);
            //return redirect()->action('ActivityController@CreateActivity');
        }
    }


    public function DeleteStationApply($companyid,$branchid,$branchlocationid, $stationapplyid)
    {
        $AddactivityDBMod = app(StationApplyModel::class);
        $response = $AddactivityDBMod->DeleteStationApply($companyid,$branchid,$branchlocationid, $stationapplyid);

        if($response->status == "Y")
        {
            return redirect()->action('StationApplyController@StationApplyList', [$companyid, $branchid,$branchlocationid]);
        }
        else
        {
            return redirect()->action('StationApplyController@CreateStationApply', [$companyid, $branchid,$branchlocationid]);
        }
    }


    public function EditPageStationApply($companyid,$branchid,$branchlocationid, $stationapplyid)
    {
        $StationListObject = app(StationApplyModel::class);
        $response = $StationListObject->EditPageStationApply($companyid,$branchid,$branchlocationid, $stationapplyid);
        //dd($response);

        $StationListObjectA = app(StationModel::class);
        $responseA = $StationListObjectA->StationList();


        if($response->status == "Y")
        {
            return View('EditPageStationApply', ['EditPageStationApply' => $response->response, 'StationList' => $responseA->response] );
        }
        else
        {
            return redirect()->action('StationApplyController@CreateStationApply', [$companyid, $branchid,$branchlocationid]);
        }
    }

    public function EditStationApply(Request $request )
    {
        $companyid = request('companyid');
        $branchid = request('branchid');
        $branchlocationid = request('branchlocationid');

        $StationListObject = app(StationApplyModel::class);
        $response = $StationListObject->EditStationApply($request->input());
        //dd($response);
        if($response->status == "Y")
        {
            return redirect()->action('StationApplyController@StationApplyList', [$companyid, $branchid,$branchlocationid]);
        }
        else
        {
            return redirect()->action('StationApplyController@CreateStationApply', [$companyid, $branchid,$branchlocationid]);
        }
    }

}

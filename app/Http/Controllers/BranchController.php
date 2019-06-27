<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

 use App\Models\ActivityModel;
 use Symfony\Component\HttpFoundation\Request;
 use App\Models\BranchModel;
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
class BranchController extends Controller
{
	protected $token = null;
	public function __construct() 
	{		
		date_default_timezone_set("Asia/Karachi");
	}

	public function CreateBranch( $companyid)
	{
            return view('CreateBranch');
	}

    public function AddBranchDB(Request $request )
    {

        $companyid = request('companyid');

        if(empty($branchname) & empty($branchlocation) & empty($branchaddress) & empty($companyid))
        {
            return ["status"=> 404 , "sendadvisor" => "Post data cannot be null"];
        }
        $AddactivityDBMod = app(BranchModel::class);
        $response = $AddactivityDBMod->AddBranchDB($request->input());
        if($response->status == "Y")
        {
            //dd($stationid);
            return redirect()->action('BranchController@BranchList', [$companyid]);
        }
        else
        {
            return redirect()->back()->with('messageForActivity', 'Fail To Add Activity .....!');
        }
    }

    public function BranchList($companyid )
    {
        $ActivityListObject = app(BranchModel::class);
        $response = $ActivityListObject->BranchList($companyid);
        //dd($response->response[0]->companyname);
        //dd($response->status);

        if($response->status == "Y")
        {

            return View('BranchList', ['BranchList' => $response->response, 'companyname' => $response->response[0]->companyname ]);
        }
        else
        {
            return redirect()->action('BranchController@CreateBranch', [$companyid]);
            //return redirect()->action('ActivityController@CreateActivity');
        }
    }


    public function DeleteBranch($companyid,$branchid )
    {
        $AddactivityDBMod = app(BranchModel::class);
        $response = $AddactivityDBMod->DeleteBranch($companyid,$branchid);

        if($response->status == "Y")
        {
            return redirect()->action('BranchController@BranchList', [$companyid]);
        }
        else
        {
            return redirect()->action('BranchController@CreateBranch', [$companyid]);
        }
    }


    public function EditPageBranch($companyid,$branchid )
    {
        $StationListObject = app(BranchModel::class);
        $response = $StationListObject->EditPageBranch($companyid,$branchid);
        //dd($response);
        if($response->status == "Y")
        {
            return View('EditPageBranch')->with('EditPageBranch', $response->response);
        }
        else
        {
            return redirect()->action('BranchController@CreateBranch');
        }
    }

    public function EditBranch(Request $request )
    {
        $companyid = request('companyid');

        $StationListObject = app(BranchModel::class);
        $response = $StationListObject->EditBranch($request->input());
        //dd($response);
        if($response->status == "Y")
        {
            return redirect()->action('BranchController@BranchList', [$companyid]);
        }
        else
        {
            return redirect()->action('BranchController@CreateBranch', [$companyid]);
        }
    }

}

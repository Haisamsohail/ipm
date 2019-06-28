<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

 use App\Models\EmployeeModel;
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
class EmployeeController extends Controller
{
	protected $token = null;
	public function __construct() 
	{		
		date_default_timezone_set("Asia/Karachi");
	}

	public function CreateEmployee($companyid,$branchid)
	{
            return view('CreateEmployee');
	}

    public function AddEmployeeDB(Request $request )
    {
        $companyid = request('companyid');
        $branchid = request('branchid');
        $AddactivityDBMod = app(EmployeeModel::class);
        $response = $AddactivityDBMod->AddEmployeeDB($request->input());
        if($response->status == "Y")
        {
            //dd($stationid);
            return redirect()->action('EmployeeController@EmployeeList', [$companyid, $branchid]);
        }
        else
        {
            return redirect()->back()->with('messageForActivity', 'Fail To Add Activity .....!');
        }
    }

    public function EmployeeList($companyid,$branchid )
    {
        $ActivityListObject = app(EmployeeModel::class);
        $response = $ActivityListObject->EmployeeList($companyid,$branchid);
        //dd($response->response[0]->branchname);
        //dd($response->status);

        if($response->status == "Y")
        {

            return View('EmployeeList', ['EmployeeList' => $response->response, 'branchname' => $response->response[0]->branchname ]);
        }
        else
        {
            return redirect()->action('EmployeeController@CreateEmployee', [$companyid, $branchid]);
            //return redirect()->action('ActivityController@CreateActivity');
        }
    }


    public function DeleteEmployee($companyid,$branchid,$employeeid  )
    {
        $AddactivityDBMod = app(EmployeeModel::class);
        $response = $AddactivityDBMod->DeleteEmployee($companyid,$branchid,$employeeid);

        if($response->status == "Y")
        {
            return redirect()->action('EmployeeController@EmployeeList', [$companyid, $branchid]);
        }
        else
        {
            return redirect()->action('EmployeeController@CreateEmployee', [$companyid, $branchid]);
        }
    }


    public function EditPageEmployee($companyid,$branchid,$employeeid )
    {
        $StationListObject = app(EmployeeModel::class);
        $response = $StationListObject->EditPageEmployee($companyid,$branchid,$employeeid);
        //dd($response);
        if($response->status == "Y")
        {
            return View('EditPageEmployee')->with('EditPageEmployee', $response->response);
        }
        else
        {
            return redirect()->action('EmployeeController@CreateEmployee');
        }
    }

    public function EditEmployee(Request $request )
    {
        $companyid = request('companyid');
        $branchid = request('branchid');

        $StationListObject = app(EmployeeModel::class);
        $response = $StationListObject->EditEmployee($request->input());
        //dd($response);
        if($response->status == "Y")
        {
            return redirect()->action('EmployeeController@EmployeeList', [$companyid, $branchid]);
        }
        else
        {
            return redirect()->action('EmployeeController@CreateEmployee', [$companyid, $branchid]);
        }
    }

}

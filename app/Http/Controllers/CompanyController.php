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
 use App\Models\CompanyModel;
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

	public function CreateCompany( )
	{
            $StationListObject = app(CompanyModel::class);
            $response = $StationListObject->IndustryList();
            return view('CreateCompany')->with('IndustryList', $response->response);
	}

    public function AddCompanyDB(Request $request )
    {
        $companyindustrytypeid = request('companyindustrytypeid');
        $companyname = request('companyname');
        $companyurl = request('companyurl');

        if(empty($companyindustrytypeid) & empty($companyname) & empty($companyurl))
        {
            return ["status"=> 404 , "sendadvisor" => "Post data cannot be null"];
        }
        $AddStation_Odject = app(CompanyModel::class);
        $response = $AddStation_Odject->AddCompanyDB($companyindustrytypeid, $companyname, $companyurl );
        if($response->status == "Y")
        {
            return redirect()->back()->with('messageForCompany', 'Company Added.....!');
        }
        else
        {
            return redirect()->back()->with('messageForCompany', 'Fail To Add Company .....!');
        }
    }

    public function CompanyList( )
    {
        $StationListObject = app(CompanyModel::class);
        $response = $StationListObject->CompanyList();
        //dd($response);
        if($response->status == "Y")
        {
            return View('CompanyList')->with('CompanyList', $response->response);
        }
        else
        {
            return redirect()->action('CompanyController@CreateCompany');
        }
    }


    public function DeleteCompany($companyid )
    {
        $StationListObject = app(CompanyModel::class);
        $response = $StationListObject->DeleteCompany($companyid);
        //dd($response->status);
        if($response->status == "Y")
        {
            return redirect()->action('CompanyController@CompanyList');
        }
        else
        {
            return redirect()->action('CompanyController@CreateCompany');
        }
    }


    public function EditPageCompany($companyid)
    {
        $StationListObject = app(CompanyModel::class);
        $response = $StationListObject->EditPageCompany($companyid);

        $IndustryListObject = app(CompanyModel::class);
        $responseIndustryList = $IndustryListObject->IndustryList();


        //dd($responseIndustryList);
        if($response->status == true)
        {
            return View('EditPageCompany', ['EditPageCompany' => $response->response, 'IndustryList' => $responseIndustryList->response ]);
        }
        else
        {
            return redirect()->action('CompanyController@CreateCompany');
        }
    }

    public function EditCompany(Request $request )
    {
        $companyname = request('companyname');
        $companyindustrytypeid = request('companyindustrytypeid');
        $companyid = request('companyid');
        $companyurl = request('companyurl');

        $StationListObject = app(CompanyModel::class);
        $response = $StationListObject->EditCompany($companyid, $companyname, $companyindustrytypeid, $companyurl);
        //dd($response);
        if($response->status == "Y")
        {
            return redirect()->action('CompanyController@CompanyList');
        }
        else
        {
            return redirect()->action('CompanyController@CreateCompany');
        }
    }

}

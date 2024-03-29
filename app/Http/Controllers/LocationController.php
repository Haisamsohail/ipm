<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

 use App\Models\LocationModel;
 use Mpdf\Mpdf;
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
use PDF;


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


    public function CheckBoxStationApplyDownload(Request $request )
    {
        $PageArray  = array();

        foreach ($request->input('CheckBoxStationApply') as $key =>$arr)
        {
//            $this->GenerateLabel($arr[0],$arr[1]);
            $arr = explode('/', $arr);
            //$this->GenerateLabel($arr[0],$arr[1]);

            $ActivityListObject = app(LocationModel::class);
            $response = $ActivityListObject->GenerateLabel($arr[0], $arr[1]);
            $data = ['title' => 'Welcome to HDTuto.com'];
            //$pdf = PDF::loadView('GenerateLabel', $data);
            //dd($response->response[0]->stationapplyid);

            if ($response->status == "Y")
            {

                $PageArray[$key][0] =  $response->response[0]->companyname;
                $PageArray[$key][1] =  $response->response[0]->branchlocationname;
                $PageArray[$key][2] =  $response->response[0]->stationname;
                $PageArray[$key][3] =  $response->response[0]->stationapplyid;
                $PageArray[$key][4] =  $response->response[0]->stationapplyno;
            }
        }

        $pdf = PDF::loadView('GenerateLabel', ['PageArray' => $PageArray], [], [
            'format' => [50.8, 50.8],
            'margin_left' => 1,
            'margin_right' => 1,
            'margin_top' => 1,
            'margin_bottom' => 1,
        ]);

//        echo "<PRE>";
//        dd($PageArray);
        //return $pdf->download('Stations.pdf');
        return $pdf->stream();
        //return $pdf->download($response->response[0]->stationapplyid.'Station.pdf');
    }



    public function GenerateLabel($companyid,$stationapplyid)
    {
        $PageArray  = array();
        //dd($companyid.'--'.$stationapplyid);
        $ActivityListObject = app(LocationModel::class);
        $response = $ActivityListObject->GenerateLabel($companyid,$stationapplyid);
        $data = ['title' => 'Welcome to HDTuto.com'];
        //$pdf = PDF::loadView('GenerateLabel', $data);
        //dd($response->response[0]->stationapplyid);

        if($response->status == "Y")
        {

            $PageArray[0][0] =  $response->response[0]->companyname;
            $PageArray[0][1] =  $response->response[0]->branchlocationname;
            $PageArray[0][2] =  $response->response[0]->stationname;
            $PageArray[0][3] =  $response->response[0]->stationapplyid;
            $PageArray[0][4] =  $response->response[0]->stationapplyno;

            $pdf = PDF::loadView('GenerateLabel', ['PageArray' => $PageArray],[], [
                'format' => [50.8, 50.8],
                'margin_left'          => 1,
                'margin_right'         => 1,
                'margin_top'           => 1,
                'margin_bottom'        => 1,
            ]);
            return $pdf->stream();
            //..    return $pdf->download($response->response[0]->stationapplyid.'Station.pdf');
        }
        else
        {
            return redirect()->action('LocationController@CreateLocation', [$companyid, $stationapplyid]);
        }
        //return $pdf->download('itsolutionstuff.pdf');
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


    public function BStation($companyid,$branchid )
    {
        $ActivityListObject = app(LocationModel::class);
        $response = $ActivityListObject->BStation($companyid,$branchid);
        //dd($response->response[0]->branchname);
        //dd($response->status);
        if($response->status == "Y")
        {

            return View('BStation', ['BStation' => $response->response, 'branchname' => $response->response[0]->branchname ]);
        }
        else
        {
            return redirect()->action('LocationController@CreateLocation', [$companyid, $branchid]);
            //return redirect()->action('ActivityController@CreateActivity');
        }
    }


    public function DeleteLocation($companyid,$branchid,$branchlocationid  )
    {
        $AddactivityDBMod = app(LocationModel::class);
        $response = $AddactivityDBMod->DeleteLocation($companyid,$branchid,$branchlocationid);

        if($response->status == "Y")
        {
            return redirect()->action('LocationController@LocationList', [$companyid, $branchid]);
        }
        else
        {
            return redirect()->action('LocationController@CreateLocation', [$companyid, $branchid]);
        }
    }


    public function EditPageLocation($companyid,$branchid,$branchlocationid )
    {
        $StationListObject = app(LocationModel::class);
        $response = $StationListObject->EditPageLocation($companyid,$branchid,$branchlocationid);
        //dd($response);
        if($response->status == "Y")
        {
            return View('EditPageLocation')->with('EditPageLocation', $response->response);
        }
        else
        {
            return redirect()->action('LocationController@CreateLocation');
        }
    }

    public function EditLocation(Request $request )
    {
        $companyid = request('companyid');
        $branchid = request('branchid');

        $StationListObject = app(LocationModel::class);
        $response = $StationListObject->EditLocation($request->input());
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

<?php
    /**
     * Created by PhpStorm.
     * User: haisamsohail
     * Date: 03/09/2019
     * Time: 5:59 PM
     */


    namespace App\Http\Controllers;

    use App\Comms\REST\Response;
    use App\Models\ActivityReportModel;
    use App\Models\CompanyModel;
    use App\Models\StationModel;
    use App\Models\ActivityModel;
    use Symfony\Component\HttpFoundation\Request;
    use App\Http\Controllers\Controller;

    use Illuminate\Foundation\Bus\DispatchesJobs;
    use Illuminate\Routing\Controller as BaseController;
    use Illuminate\Foundation\Validation\ValidatesRequests;
    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    use DB;
    use Session;

    class ActivityReportController extends Controller
    {
        protected $token = null;

        public function __construct()
        {
            date_default_timezone_set("Asia/Karachi");
        }

        public function HassanTest(Request $req)
        {
            echo "AAA" . $req->taskID;
        }


        public function APPInput()
        {
            $ActivityReportMod = app(ActivityReportModel::class);
            $response = $ActivityReportMod->APPInput();
            //dd($response);
            if ($response->status == "Y") {
                return View('APPInput', ['APPInput' => $response->response]);
                //.. return View('ActivityReport')->with('CompanyList', $response->response);
            } else {
                return redirect()->back()->with('messageForActivity', 'Failed .....!');
            }
        }


        public function ActivityReport()
        {
            $ChemicalMod = app(CompanyModel::class);
            $response = $ChemicalMod->CompanyList();

            $StationListObjectA = app(StationModel::class);
            $responseA = $StationListObjectA->StationList();
            //dd($response);
            if ($response->status == "Y") {
                return View('ActivityReport', ['CompanyList' => $response->response, 'StationList' => $responseA->response]);
                //.. return View('ActivityReport')->with('CompanyList', $response->response);
            } else {
                return redirect()->back()->with('messageForActivity', 'Failed .....!');
            }
        }

        public function SearchActivityReport(Request $request)
        {
            $chemicalname = request('chemicalname');
            if (empty($chemicalname)) {
                return ["status" => 404, "sendadvisor" => "Post data cannot be null"];
            }
            $SearchActivityReportMod = app(ActivityReportModel::class);
            $response = $SearchActivityReportMod->SearchActivityReport($request->input());
            if ($response->status == "Y") {
                //dd($stationid);
                return redirect()->action('ChemicalController@ChemicalList');
            } else {
                return redirect()->back()->with('messageForActivity', 'Fail To Add Chemical .....!');
            }
        }

        public function GetLocations(Request $request)
        {
            //dd($request->input());
            $ActivityReportModelObject = app(ActivityReportModel::class);
            $response = $ActivityReportModelObject->GetLocations($request->input());
            //dd($response);
            return $response->response;
        }

        public function SearchActivityReportData(Request $request)
        {
            //dd($request->input("daterange"));
            $Obj_ActivityReportModel = app(ActivityReportModel::class);
            $response = $Obj_ActivityReportModel->SearchActivityReportData($request->input());

            $ChemicalMod = app(CompanyModel::class);
            $responseCompanyList = $ChemicalMod->CompanyList();

            //dd($response->response);
            if ($response->status == "Y")
            {
                $DataIntoArray = array();
                $daterange = $request->input("daterange");
                //dd($response->response);
                $Start = 0;
                $StartCHeck = 1;
                $CompanyName = 0;
                $DataIntoArrayTemp = [];
                $CountActivityArrayIntoArray = [];
                $ProductHeading = array();

                foreach ($response->response as $StationListkey => $SingleStationID)
                {
                    //dd($SingleStationID->stationid);
                    $ActivityListMod = app(ActivityModel::class);
                    $ResponseActivityListObj = $ActivityListMod->ActivityList($SingleStationID->stationid);

                    foreach ($ResponseActivityListObj->response as $SingleActivityName)
                    {
                        $ProductHeading[$SingleStationID->stationid][$SingleActivityName->activityid]= $SingleActivityName->activityName;
                    }

                    $GetLocationsBaseonStationCompanyResponse = $Obj_ActivityReportModel->SearchActivityReportDataByLocAndStation($SingleStationID->stationid, $request->input("companyid"), $request->input("branchlocationid"));
                    //..    dd($GetLocationsBaseonStationCompanyResponse);
                    if ($GetLocationsBaseonStationCompanyResponse->status == "Y")
                    {
                        foreach ($GetLocationsBaseonStationCompanyResponse->response as $keyIn => $GetLocSatvalue)
                        {
                            $DataIntoArrayTemp[$GetLocationsBaseonStationCompanyResponse->response[$keyIn]->stationid][$GetLocationsBaseonStationCompanyResponse->response[$keyIn]->branchlocationid][] = [
                                $GetLocationsBaseonStationCompanyResponse->response[$keyIn]->stationid,
                                $GetLocationsBaseonStationCompanyResponse->response[$keyIn]->stationname,
                                $GetLocationsBaseonStationCompanyResponse->response[$keyIn]->branchlocationid,
                                $GetLocationsBaseonStationCompanyResponse->response[$keyIn]->branchlocationname,
                                $GetLocationsBaseonStationCompanyResponse->response[$keyIn]->companyname,
                                $GetLocationsBaseonStationCompanyResponse->response[$keyIn]->stationapplyno,
                                $GetLocationsBaseonStationCompanyResponse->response[$keyIn]->stationapplyid
                            ];

                            $stationid2 = $GetLocationsBaseonStationCompanyResponse->response[$keyIn]->stationid;
                            $stationapplyid2 = $GetLocationsBaseonStationCompanyResponse->response[$keyIn]->stationapplyid;
                            //..    dd($ProductHeading[$stationid2]);
                            $activityids =  array_keys($ProductHeading[$stationid2]);
                            //..    dd($activityids);
                            $TestArrayTemp[] = [$stationapplyid2,$activityids];
                            $ResponseActivityCountObj = $Obj_ActivityReportModel->DailyActicityCount($stationapplyid2,$activityids,$daterange);
                            //dd($ResponseActivityCountObj);

                            if(is_array($ResponseActivityCountObj->response))
                            {
                                foreach ($ResponseActivityCountObj->response as $KeyCount => $CountValue)
                                {
                                    $CountActivityArrayIntoArray[$stationapplyid2][$CountValue->activityid] = $CountValue->CounT;
                                }
                            }
                            //dd($CountActivityArrayIntoArray);


//                            echo "<pre>";print_r($CountActivityArrayIntoArray);echo "</pre>";die('Call');

                            $DataIntoArray[$Start][0] = $GetLocationsBaseonStationCompanyResponse->response[$keyIn]->stationid;
                            $DataIntoArray[$Start][1] = $GetLocationsBaseonStationCompanyResponse->response[$keyIn]->stationname;
                            $DataIntoArray[$Start][2] = $GetLocationsBaseonStationCompanyResponse->response[$keyIn]->branchlocationid;
                            $DataIntoArray[$Start][3] = $GetLocationsBaseonStationCompanyResponse->response[$keyIn]->branchlocationname;
                            $DataIntoArray[$Start][4] = $GetLocationsBaseonStationCompanyResponse->response[$keyIn]->companyname;
                            $DataIntoArray[$Start][5] = $GetLocationsBaseonStationCompanyResponse->response[$keyIn]->stationapplyno;
                            $DataIntoArray[$Start][6] = $GetLocationsBaseonStationCompanyResponse->response[$keyIn]->stationapplyid;
                            $CompanyName = $GetLocationsBaseonStationCompanyResponse->response[0]->companyname;;
                            $Start++;
                        }
                    }

                }
//
//                echo "<pre>";print_r($CountActivityArrayIntoArray);echo "</pre>";
//                die('Call');

//                Debugbar::info($CountActivityArrayIntoArray);
//                Debugbar::error('Error!');
//                Debugbar::warning('Watch out…');
//                Debugbar::addMessage('Another message', 'mylabel');
//                echo "<pre>";print_r($CountActivityArrayIntoArray);echo "</pre>";
//                die('Call');

//                echo "<pre>";print_r($TestArrayTemp);echo "</pre>";die('Call');
                return View('ActivityReport',
                    [
                        'CompanyList' => $responseCompanyList->response,
                        'StationListOnSearch' => $response->response,
                        'DataIntoArray' => $DataIntoArray,
                        'CompanyName' => $CompanyName,
                        'DataIntoArrayTemp' => $DataIntoArrayTemp,
                        'ProductHeading' => $ProductHeading,
                        'CountActivityArrayIntoArray' => $CountActivityArrayIntoArray
                    ]
                );
            } else {
                return View('ActivityReport', ['CompanyList' => $responseCompanyList->response, 'messageForActivity' => 'No Station Applied .....!']);
            }

            return $response->response;
        }
    }
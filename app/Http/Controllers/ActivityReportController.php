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
    use Symfony\Component\HttpFoundation\Request;
    use App\Http\Controllers\Controller;

    use Illuminate\Foundation\Bus\DispatchesJobs;
    use Illuminate\Routing\Controller as BaseController;
    use Illuminate\Foundation\Validation\ValidatesRequests;
    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    use DB;
    use Session;

    class ActivityReportController  extends Controller
    {
        protected $token = null;
        public function __construct()
        {
            date_default_timezone_set("Asia/Karachi");
        }

        public function HassanTest(Request $req)
        {
            echo "AAA".$req->taskID;
        }


        public function APPInput()
        {
            $ActivityReportMod = app(ActivityReportModel::class);
            $response = $ActivityReportMod->APPInput();
            //dd($response);
            if($response->status == "Y")
            {
                return View('APPInput', ['APPInput' => $response->response] );
                //.. return View('ActivityReport')->with('CompanyList', $response->response);
            }
            else
            {
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
            if($response->status == "Y")
            {
                return View('ActivityReport', ['CompanyList' => $response->response, 'StationList' => $responseA->response] );
                //.. return View('ActivityReport')->with('CompanyList', $response->response);
            }
            else
            {
                return redirect()->back()->with('messageForActivity', 'Failed .....!');
            }
        }

        public function SearchActivityReport(Request $request )
        {
            $chemicalname = request('chemicalname');
            if(empty($chemicalname))
            {
                return ["status"=> 404 , "sendadvisor" => "Post data cannot be null"];
            }
            $SearchActivityReportMod = app(ActivityReportModel::class);
            $response = $SearchActivityReportMod->SearchActivityReport($request->input());
            if($response->status == "Y")
            {
                //dd($stationid);
                return redirect()->action('ChemicalController@ChemicalList');
            }
            else
            {
                return redirect()->back()->with('messageForActivity', 'Fail To Add Chemical .....!');
            }
        }

        public function GetLocations(Request $request )
        {
            //dd($request->input());
            $ActivityReportModelObject = app(ActivityReportModel::class);
            $response = $ActivityReportModelObject->GetLocations($request->input());

            return $response->response;
        }

        public function SearchActivityReportData(Request $request )
        {
            //dd($request->input());
            $SearchActivityReportDataObject = app(ActivityReportModel::class);
            $response = $SearchActivityReportDataObject->SearchActivityReportData($request->input());

            $ChemicalMod = app(CompanyModel::class);
            $responseCompanyList = $ChemicalMod->CompanyList();

            //dd($response->response);
            if($response->status == "Y")
            {
                //return redirect()->back()->with(['StationListOnSearch' => $response->response, ]);

                return View('ActivityReport', ['CompanyList' => $responseCompanyList->response, 'StationListOnSearch' => $response->response ]);
            }
            else
                {
                    return View('ActivityReport', ['CompanyList' => $responseCompanyList->response,  'messageForActivity' => 'Not Station Applied .....!' ]);
                    //return redirect()->back()->with('messageForActivity', 'Not Station Applied .....!');
                }


            return $response->response;
        }
    }
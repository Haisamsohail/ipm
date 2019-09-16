<?php
    /**
     * Created by PhpStorm.
     * User: haisamsohail
     * Date: 03/09/2019
     * Time: 5:59 PM
     */


    namespace App\Http\Controllers;

    use App\Models\DilutionModel;
    use Symfony\Component\HttpFoundation\Request;
    use App\Http\Controllers\Controller;

    use Illuminate\Foundation\Bus\DispatchesJobs;
    use Illuminate\Routing\Controller as BaseController;
    use Illuminate\Foundation\Validation\ValidatesRequests;
    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    use DB;
    use Session;

    class DilutionController  extends Controller
    {
        protected $token = null;
        public function __construct()
        {
            date_default_timezone_set("Asia/Karachi");
        }

        public function CreateDilution()
        {
            return view('CreateDilution');
        }

        public function AddDilutionDB(Request $request )
        {
            $dilutionname = request('dilutionname');
            if(empty($dilutionname))
            {
                return ["status"=> 404 , "sendadvisor" => "Post data cannot be null"];
            }
            $DilutionMod = app(DilutionModel::class);
            $response = $DilutionMod->AddDilutionDB($request->input());
            if($response->status == "Y")
            {
                //dd($stationid);
                return redirect()->action('DilutionController@DilutionList');
            }
            else
            {
                return redirect()->back()->with('messageForActivity', 'Fail To Add Dilution .....!');
            }
        }

        public function DilutionList(Request $request)
        {
            $DilutionMod = app(DilutionModel::class);
            $response = $DilutionMod->DilutionList();
            //dd($response);
            if($response->status == "Y")
            {
                return View('DilutionList')->with('DilutionList', $response->response);
            }
            else
            {
                return redirect()->action('DilutionController@CreateDilution');
            }
        }


        public function DeleteDilution($dilutionid)
        {
            $DilutionMod = app(DilutionModel::class);
            $response = $DilutionMod->DeleteDilution($dilutionid);

            if($response->status == "Y")
            {
                return redirect()->action('DilutionController@DilutionList');
            }
            else
            {
                return redirect()->action('DilutionController@CreateDilution');
            }
        }


        public function EditPageDilution($dilutionid)
        {
            $StationListObject = app(DilutionModel::class);
            $response = $StationListObject->EditPageDilution($dilutionid);
            //dd($response);
            if($response->status == "Y")
            {
                return View('EditPageDilution')->with('EditPageDilution', $response->response);
            }
            else
            {
                return redirect()->action('DilutionController@CreateDilution');
            }
        }

        public function EditDilution(Request $request )
        {
            $StationListObject = app(DilutionModel::class);
            $response = $StationListObject->EditDilution($request->input());
            //dd($response);
            if($response->status == "Y")
            {
                return redirect()->action('DilutionController@DilutionList');
            }
            else
            {
                return redirect()->action('DilutionController@CreateDilution');
            }
        }
    }
<?php
    /**
     * Created by PhpStorm.
     * User: haisamsohail
     * Date: 03/09/2019
     * Time: 5:59 PM
     */


    namespace App\Http\Controllers;

    use App\Models\ChemicalModel;
    use Symfony\Component\HttpFoundation\Request;
    use App\Http\Controllers\Controller;

    use Illuminate\Foundation\Bus\DispatchesJobs;
    use Illuminate\Routing\Controller as BaseController;
    use Illuminate\Foundation\Validation\ValidatesRequests;
    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    use DB;
    use Session;

    class ChemicalController  extends Controller
    {
        protected $token = null;
        public function __construct()
        {
            date_default_timezone_set("Asia/Karachi");
        }

        public function CreateChemical()
        {
            return view('CreateChemical');
        }

        public function AddChemicalDB(Request $request )
        {
            $chemicalname = request('chemicalname');
            if(empty($chemicalname))
            {
                return ["status"=> 404 , "sendadvisor" => "Post data cannot be null"];
            }
            $ChemicalMod = app(ChemicalModel::class);
            $response = $ChemicalMod->AddChemicalDB($request->input());
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

        public function ChemicalList(Request $request)
        {
            $ChemicalMod = app(ChemicalModel::class);
            $response = $ChemicalMod->ChemicalList();
            //dd($response);
            if($response->status == "Y")
            {
                return View('ChemicalList')->with('ChemicalList', $response->response);
            }
            else
            {
                return redirect()->action('ChemicalController@CreateChemical');
            }
        }


        public function DeleteChemical($chemicalid)
        {
            $ChemicalMod = app(ChemicalModel::class);
            $response = $ChemicalMod->DeleteChemical($chemicalid);

            if($response->status == "Y")
            {
                return redirect()->action('ChemicalController@ChemicalList');
            }
            else
            {
                return redirect()->action('ChemicalController@CreateChemical');
            }
        }


        public function EditPageChemical($chemicalid)
        {
            $StationListObject = app(ChemicalModel::class);
            $response = $StationListObject->EditPageChemical($chemicalid);
            //dd($response);
            if($response->status == "Y")
            {
                return View('EditPageChemical')->with('EditPageChemical', $response->response);
            }
            else
            {
                return redirect()->action('ChemicalController@CreateChemical');
            }
        }

        public function EditChemical(Request $request )
        {
            $StationListObject = app(ChemicalModel::class);
            $response = $StationListObject->EditChemical($request->input());
            //dd($response);
            if($response->status == "Y")
            {
                return redirect()->action('ChemicalController@ChemicalList');
            }
            else
            {
                return redirect()->action('ChemicalController@CreateChemical');
            }
        }
    }
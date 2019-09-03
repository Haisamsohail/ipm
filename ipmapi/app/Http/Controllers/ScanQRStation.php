<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    namespace App\Http\Controllers;

    use App\Models\ActivityModel;
    use App\Models\ScanQRStationModel;
    use App\Models\StationModel;
    use App\Models\User;
    use Illuminate\Http\Request;
    /**
     * Description of UserController
     *
     * @author shahnawazkhan
     */
    class ScanQRStation
    {

        public function ScanQRStationActivity(Request $request)
        {
            $data = $request->getContent();
            $data = json_decode($data);
            //dd($data);
            try
            {
                $login = app(ScanQRStationModel::class);
                $responseCompanyDetail = $login->ScanQRGetCompanyDetail($data);

                $login = app(ScanQRStationModel::class);
                $responseStationActivity = $login->ScanQRStationActivity($data);

                //dd(count($response));
                if(count($responseCompanyDetail) > 0)
                {
                    return ["status" => "Y", "CompanyDetail" => $responseCompanyDetail, "StationActivity" => $responseStationActivity];
                }
                else
                {
                    return ["status" => "N", "response" => "No Activity"];
                }

            }
            catch (Exception $ex)
            {
                abort(500, 'Internal Server Error');
            }
        }


        public function DeleteStation(Request $request)
        {
            $data = $request->getContent();
            $data = json_decode($data);
            //dd($data);
            try
            {
                $login = app(StationModel::class);
                $response = $login->DeleteStation($data);
                //dd(($response));
                if($response > 0)
                {
                    return ["status" => "Y", "response" => "Deleted"];
                }
                else
                {
                    return ["status" => "N", "response" => "Not Deleted"];
                }

            }
            catch (Exception $ex)
            {
                abort(500, 'Internal Server Error');
            }
        }


        public function EditPageStation(Request $request)
        {
            $data = $request->getContent();
            $data = json_decode($data);
            //dd($data);
            try
            {
                $login = app(StationModel::class);
                $response = $login->EditPageStation($data);
                //dd(($response));
                if(count($response) > 0)
                {
                    return ["status" => "Y", "response" => $response];
                }
                else
                {
                    return ["status" => "N", "response" => "No Data"];
                }

            }
            catch (Exception $ex)
            {
                abort(500, 'Internal Server Error');
            }
        }


        public function EditStation(Request $request)
        {
            $data = $request->getContent();
            //dd($data);
            $data = json_decode($data);

            try
            {
                $login = app(StationModel::class);
                $response = $login->EditStation($data);
                //dd(($response));
                if($response == true)
                {
                    return ["status" => "Y", "response" => $response];
                }
                else
                {
                    return ["status" => "N", "response" => ""];
                }

            }
            catch (Exception $ex)
            {
                abort(500, 'Internal Server Error');
            }
        }
    }

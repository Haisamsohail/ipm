<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */
    namespace App\Models;
    use App\Models\Connection;
    /**
     * Description of User
     *
     * @author shahnawazkhan
     */
    class ScanQRStationModel extends Connection
    {

        public function ScanQRStationActivity($data)
        {
            //dd($data);
            //var_dump($data);
            $Query3 = "SELECT A.activityid AS activityid, A.activitytype AS activitytype, A.activityName AS activityName, A.activitydescription AS activitydescription FROM stationapply SA, activity A WHERE SA.stationapplyid = '{$data->ScanQRcode}' AND SA.stationid = A.stationid";
            //// dd($Query1);
            $results = app('db')->connection('hsl')->select($Query3);
            //dd($results);
            return $results;
        }

        public function ScanQRGetCompanyDetail($data)
        {
            //dd($data);
            //var_dump($data);
            $Query3 = "SELECT C.companyname AS companyname, B.branchname AS branchname, L.branchlocationname AS branchlocationname, S.stationname AS stationname, S.stationid AS stationid FROM company C, branch B, branchlocation L, stationapply SA, station S WHERE SA.stationapplyid = '{$data->ScanQRcode}' AND SA.stationid = S.stationid AND SA.branchlocationid = L.branchlocationid AND L.branchid = B.branchid AND B.companyid = C.companyid";
            //// dd($Query1);
            $results = app('db')->connection('hsl')->select($Query3);
            //dd($results);
            return $results;
        }

        public function DeleteStation($data)
        {
            $Query4 = "UPDATE station SET stationactive = 'N' WHERE stationid = '{$data->stationid}'";
            //dd($Query4);
            $results = app('db')->connection('hsl')->update($Query4);
            //dd($results);
            return $results;
        }


        public function EditPageStation($data)
        {
            $Query3 = "SELECT * FROM station WHERE stationactive = 'Y' AND stationid = '{$data->stationid}'";
            //dd($Query3);
            $results = app('db')->connection('hsl')->select($Query3);
            //dd($results);
            return $results;
        }


        public function EditStation($data)
        {
            $Query4 = "UPDATE station SET stationname = '{$data->stationname}', stationdescription = '{$data->stationdescription}' WHERE stationid = '{$data->stationid}'";
            //dd($Query4);
            $results = app('db')->connection('hsl')->update($Query4);
            //dd($results);
            return $results;
        }
    }

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
class StationApplyModel extends Connection
{
	//put your code here
    public function CheckStation($data )
    {
        $Query3 = "SELECT * FROM stationapply A WHERE A.stationapplyno = '{$data->stationapplyno}' AND A.branchlocationid = '{$data->branchlocationid}' AND A.stationapplyactive = 'Y'";
        //dd($Query3);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }

    public function AddStationApplyDB($data)
	{
		$Query2 = "INSERT INTO stationapply (stationapplyno, stationid, branchlocationid, createduserby) 
                    VALUES ('{$data->stationapplyno}', '{$data->stationid}', '{$data->branchlocationid}',103 )";
       //// dd($Query1);
		$results = app('db')->connection('hsl')->insert($Query2);
		//dd($results);
        return $results;
	}

    public function StationApplyList($data )
    {
        $Query3 = "SELECT L.branchlocationname AS branchlocationname, A.stationapplyid AS stationapplyid, A.stationapplyno AS stationapplyno, A.stationid AS stationid, A.branchlocationid AS branchlocationid, S.stationname AS stationname FROM branchlocation L, station S, stationapply A WHERE A.stationid = S.stationid AND A.branchlocationid = L.branchlocationid AND A.stationapplyactive = 'Y' AND A.branchlocationid =  '{$data->branchlocationid}'";
        //dd($Query3);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }

    public function DeleteStationApply($data)
    {
        $Query4 = "UPDATE  stationapply SET stationapplyactive = 'N' WHERE stationapplyid = '{$data->stationapplyid}'";
        //dd($Query4);
        $results = app('db')->connection('hsl')->update($Query4);
        //dd($results);
        return $results;
    }

    public function EditPageStationApply($data)
    {
        $Query3 = "SELECT * FROM  stationapply WHERE stationapplyactive = 'Y' AND stationapplyid = '{$data->stationapplyid}'";
        //dd($Query3);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }

    public function EditStationApply($data)
    {
        $Query4 = "UPDATE stationapply SET stationapplyno = '{$data->stationapplyno}', stationid = '{$data->stationid}' WHERE stationapplyid = '{$data->stationapplyid}'";
        //dd($Query4);
        $results = app('db')->connection('hsl')->update($Query4);
        //dd($results);
        return $results;
    }
}

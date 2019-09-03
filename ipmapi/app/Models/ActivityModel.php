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
class ActivityModel extends Connection
{
	//put your code here
	public function AddactivityDB($data)
	{
		$Query2 = "INSERT INTO activity (activitytype, activityName, activitydescription, stationid, createduserby) 
                    VALUES ('{$data->activitytype}', '{$data->activityName}', '{$data->activitydescription}', '{$data->stationid}', 101)";
       //// dd($Query1);
		$results = app('db')->connection('hsl')->insert($Query2);
		//dd($results);
        return $results;
	}

    public function ActivityList($data )
    {
        $Query3 = "SELECT A.activityid AS activityid, A.activitytype AS activitytype, A.activityName AS activityName, A .activitydescription AS activitydescription, A.stationid AS stationid, S.stationname AS stationname FROM activity A, station S WHERE A.stationid = S.stationid AND activityactive = 'Y' AND A.stationid = '{$data->stationid}'";
        //dd($Query3);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }

    public function DeleteActivity($data)
    {
        $Query4 = "UPDATE activity SET activityactive = 'N' WHERE activityid = '{$data->activityid}'";
        //dd($Query4);
        $results = app('db')->connection('hsl')->update($Query4);
        //dd($results);
        return $results;
    }

    public function EditPageActivity($data)
    {
        $Query3 = "SELECT * FROM activity WHERE activityactive = 'Y' AND activityid = '{$data->activityid}'";
        //dd($Query3);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }

    public function EditActivity($data)
    {
        $Query4 = "UPDATE activity SET activitytype = '{$data->activitytype}', activityName = '{$data->activityName}', activitydescription = '{$data->activitydescription}' WHERE activityid = '{$data->activityid}'";
        //dd($Query4);
        $results = app('db')->connection('hsl')->update($Query4);
        //dd($results);
        return $results;
    }
}

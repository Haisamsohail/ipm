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
class StationModel extends Connection
{
	//put your code here
	public function AddStation($data)
	{
		$Query2 = "INSERT INTO station (stationname, stationdescription, createduserby) 
                    VALUES ('{$data->stationname}', '{$data->stationdescription}', 101)";
       //// dd($Query1);
		$results = app('db')->connection('hsl')->insert($Query2);
		//dd($results);
        return $results;
	}

    public function StationList()
    {
        $Query3 = "SELECT * FROM station WHERE stationactive = 'Y'";
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

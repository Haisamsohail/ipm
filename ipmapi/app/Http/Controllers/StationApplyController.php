<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\ActivityModel;
use App\Models\StationApplyModel;
use Illuminate\Http\Request;
/**
 * Description of UserController
 *
 * @author shahnawazkhan
 */
class StationApplyController
{
	//put your code here

    public function CheckStation(Request $request)
    {
        $data = $request->getContent();
        $data = json_decode($data);
        if(empty($data))
        {
            return ["status"=> 404 , "message" => "Post data cannot be null"];
        }
        try
        {
            $login = app(StationApplyModel::class);
            $response = $login->CheckStation($data);
            //dd(($response));
            //dd(count($response));
            //dd(($response[0]->userid));
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



    public function AddStationApplyDB(Request $request)
	{
		$data = $request->getContent();
		$data = json_decode($data);
		if(empty($data))
		{
			return ["status"=> 404 , "message" => "Post data cannot be null"];
		}
		try
		{
			$login = app(StationApplyModel::class);
			$response = $login->AddStationApplyDB($data);
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

    public function StationApplyList(Request $request)
    {
        $data = $request->getContent();
        $data = json_decode($data);
        //dd($data);
       try
        {
            $login = app(StationApplyModel::class);
            $response = $login->StationApplyList($data );
            //dd(count($response));
            if(count($response) > 0)
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


    public function DeleteStationApply(Request $request)
    {
        $data = $request->getContent();
        $data = json_decode($data);
        //dd($data);
        try
        {
            $login = app(StationApplyModel::class);
            $response = $login->DeleteStationApply($data);
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

    public function EditPageStationApply(Request $request)
    {
        $data = $request->getContent();
        $data = json_decode($data);
        //dd($data);
        try
        {
            $login = app(StationApplyModel::class);
            $response = $login->EditPageStationApply($data);
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

    public function EditStationApply(Request $request)
    {
        $data = $request->getContent();
        //dd($data);
        $data = json_decode($data);

        try
        {
            $login = app(StationApplyModel::class);
            $response = $login->EditStationApply($data);
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

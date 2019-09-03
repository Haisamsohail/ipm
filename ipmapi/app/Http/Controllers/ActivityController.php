<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\ActivityModel;
use App\Models\User;
use Illuminate\Http\Request;
/**
 * Description of UserController
 *
 * @author shahnawazkhan
 */
class ActivityController
{
	//put your code here
	
	public function AddactivityDB(Request $request)
	{
		$data = $request->getContent();
		$data = json_decode($data);
		//dd($data);
		// $path = base_path('public\api_log.log');
		// ini_set("error_log",  $path);
		// error_log("==================".print_r($data));
		if(empty($data))
		{
			return ["status"=> 404 , "message" => "Post data cannot be null"];
		}
		
		try
		{
			$login = app(ActivityModel::class);
			$response = $login->AddactivityDB($data);
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

    public function ActivityList(Request $request)
    {
        $data = $request->getContent();
        $data = json_decode($data);
       try
        {
            $login = app(ActivityModel::class);
            $response = $login->ActivityList($data );
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


    public function DeleteActivity(Request $request)
    {
        $data = $request->getContent();
        $data = json_decode($data);
        //dd($data);
        try
        {
            $login = app(ActivityModel::class);
            $response = $login->DeleteActivity($data);
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

    public function EditPageActivity(Request $request)
    {
        $data = $request->getContent();
        $data = json_decode($data);
        //dd($data);
        try
        {
            $login = app(ActivityModel::class);
            $response = $login->EditPageActivity($data);
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

    public function EditActivity(Request $request)
    {
        $data = $request->getContent();
        //dd($data);
        $data = json_decode($data);

        try
        {
            $login = app(ActivityModel::class);
            $response = $login->EditActivity($data);
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

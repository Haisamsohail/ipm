<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
//use Session;

//use Session;
/**
 * Description of UserController
 *
 * @author shahnawazkhan
 */
class UserController 
{
	//put your code here
	
	public function login(Request $request) 
	{
		//dd('hsl');
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
			
			$login = app(User::class);
			$response = $login->login($data);
			//dd(count($response));
            //dd(($response[0]->userid));

            if(count ($response) > 0)
			{
                //dd(Session::all()['userid']);
                //$request->session()->put('userid', $response[0]->userid);
                //Session::set('userid', $response[0]->userid);
				return ["status" => "Y", "response" => $response];
			}
			else
			{
                //return redirect()->back()->with('message', 'Invalid credentials!');
				return ["status" => "N", "response" => "Invalid credentials!"];
			}
			
		} 
		catch (Exception $ex) 
		{
			abort(500, 'Internal Server Error');
		}
	}
}

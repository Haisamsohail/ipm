<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

 use Symfony\Component\HttpFoundation\Request;
 use App\Models\UserLogin;
 use App\Http\Controllers\Controller;
// use App\Http\HttpClientCommunication;



use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Session;

/**
 * Description of MainController
 *
 * @author Haisam
 */
class MainController extends Controller
{
	protected $token = null;
	public function __construct() 
	{		
		date_default_timezone_set("Asia/Karachi");
	}
	public function login(Request $request) 
	{
		//dd($request->session()->exists('userEmail') && $request->session()->exists('userPassword'));
		//dd(Session::get('userId'));
		if ($request->session()->has('userId')) 
		{
            return view('welcome');
            //return redirect()->action('HomeController@home', ['login' => 'sessionFound']);
		}
		else
		{
			return view('login');	
		}
		
	}
	
	public function userlogin(Request $request)
	{	
		$userEmail = request('username');
		$userPassword = request('password');
		if(empty($userEmail) & empty($userEmail))
		{
			return ["status"=> 404 , "sendadvisor" => "Post data cannot be null"];
		}

		$userLogin = app(UserLogin::class);
		$response = $userLogin->login($userEmail, $userPassword);
        dd($response);

		if(!empty($response))
		{	
			$request->session()->put('userid', $response[0]->userid);
			//Session::set('userid', $response[0]->userid);
            return view('welcome');
		}
		else
		{
			$request->session()->flush();
			return redirect()->back()->with('message', 'Invalid credentials!');
			//return redirect()->action('MainController@login', ['login' => 'error']);
		}
		//... dd($response);
	}
	
	public function logout(Request $request) 
	{
		$request->session()->flush();
		return redirect()->action('MainController@login', ['logout' => 'successfully']);
	}
}

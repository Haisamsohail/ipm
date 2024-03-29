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
        $userid = "";
        if (Session::has('userid'))
        {
            $userid  = Session::all()['userid'];
        }

        //dd($value);
		//dd($request->session()->exists('userEmail') && $request->session()->exists('userPassword'));
		//dd(Session::get('userId'));
		if ($userid !=null)
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
        //dd($userEmail);
		if(empty($userEmail) & empty($userEmail))
		{
			return ["status"=> 404 , "sendadvisor" => "Post data cannot be null"];
		}



		$userLogin = app(UserLogin::class);
		//	dd($userEmail, $userPassword);

		$response = $userLogin->login($userEmail, $userPassword);
        //dd($response->status);
        //dd(gettype($response));
        //dd($response->response[0]->userid);

		if($response->status != "N")
		{
			$request->session()->put('userid', $response->response[0]->userid);
			//Session::set('userid', $response[0]->userid);
            //return redirect()->route('welcome');
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
	
	public function Logout(Request $request)
	{
	    //dd("sdfj");
		$request->session()->flush();
		return redirect()->action('MainController@login', ['logout' => 'successfully']);
	}

//    public function welcome(Request $request)
//    {
//        return view('welcome');
//    }
}

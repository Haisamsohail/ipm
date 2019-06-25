<?php
namespace App\Models;
use App\Models\Connection;
use DB;
use App\Http\HttpClientCommunication;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserLogin
 *
 * @author haisamsohail
 */
class UserLogin extends Connection
{
	const END_POINT_USER = 'user/';
    public function __construct()
    {
            parent::__construct();
    }
//    public function login($userEmail, $userPassword) 
//    {
//        // $CheckLogin = DB::table('users')->where(['username' => $userEmail, 'userpassword' => $userPassword])->get();
//        // return $CheckLogin;
//        //...   dd($userEmail, $userPassword);
//        $Query1 = "SELECT * FROM users U WHERE U.username = '{$userEmail}' AND U.userpassword = '{$userPassword}'";
//        //dd($Query1);
//        return $this->intranet->select($Query1);
//    }
	
	public function login($userEmail, $userPassword)
	{
		$data = array('userEmail' => $userEmail, 'userPassword' => $userPassword);
		//dd($data);
		$login = app(HttpClientCommunication::class);
		//dd($login);

		$response = $login->storeData(self::END_POINT_USER."login", $data, true);
		//dd($response);
		//$array =  (array) $response;
		//dd(gettype($array));
		return $response->body();
		
	}
}

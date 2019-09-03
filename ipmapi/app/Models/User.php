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
class User extends Connection
{
	//put your code here
	public function login($data) 
	{
		$Query1 = "SELECT * FROM users U WHERE U.username = '{$data->userEmail}' AND U.userpassword = '{$data->userPassword}'";
       //// dd($Query1);
		$results = app('db')->connection('hsl')->select($Query1);
		//dd($results);
        return $results;
	}
}

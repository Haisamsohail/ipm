<?php
namespace App\Models;
use App\Models\Connection;
use DB;
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
    public function __construct()
    {
            parent::__construct();
    }
    public function login($userEmail, $userPassword) 
    {
        // $CheckLogin = DB::table('users')->where(['username' => $userEmail, 'userpassword' => $userPassword])->get();
        // return $CheckLogin;
        //...   dd($userEmail, $userPassword);
        $Query1 = "SELECT * FROM users U WHERE U.username = '{$userEmail}' AND U.userpassword = '{$userPassword}'";
        //dd($Query1);
        return $this->intranet->select($Query1);
    }
}

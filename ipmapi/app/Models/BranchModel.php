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
class BranchModel extends Connection
{
	//put your code here
	public function AddBranchDB($data)
	{
		$Query2 = "INSERT INTO branch (branchname, branchlocation, branchaddress, branchphone, branchemail, companyid, createduserby )  VALUES ('{$data->branchname}', '{$data->branchlocation}', '{$data->branchaddress}', '{$data->branchphone}','{$data->branchemail}' , '{$data->companyid}' ,101)";
       //// dd($Query1);
		$results = app('db')->connection('hsl')->insert($Query2);
		//dd($results);
        return $results;
	}

    public function BranchList($data )
    {
        $Query3 = "SELECT B.branchid AS branchid, B.branchname AS branchname, B.branchlocation AS branchlocation, B.branchaddress AS branchaddress, B.branchphone AS branchphone, B.branchemail AS branchemail, B.companyid AS companyid, C.companyname AS companyname FROM company C, branch B WHERE B.companyid = C.companyid AND B.branchactive = 'Y' AND C.companyid = '{$data->companyid}'";
        //dd($Query3);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }

    public function DeleteBranch($data)
    {
        $Query4 = "UPDATE branch SET branchactive = 'N' WHERE branchid = '{$data->branchid}'";
        //dd($Query4);
        $results = app('db')->connection('hsl')->update($Query4);
        //dd($results);
        return $results;
    }

    public function EditPageBranch($data)
    {
        $Query3 = "SELECT * FROM branch WHERE branchactive = 'Y' AND branchid = '{$data->branchid}'";
        //dd($Query3);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }

    public function EditBranch($data)
    {
        $Query4 = "UPDATE  branch SET branchname = '{$data->branchname}', branchlocation = '{$data->branchlocation}', branchaddress = '{$data->branchaddress}' , branchphone = '{$data->branchphone}' , branchemail = '{$data->branchemail}' WHERE branchid = '{$data->branchid}'";
        //dd($Query4);
        $results = app('db')->connection('hsl')->update($Query4);
        //dd($results);
        return $results;
    }
}

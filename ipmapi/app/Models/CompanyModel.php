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
class CompanyModel extends Connection
{
	//put your code here

    public function IndustryList()
    {
        $Query3 = "SELECT * FROM industrytype WHERE industrytypeactive = 'Y'";
        //// dd($Query1);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }



    public function AddCompany($data)
	{
		$Query2 = "INSERT INTO company (companyname, companyindustrytypeid, companyurl, createduserby) 
                    VALUES ('{$data->companyname}', '{$data->companyindustrytypeid}', '{$data->companyurl}', 101)";
       //// dd($Query1);
		$results = app('db')->connection('hsl')->insert($Query2);
		//dd($results);
        return $results;
	}

    public function CompanyList()
    {
        $Query3 = "SELECT C.companyid AS companyid, C.companyname AS companyname, I.industrytypename AS industrytypename FROM company C, industrytype I WHERE C.companyindustrytypeid = I.industrytypeid AND C.companyactive = 'Y'";
        //// dd($Query1);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }

    public function DeleteCompany($data)
    {
        $Query4 = "UPDATE company SET companyactive = 'N' WHERE companyid = '{$data->companyid}'";
        //dd($Query4);
        $results = app('db')->connection('hsl')->update($Query4);
        //dd($results);
        return $results;
    }


    public function EditPageCompany($data)
    {
        $Query3 = "SELECT * FROM company C WHERE C.companyactive = 'Y' AND C.companyid = '{$data->companyid}'";
        //dd($Query3);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }


    public function EditCompany($data)
    {
        $Query4 = "UPDATE company SET companyname = '{$data->companyname}', companyindustrytypeid = '{$data->companyindustrytypeid}', companyurl = '{$data->companyurl}' WHERE companyid = '{$data->companyid}'";
        //dd($Query4);
        $results = app('db')->connection('hsl')->update($Query4);
        //dd($results);
        return $results;
    }
}

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
class EmployeeModel extends Connection
{
	//put your code here
	public function AddEmployeeDB($data)
	{
		$Query2 = "INSERT INTO employee (employeename, employeedesignation, employeephone, employeeemail, branchid, createduserby) 
                    VALUES ('{$data->employeename}', '{$data->employeedesignation}', '{$data->employeephone}', '{$data->employeeemail}', '{$data->branchid}', 103 )";
       //// dd($Query1);
		$results = app('db')->connection('hsl')->insert($Query2);
		//dd($results);
        return $results;
	}

    public function EmployeeList($data )
    {
        $Query3 = "SELECT B.branchname AS branchname, E.employeeid AS employeeid, E.employeename AS employeename, E.employeedesignation AS employeedesignation, E.employeephone AS employeephone, E.employeeemail AS employeeemail FROM branch B, employee E WHERE B.branchid = E.branchid AND E.employeeactive = 'Y' AND E.branchid = '{$data->branchid}'";
        //dd($Query3);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }

    public function DeleteEmployee($data)
    {
        $Query4 = "UPDATE  employee SET employeeactive = 'N' WHERE employeeid = '{$data->employeeid}'";
        //dd($Query4);
        $results = app('db')->connection('hsl')->update($Query4);
        //dd($results);
        return $results;
    }

    public function EditPageEmployee($data)
    {
        $Query3 = "SELECT * FROM  employee WHERE employeeactive = 'Y' AND employeeid = '{$data->employeeid}'";
        //dd($Query3);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }

    public function EditEmployee($data)
    {
        $Query4 = "UPDATE employee SET employeename = '{$data->employeename}', employeedesignation = '{$data->employeedesignation}', employeephone = '{$data->employeephone}', employeeemail = '{$data->employeeemail}' WHERE employeeid = '{$data->employeeid}'";
        //dd($Query4);
        $results = app('db')->connection('hsl')->update($Query4);
        //dd($results);
        return $results;
    }
}

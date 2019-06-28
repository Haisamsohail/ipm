<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@login');
Route::post('/userlogin', 'MainController@userlogin');
Route::get('/Logout', 'MainController@Logout');

//Route::get('/CreateActivity', 'ActivityController@CreateActivity');
//Route::post('/AddactivityDB', 'ActivityController@AddactivityDB');
//Route::get('/ActivityList', 'ActivityController@ActivityList');
//Route::get('/DeleteActivity/{activityid}', 'ActivityController@DeleteActivity');


/********** Create Station Start ***************************/
Route::get('/CreateStation', 'StationController@CreateStation');
Route::post('/AddStationDB', 'StationController@AddStationDB');
Route::get('/StationList', 'StationController@StationList');
Route::get('/DeleteStation/{stationid}', 'StationController@DeleteStation');
Route::get('/EditPageStation/{stationid}', 'StationController@EditPageStation');
Route::post('/EditStation', 'StationController@EditStation');
/********** Create Station End   ***************************/



/********** Create Activity Start ***************************/
Route::get('/ActivityList/{stationid}', 'ActivityController@ActivityList');
Route::get('/DeleteActivity/{stationid}/{activityid}', 'ActivityController@DeleteActivity');
Route::get('/CreateActivity/{stationid}', 'ActivityController@CreateActivity');
Route::post('/AddactivityDB', 'ActivityController@AddactivityDB');
Route::get('/EditPageActivity/{stationid}/{activityid}', 'ActivityController@EditPageActivity');
Route::post('/EditActivity', 'ActivityController@EditActivity');
//Route::get('/CreateActivity', 'ActivityController@CreateActivity');
//Route::get('/CreateStation', 'StationController@CreateStation');
/********** Create Activity End   ***************************/




/********** Create Company Start ***************************/
Route::get('/CreateCompany', 'CompanyController@CreateCompany');
Route::post('/AddCompanyDB', 'CompanyController@AddCompanyDB');
Route::get('/CompanyList', 'CompanyController@CompanyList');
Route::get('/DeleteCompany/{companyid}', 'CompanyController@DeleteCompany');
Route::get('/EditPageCompany/{companyid}', 'CompanyController@EditPageCompany');
Route::post('/EditCompany', 'CompanyController@EditCompany');

/********** Create Company End   ***************************/


/********** Create Branch Start ***************************/
Route::get('/BranchList/{companyid}', 'BranchController@BranchList');
Route::get('/CreateBranch/{companyid}', 'BranchController@CreateBranch');
Route::post('/AddBranchDB', 'BranchController@AddBranchDB');
Route::get('/DeleteBranch/{companyid}/{branchid}', 'BranchController@DeleteBranch');
Route::get('/EditPageBranch/{companyid}/{branchid}', 'BranchController@EditPageBranch');
Route::post('/EditBranch', 'BranchController@EditBranch');
/********** Create Branch End   ***************************/

/********** Create Employee Start ***************************/
Route::get('/EmployeeList/{companyid}/{branchid}', 'EmployeeController@EmployeeList');
Route::get('/CreateEmployee/{companyid}/{branchid}', 'EmployeeController@CreateEmployee');
Route::post('/AddEmployeeDB', 'EmployeeController@AddEmployeeDB');
$router->get('/DeleteEmployee/{companyid}/{branchid}/{employeeid}', 'EmployeeController@DeleteEmployee');
Route::get('/EditPageEmployee/{companyid}/{branchid}/{employeeid}', 'EmployeeController@EditPageEmployee');
Route::post('/EditEmployee', 'EmployeeController@EditEmployee');
/********** Create Employee End   ***************************/

/********** Create Location Start ***************************/
Route::get('/LocationList/{companyid}/{branchid}', 'LocationController@LocationList');
Route::get('/CreateLocation/{companyid}/{branchid}', 'LocationController@CreateLocation');
Route::post('/AddLocationDB', 'LocationController@AddLocationDB');
$router->get('/DeleteEmployee/{companyid}/{branchid}/{employeeid}', 'EmployeeController@DeleteEmployee');
/********** Create Location End   ***************************/



Route::group(['middleware' => ['FindingSession','api']], function ()
{
//    Route::get('/welcome', function () {
//        return view('welcome');
//    });
    Session::flush();
    Route::get('/welcome', 'MainController@welcome');
});

// Route::get('/', function () {
//     return view('welcome');
// });

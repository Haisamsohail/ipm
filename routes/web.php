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
Route::get('/BStation/{companyid}/{branchid}', 'LocationController@BStation');
Route::get('/GenerateLabel/{companyid}/{stationapplyid}', 'LocationController@GenerateLabel');
Route::post('/CheckBoxStationApplyDownload', 'LocationController@CheckBoxStationApplyDownload');
//Route::get('/GenerateLabel', 'LocationController@GenerateLabel');
Route::get('/CreateLocation/{companyid}/{branchid}', 'LocationController@CreateLocation');
Route::post('/AddLocationDB', 'LocationController@AddLocationDB');
$router->get('/DeleteLocation/{companyid}/{branchid}/{branchlocationid}', 'LocationController@DeleteLocation');
Route::get('/EditPageLocation/{companyid}/{branchid}/{branchlocationid}', 'LocationController@EditPageLocation');
Route::post('/EditLocation', 'LocationController@EditLocation');
/********** Create Location End   ***************************/



/********** Create Station Start ***************************/
Route::get('/StationApplyList/{companyid}/{branchid}/{branchlocationid}', 'StationApplyController@StationApplyList');
$router->get('/DeleteStationApply/{companyid}/{branchid}/{branchlocationid}/{stationapplyid}', 'StationApplyController@DeleteStationApply');
Route::get('/CreateStationApply/{companyid}/{branchid}/{branchlocationid}', 'StationApplyController@CreateStationApply');
Route::post('/CheckStation', 'StationApplyController@CheckStation');
Route::post('/AddStationApplyDB', 'StationApplyController@AddStationApplyDB');
Route::get('/EditPageStationApply/{companyid}/{branchid}/{branchlocationid}/{stationapplyid}', 'StationApplyController@EditPageStationApply');
Route::post('/EditStationApply', 'StationApplyController@EditStationApply');
Route::get('qrcode', function () {
    return QrCode::size(300)->generate('A basic example of QR code!');
});
/********** Create Station End   ***************************/






/********** Create Chemical Start ***************************/
Route::get('/CreateChemical', 'ChemicalController@CreateChemical');
Route::post('/AddChemicalDB', 'ChemicalController@AddChemicalDB');
Route::get('/ChemicalList', 'ChemicalController@ChemicalList');
Route::get('/DeleteChemical/{chemicalid}', 'ChemicalController@DeleteChemical');
Route::get('/EditPageChemical/{chemicalid}', 'ChemicalController@EditPageChemical');
Route::post('/EditChemical', 'ChemicalController@EditChemical');
/********** Create Chemical End   ***************************/


/********** Create Dilution Start ***************************/
Route::get('/CreateDilution', 'DilutionController@CreateDilution');
Route::post('/AddDilutionDB', 'DilutionController@AddDilutionDB');
Route::get('/DilutionList', 'DilutionController@DilutionList');
Route::get('/DeleteDilution/{dilutionid}', 'DilutionController@DeleteDilution');
Route::get('/EditPageDilution/{dilutionid}', 'DilutionController@EditPageDilution');
Route::post('/EditDilution', 'DilutionController@EditDilution');
/********** Create Dilution End   ***************************/




    /********** Create Reports Start ***************************/
    Route::get('/APPInput', 'ActivityReportController@APPInput');
    Route::get('/ActivityReport', 'ActivityReportController@ActivityReport');
    Route::get('/SearchActivityReport', 'ActivityReportController@SearchActivityReport');
    Route::post('/SearchActivityReportData', 'ActivityReportController@SearchActivityReportData');
    Route::post('/HassanTest', 'ActivityReportController@HassanTest');
    Route::post('/GetLocations', 'ActivityReportController@GetLocations');
    Route::post('/SearchActivityReportDataByLocAndStation', 'ActivityReportController@SearchActivityReportDataByLocAndStation');
    Route::get('/DailyActicityCount', 'ActivityReportController@DailyActicityCount');



    /********** Create Reports End   ***************************/



Route::group(['middleware' => ['FindingSession','api']], function ()
{
    Session::flush();
    Route::get('/welcome', 'MainController@welcome');
});

// Route::get('/', function () {
//     return view('welcome');
// });

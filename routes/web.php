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
//Route::get('/CreateActivity', 'ActivityController@CreateActivity');
//Route::get('/CreateStation', 'StationController@CreateStation');
/********** Create Activity End   ***************************/


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

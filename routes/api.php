<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['middleware'=>'jwt.auth'],function(){

});


Route::resource('/v1/mereks', 'MerekAPIController');

Route::resource('/v1/tipes', 'TipeAPIController');

Route::resource('/v1/wilayahs', 'WilayahAPIController');

Route::resource('/v1/wilayahs', 'WilayahAPIController');

Route::resource('/v1/nopols', 'NopolAPIController');

Route::resource('/v1/customers', 'CustomerAPIController');

Route::resource('/v1/agencies', 'AgencyAPIController');

Route::resource('/v1/agents', 'AgentAPIController');
Route::post('/v1/acceptagent/{id}','AgentAPIController@acceptAgent');

Route::group(['prefix' => 'v1/kases'], function () {
  Route::get('submit','KaseAPIController@kaseSubmit');
  Route::get('outstanding','KaseAPIController@kaseOutstanding');
  Route::get('pending','KaseAPIController@kasePending');
  Route::get('approve','KaseAPIController@kaseApprove');
  Route::get('decline','KaseAPIController@kaseDecline');

  Route::get('submit/agent/{id}','KaseAPIController@submitAgent');
  Route::get('outstanding/agent/{id}','KaseAPIController@outStandingAgent');
  Route::get('approve/agent/{id}','KaseAPIController@approveAgent');
  Route::get('pending/agent/{id}','KaseAPIController@pendingAgent');
  Route::get('decline/agent/{id}','KaseAPIController@declineAgent');
});

Route::get('/v1/kases/selfcase/{id}','KaseAPIController@self');
Route::resource('/v1/kases', 'KaseAPIController');





Route::group(['prefix' => '/v1/kases/gantistatus'], function () {
  Route::get('bayar/{id}','KaseAPIController@gantistatusbayar');
  Route::get('outstanding/{id}','KaseAPIController@gantistatusoutstanding');
  Route::get('approve/{id}','KaseAPIController@gantistatusapprove');
  Route::get('decline/{id}','KaseAPIController@gantistatusdecline');
});


Route::resource('/v1/case_details', 'CaseDetailAPIController');


/* Method Setor */
Route::post('/v1/registeragency','Register@storeagency');
Route::post('/v1/registeragent','Register@storeagent');

Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
Route::post('authenticate', 'AuthenticateController@authenticate');
Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');


Route::group(['prefix' => 'v1'], function()
{
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');
    Route::get('userdata','AuthenticateController@ambildatalogin');
});
//pt ericsson indonesia lt 6. hadi wiguna jam 10 pagi. seberang mesjid pondok indah.




Route::resource('case_biayas', 'CaseBiayaAPIController');

Route::resource('case_biayas', 'CaseBiayaAPIController');

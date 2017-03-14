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
  Route::resource('/v1/mereks', 'MerekAPIController');
});




Route::resource('/v1/tipes', 'TipeAPIController');

Route::resource('/v1/wilayahs', 'WilayahAPIController');

Route::resource('/v1/wilayahs', 'WilayahAPIController');

Route::resource('/v1/nopols', 'NopolAPIController');

Route::resource('/v1/customers', 'CustomerAPIController');

Route::resource('/v1/agencies', 'AgencyAPIController');

Route::resource('/v1/agents', 'AgentAPIController');

Route::resource('/v1/kases', 'KaseAPIController');

Route::resource('/v1/case_details', 'CaseDetailAPIController');

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
});
//pt ericsson indonesia lt 6. hadi wiguna jam 10 pagi. seberang mesjid pondok indah.

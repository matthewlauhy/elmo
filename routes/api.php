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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/weather', 'CustomersController@getWeather');
Route::group(['prefix' => 'customers'],function () {
    Route::get('/', 'CustomersController@getCustomers');
    Route::get('/{customer_id}', 'CustomersController@getCustomer');
    Route::post('/', 'CustomersController@saveCustomer');
    Route::put('/{customer_d}', 'CustomersController@updateCustomer');
    Route::delete('/{customer_d}', 'CustomersController@deleteCustomer');

});


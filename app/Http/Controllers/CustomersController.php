<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Models\Customer;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Validator;

class CustomersController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getCustomers()
    {
        return Customer::all();
    }

    public function getWeather()
    {
        $baseApi = "http://query.yahooapis.com/v1/public/yql";
        $yql_query = 'select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="nome, ak")';
        $client = new Client();
        $r = $client->get($baseApi . "?q=" . urlencode($yql_query) . '&format=json');
        $response = $r->getBody()->getContents();
        return $response;
    }
    public function saveCustomer(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
        ];
        $messages = array(
            'first_name.required' => ':attribute needs to be filled.',
            'last_name.required' => ':attribute needs to be filled.'
        );
        $validator = Validator::make( $request->all(), $rules, $messages );

        if ($validator->fails()) {
            return response(['message' => $validator->errors()->first()] ,400);
        }

        $customer = new Customer;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->save();
        return response(['result' => 'success', 'customer_id' => $customer->customer_id] ,200);
    }

    public function deleteCustomer($customerId)
    {
        $customer = Customer::find($customerId);
        $customer->delete();

        return response(['result' => 'success']);
    }

    public function getCustomer($customerId)
    {
        $customer = Customer::find($customerId);
        return $customer;
    }

    public function updateCustomer(Request $request)
    {
        $customer = Customer::find($request->customer_id);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->save();
        return response(['result' => 'success', 'customer_id' => $customer->customer_id] ,200);
    }
}

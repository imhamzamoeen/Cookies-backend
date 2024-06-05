<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/set-cookie', function () {
    // Create a new response instance
    $response = new Response('Cookie has been set!');

    // Set the cookie using the withCookie() method
    $response->withCookie(cookie('example_cookie', 'cookie_value', 60)); // setting domain to current domain i.e. the server domain
    // $response->withCookie(cookie('example_cookie', 'cookie_value', 60, '/', 'different_domain.com'));// setting to the different domain as it is supposed to be blocked by the browser

    // Return the response
    return $response;
});


Route::get('/read-cookies', function (Request $request) {
    // Get all cookies from the request
    $cookies = request()->cookie('example_cookie');
    Log::info($cookies);
    // Return the cookies as JSON response
    return response()->json(['data'=>'saffs']);
});

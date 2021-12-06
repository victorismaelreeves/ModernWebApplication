<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
dd($response->json());
*/

Route::get('/', function () {
    $location = 'Madrid';
    $apiKey = "5467b13c8bd9bf38dac873468720c6ce";

    $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q={$location}&appid={$apiKey}&units=metric");
    $responseFuture = Http::get("https://api.openweathermap.org/data/2.5/onecall?lat=40.41&lon=-3.70&exclude=hourly,minutely,current,alerts&appid={$apiKey}&units=metric");

    dump($responseFuture->json());

    return view('welcome', [
        'currentWeather' => $response->json(),
        'futureWeather' => $responseFuture->json(),
    ]);
});

Route::get('bookshome', 'BookController@home');;
Route::resource('books', 'BookController');
Route::resource('authors', 'AuthorController');

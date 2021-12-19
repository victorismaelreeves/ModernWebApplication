<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;

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

    return view('Homework1', [
        'currentWeather' => $response->json(),
        'futureWeather' => $responseFuture->json(),
    ]);
});


Route::get('Homework2', function (Illuminate\Http\Request $request) {

    $client = new Client([
        'base_uri' => 'https://api.openweathermap.org/',
        'timeout'  => 2.0,
    ]);

    $apiKey = "5467b13c8bd9bf38dac873468720c6ce";
    $response = $client->get('https://api.openweathermap.org/data/2.5/onecall?lat=40.41&lon=-3.70&units=metric&exclude=current,minutely,hourly&appid='. $apiKey);
    $forecast = json_decode($response->getBody()->getContents(), true)['daily'];
    $sort_by = $request->input('sortby', null);

    foreach ($forecast as &$day){
        $day['date'] = $day['dt'];
        $day['min_temp'] = $day['temp']['min'];
        $day['max_temp'] = $day['temp']['max'];

        unset($day['dt']);
        unset($day['temp']);
    }

    if($sort_by === null || $sort_by == 'date')
        $sort_by = 'dt';

    $order = 'ASC';
    if($sort_by[0] == '-'){
        $order = 'DESC';
        $sort_by = substr($sort_by, 1);
    }
    usort($forecast, function($a, $b) use($sort_by){
        if($a[$sort_by] == $b[$sort_by])
            return 0;
        if($a[$sort_by] < $b[$sort_by])
            return -1;
        return 1;
    });

    if($order == 'DESC')
        $forecast = array_reverse($forecast);

    return view('Homework2', [
        'forecast' => $forecast['daily'],
        'variables' => ['humidity', 'pressure', 'wind_speed', 'clouds', 'max_temp', 'min_temp']]);
});

Route::get('bookshome',[BookController::class, "index"]);
Route::post('books/{id?}/save', 'App\Http\Controllers\BookController@save');
Route::get('books/', 'App\Http\Controllers\BookController@index');
Route::get('books/{id}', 'App\Http\Controllers\BookController@get');
Route::post('books/{id}/delete', 'App\Http\Controllers\BookController@delete');
Route::get('books/{id}/edit', 'App\Http\Controllers\BookController@edit');
Route::post('books/{id}/add_files', 'App\Http\Controllers\PhotoController@add_files');
Route::post('authors/{id?}/save', 'App\Http\Controllers\AuthorController@save');
Route::get('authors/getAll', 'App\Http\Controllers\AuthorController@getAllJson');
Route::get('authors/', 'App\Http\Controllers\AuthorController@index');
Route::get('authors/{id}', 'App\Http\Controllers\AuthorController@get');
Route::post('authors/{id}/delete', 'App\Http\Controllers\AuthorController@delete');
Route::get('authors/{id}/edit', 'App\Http\Controllers\AuthorController@edit');



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

Route::get('chart-problem', 'Api\ChartController@chart_problem')->name('chart-problem');
Route::get('chart-prodi', 'Api\ChartController@chart_prodi')->name('chart-prodi');
Route::get('chart-tingkat', 'Api\ChartController@chart_tingkat')->name('chart-tingkat');
Route::get('chart-online', 'Api\ChartController@chart_online')->name('chart-online');

Route::get('chart-konselor', 'HomeController@chart_warek')->name('chart-konselor');
Route::get('chart-warek', 'HomeController@chart_warek')->name('chart-warek');
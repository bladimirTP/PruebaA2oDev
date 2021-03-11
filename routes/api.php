<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::resource('category','Category\CategoryController',['only'=>['index','show','store']]);
Route::resource('game','Game\GameController',['only'=>['index','show','store']]);
Route::resource('league','League\LeagueController',['only'=>['index','show','store']]);
Route::resource('team','Team\TeamController',['only'=>['index','show','store']]);
Route::resource('origin','Origin\OriginController',['only'=>['index','show','store']]);
Route::resource('person','Person\PersonController',['only'=>['index','show','store']]);
Route::resource('detail_game','Game\GameDetailController',['only'=>['index','show','store']]);
Route::resource('detail_team','Team\TeamDetailController',['only'=>['index','show','store']]);
Route::resource('teamshow','Team\TeanShowController',['only'=>['index','show','store']]);

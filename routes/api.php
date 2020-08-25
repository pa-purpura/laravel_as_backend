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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/players', 'PlayerController@index')->name('players.index');
Route::get('/players/{id}', 'PlayerController@player')->name('players.detail');
Route::post('/players', 'PlayerController@create')->name('players.new');



Route::get('/agents', 'AgentController@index')->name('agents.index');
Route::get('/agents/{id}', 'AgentController@agent')->name('agents.detail');
Route::post('/agents', 'AgentController@create')->name('agents.new');


Route::get('/teams', 'TeamController@index')->name('teams.index');
Route::get('/teams/{id}', 'TeamController@team')->name('teams.detail');
Route::post('/teams', 'TeamController@create')->name('teams.new');

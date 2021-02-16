<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Person;
use App\Http\Controllers\PersonController;

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

Route::apiResource('/person','PersonController')->only(['show','destroy','update','store']);
Route::apiresource('/people','PersonController')->only('index');
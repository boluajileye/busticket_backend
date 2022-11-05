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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/bus',[App\Http\Controllers\Api\BusController::class, 'index']);

Route::get('/busschedule',[App\Http\Controllers\Api\BusScheduleController::class, 'index']);

Route::get('/busticket',[App\Http\Controllers\Api\BusTicketController::class, 'index']);

Route::post('/bus-store',[App\Http\Controllers\Api\BusController::class, 'store']);

Route::post('/busschedule-store',[App\Http\Controllers\Api\BusScheduleController::class, 'store']);

Route::post('/busticket-store',[App\Http\Controllers\Api\BusTicketController::class, 'store']);


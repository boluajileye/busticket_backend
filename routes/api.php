<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

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

Route::get('/bus/{id}',[App\Http\Controllers\Api\BusController::class, 'show']);

Route::get('/bus/{id}/edit',[App\Http\Controllers\Api\BusController::class, 'update']);

Route::get('/bus/{id}/delete',[App\Http\Controllers\Api\BusController::class, 'destroy']);

Route::get('/busschedule',[App\Http\Controllers\Api\BusScheduleController::class, 'index']);

Route::get('/busschedule/{id}/edit',[App\Http\Controllers\Api\BusScheduleController::class, 'update']);

Route::get('/busschedule/{id}/delete',[App\Http\Controllers\Api\BusScheduleController::class, 'destroy']);

Route::get('/busticket',[App\Http\Controllers\Api\BusTicketController::class, 'index']);

Route::get('/busticket/{id}',[App\Http\Controllers\Api\BusTicketController::class, 'show']);

Route::get('/busticket/{id}/user',[App\Http\Controllers\Api\BusTicketController::class, 'user']);

Route::post('/bus-store',[App\Http\Controllers\Api\BusController::class, 'store']);

Route::post('/busschedule-store',[App\Http\Controllers\Api\BusScheduleController::class, 'store']);

Route::post('/busticket-store',[App\Http\Controllers\Api\BusTicketController::class, 'store']);

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthenticationController::class, 'login']);
    Route::post('register', [AuthenticationController::class, 'register']);
    Route::post('logout', [AuthenticationController::class, 'logout']);
    Route::post('refresh', [AuthenticationController::class, 'refresh']);
    Route::post('me', [AuthenticationController::class, 'me']);

});
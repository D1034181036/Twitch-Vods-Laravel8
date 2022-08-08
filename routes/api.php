<?php

namespace App\Http\Controllers;

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

Route::get('/update_videos', [VideoController::class, 'updateVideos']);
Route::get('/get_status', [StatusController::class, 'getStatus']);
Route::get('/test', [TestController::class, 'index']);
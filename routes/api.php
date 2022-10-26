<?php

use App\Http\Controllers\CourseRESTController;
use App\Http\Controllers\GroupRESTController;
use App\Http\Controllers\UserRESTController;
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

Route::resource('courses', CourseRESTController::class);
Route::resource('groups', GroupRESTController::class);
Route::resource('lecturers', UserRESTController::class);

<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\LectureController;
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
*/
Route::middleware('auth')->group(function () {
    Route::resource('groups', GroupController::class);
});

Route::get('/students/{name}',[GroupController::class, 'students'])
    ->name('students.groups');

Route::get('/lectures/{name}',[LectureController::class, 'index'])
    ->name('group.lectures');

Auth::routes();



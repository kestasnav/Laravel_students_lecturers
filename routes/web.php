<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\UserController;
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
    Route::resource('courses', CourseController::class);
    Route::resource('students', UserController::class);
    Route::resource('lectures', LectureController::class);
    Route::resource('files', FileController::class);

Route::get('/studentai/{name}',[GroupController::class, 'studentai'])
    ->name('studentai');


Route::get('/paskaitos/{name}',[LectureController::class, 'paskaitos'])
    ->name('group.lectures');
});

Route::get('/studentoprofilis/{name}',[UserController::class, 'redagavimas'])
    ->name('profilis');

Route::put('/studentoprofilis/{name}',[UserController::class, 'profilioredagavimas'])
    ->name('profilioredagavimas');

Route::get('/failai/{name}',[FileController::class, 'display'])
    ->name('lecturesFiles')
    ->middleware('auth');

Route::put('hide/{add}', [FileController::class, 'hide'])->name('hide');
Route::put('unhide/{remove}', [FileController::class, 'unhide'])->name('unhide');
Route::get('download/{id}', [FileController::class, 'download'])->name('download');

Auth::routes();



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


Route::middleware('auth:sanctum')->group(function (){
    Route::apiResources([
        'students' => \App\Http\Controllers\StudentController::class,
        'lecturers' => \App\Http\Controllers\LecturerController::class
    ]);

    Route::patch('students/{student}/deactivate', [\App\Http\Controllers\StudentController::class,'deactivate']);
    Route::patch('lecturers/{lecturer}/deactivate', [\App\Http\Controllers\LecturerController::class,'deactivate']);

    Route::get('/courses',\App\Http\Controllers\CourseController::class);
});

Route::get('/setup',\App\Http\Controllers\AdminController::class);

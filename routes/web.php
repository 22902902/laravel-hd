<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return 'ok';
});


// api资源路由
Route::apiResource('lesson', LessonController::class);
Route::apiResource('chapter', ChapterController::class);
Route::apiResource('video', VideoController::class);


// 登陆注册
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout']);

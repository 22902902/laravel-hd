<?php

use App\Http\Controllers\LessonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return 'ok';
});


// api资源路由
Route::apiResource('lesson', LessonController::class);


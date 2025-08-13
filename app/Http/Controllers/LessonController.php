<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Http\Resources\LessonResource;
use App\Models\Lesson;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class LessonController extends Controller implements HasMiddleware
{

    /**
     * 中间件
     */
    public static function middleware(): array
    {
//        return [
//            'auth',
//            new Middleware('log', only: ['index']),
//            new Middleware('subscribed', except: ['store']),
//        ];
        return [
            new Middleware('auth:sanctum', except: ['indedx', 'show']), // 不用验证
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Lesson::paginate(9);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * 课程的保存
     * Store a newly created resource in storage.
     */
    public function store(StoreLessonRequest $request)
    {
        return $request->input(); // 得到数据
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}

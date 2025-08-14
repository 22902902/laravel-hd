<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Http\Resources\LessonResource;
use App\Models\Lesson;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

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
        //return Lesson::paginate(9);
        //return user('id');
        //return $this->respondOk('aaa');
        return LessonResource::collection(Lesson::paginate(9));
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
    public function store(StoreLessonRequest $request, Lesson $lesson) // 注入一个空对象
    {
        //return $request->input(); // 得到数据
        Gate::authorize('create', $lesson); // 策略，自动返回LessonPolicy
        $lesson->fill($request->input()); // 填充表单项数据
        $lesson->save(); // 保存
        return new LessonResource($lesson); // 最后把新数据返回
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        return new LessonResource($lesson);
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
        $lesson->fill($request->input()); // 填充表单项数据
        $lesson->save(); // 保存
        return new LessonResource($lesson); // 最后把新数据返回
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return $this->respondNoContent(); // 204
    }
}

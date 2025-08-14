<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChapterRequest;
use App\Http\Requests\UpdateChapterRequest;
use App\Http\Resources\ChapterResource;
use App\Models\Chapter;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class ChapterController extends Controller implements HasMiddleware
{
    /**
     * 中间件
     * @return Middleware[]
     */
    public static function middleware(): array
    {
        return [
            new Middleware('auth:sanctum', except: ['indedx', 'show']), // 不用验证
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 找到章节资源，返回回去
        return ChapterResource::collection(Chapter::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChapterRequest $request, Chapter $chapter)
    {
        Gate::authorize('create', Chapter::class); // 添加没有模型添加，所以直接添加类
        $chapter->fill($request->input());
        $chapter->save();
        return new ChapterResource($chapter);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chapter $chapter)
    {
        return new ChapterResource($chapter);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chapter $chapter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChapterRequest $request, Chapter $chapter)
    {
        Gate::authorize('update', $chapter); // 有模型对象
        $chapter->fill($request->input());
        $chapter->save();
        return new ChapterResource($chapter);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        Gate::authorize('delete', $chapter); // 有模型对象, 验证
        $chapter->delete();
        return response()->noContent();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Http\Resources\VideoResource;
use App\Models\Video;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class VideoController extends Controller implements HasMiddleware
{

    /**
     * 中间件
     * @return Middleware[]
     */
    public static function middleware(): array
    {
        return [
            new Middleware('auth:sanctum', except: ['indedx']), // 不用验证
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return VideoResource::collection(Video::paginate(10)); // 分页
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
    public function store(StoreVideoRequest $request, Video $video)
    {
        Gate::authorize('create', Video::class);
//        $video->fill($request->input());
//        $video->save();
//        return new VideoResource($video);
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        return new VideoResource($video);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        Gate::authorize('update', Video::class);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        //Gate::authorize('delete', Video::class);
    }
}

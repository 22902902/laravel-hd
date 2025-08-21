<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApiWenpaiRequest;
use App\Http\Requests\UpdateApiWenpaiRequest;
use App\Models\ApiWenpai;
use GuzzleHttp\Client as HttpClient;


/**
 * 测试文拍接口用的
 */
class ApiWenpaiController extends Controller
{

    public $ip = "http://210.51.191.22:6070";
    private $sRequestUrl;

    /**
     * 广告查询 advert_query
     */
    public function advert_query()
    {
        $url = $this->ip . "/expand-frontend/webHttpServlet";


    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreApiWenpaiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ApiWenpai $apiWenpai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ApiWenpai $apiWenpai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApiWenpaiRequest $request, ApiWenpai $apiWenpai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApiWenpai $apiWenpai)
    {
        //
    }
}

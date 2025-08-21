<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserReosurce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function current()
    {
        if(Auth::check())
        {
            return new UserReosurce(Auth::user()); // 资源返回
        }
    }
}

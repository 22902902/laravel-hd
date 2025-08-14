<?php
/**
 * 帮助函数
 */
use Illuminate\Support\Facades\Auth;

// 是否是超级管理员
function isAdministrator()
{
    // 判断用户是否登陆，如果有登陆，再判断是否是管理员
    return Auth::check() && Auth::user()->isAdministrator;
}

// 取用户
function user(string $field)
{
    return Auth::check() && Auth::user()->$field;
}

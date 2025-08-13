<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * @param RegisterRequest $request
     * @return void
     */
    public function register(RegisterRequest $request, User $user)
    {
        $user -> name = $request->input('name');
        $user -> password = Hash::make($request->input('password'));
        $user -> save();
        return ['user' => $user->refresh()];
    }

    public function logout()
    {
        Auth::logout();
        return ['message' => '退出成功'];
    }

    // 手机号、邮箱、账号
    public function login(Request $request, User $user)
    {
        // 判断，如果账号是11位数字，则是手机号，否则判断是不是邮箱，不是邮箱，那就是账号
        $field = preg_match('/^\d{11}$/', $request->input('account')) ? 'mobile' : (
            filter_var($request->input('account'), FILTER_VALIDATE_EMAIL) ? 'email' : 'name'
        );

        // 用户验证
        $request->validate([
            "account" => ['required', 'exists:users,' . $field],
            "password" => ['required']
        ]);
        $user = User::where($field, $request->input('account'))->first();
        if(!Hash::check($request->input('password'), $user->password)) {
            throw ValidationException::withMessages(['password' => '密码输入错误']);
        }
        Auth::login($user); // session一下
        return ['user' => $user->refresh()];
    }
}

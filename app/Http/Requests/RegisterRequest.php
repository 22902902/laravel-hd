<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * 验证类
 */
class RegisterRequest extends FormRequest
{
    /**
     * 身份校验 403
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * 验证规则
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'regex:/^[a-z]\w{3,20}$/i'],
            'password' => ['required', 'string', 'confirmed', 'between:6,20'],
            'password_confirmation' => ['required', 'between:6,20'], // 两次密码不一致
        ];
    }

    /**
     * 返回错误消息
     */
    public function messages()
    {
        return ['name.regex' => '请输入以字母开始的4-20位字符'];
    }
}

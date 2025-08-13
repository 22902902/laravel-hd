<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * 保存时的认证文件
 */
class StoreLessonRequest extends FormRequest
{
    /**
     * 认证
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //return Auth::check(); // 认证有没有登陆，如果没登陆返回认证
        return true;
    }

    /**
     * 认证规则
     * Get the validation rules that apply to the request.
     *
     * 数据来源是来自管理者
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'between:5,50'],
            'description' => ['required', 'string', 'between:5,300'],
            'preview' => ['required', 'url'],
        ];
    }
}

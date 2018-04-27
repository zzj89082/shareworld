<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserEditRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Ualais' => 'regex:/^[a-zA-Z]{1}[a-zA-Z0-9_]{5,17}$/',
            'Utel'     => 'regex:/^1{1}[\d]{10}$/',
            'Uemail'     => 'email'

        ];
    }
    public function messages()
    {
        return [
            'Ualais.regex'   =>    '用户名不合法',
            'Utel.regex'   =>    '手机号不合法',
            'Uemail.email'   =>    '邮箱不合法',
        ];
    }
}

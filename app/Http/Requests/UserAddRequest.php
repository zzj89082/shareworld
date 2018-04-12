<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserAddRequest extends Request
{
    /**
     * 自动验证
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
            'Ualais' => 'unique:sw_users|regex:/^[a-zA-Z]{1}[a-zA-Z0-9_]{5,17}$/',
            'Upassswd' => 'regex:/^[a-zA-Z0-9_]{6,18}$/',
            'Urpassswd' => 'same:Upassswd',
            'Utel'     => 'regex:/^1{1}[\d]{10}$/',
            'Uemail'     => 'email'

        ];
    }
    /*
     * 自定义错误信息
     *
     * */
    public function messages()
    {
        return [
            'Ualais.unique'   =>    '用户名存在',
            'Ualais.regex'   =>    '用户名不合法',
            'Upassswd.regex'   =>    '密码不合法',
            'Urpassswd.same'   =>    '俩次密码不一致',
            'Utel.regex'   =>    '手机号不合法',
            'Uemail.email'   =>    '邮箱不合法',
        ];
    }
}

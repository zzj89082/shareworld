<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
class ajax_registerController extends Controller
{
    /**
     * ajax验证email邮箱
     */
    public function postEmail(Request $request)
    {
        $data = $request -> all();
        //检测数据  自动验证  使用 FILTER_VALIDATE_EMAIL 过滤器
        if (!filter_var($data['Uemail'], FILTER_VALIDATE_EMAIL)) {
            echo 2;//格式不正确
            die;
        }
        
        $data_email = User::where('Uemail',$data['Uemail'])->first();
        //检测是否存在邮箱
        if(!empty($data_email['Uemail'])){
            echo 1;//存在
        }else {
            echo 0;//不存在
        }

    }
    /**
     * ajax验证密码
     */
    public function postPw(Request $request)
    {
        $data = $request->all();
        if(preg_match_all("/^[a-zA-Z\d_]{6,18}$/",$data['Upassword']) != true){
            echo 2;//不匹配的
            die;
        }
        if($data['Upassword2'] !== $data['Upassword']){
            echo 1;//两次密码不一致
            die;
        }
    }
    /**
     * ajax验证tel手机号
     */
    public function postTel(Request $request)
    {
        $data = $request -> all();
        
        //查询数据库中是否存在
        $data_email = User::where('Utel',$data['Utel'])->first();
        if(!empty($data_email['Utel'])){
            echo 1;//存在
        }else {
            //正则判断
            if(preg_match_all("/^1[3|5|7|8|]{1}\d{9}$/",$data['Utel']) != true){
                echo 2;//不匹配的
            }else {
                echo 0;//不存在
                }
        }
    }

}

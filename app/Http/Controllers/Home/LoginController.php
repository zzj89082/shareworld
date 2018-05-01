<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//引用对应的命名空间
use Gregwar\Captcha\CaptchaBuilder;
use Hash;
use App\User;
class LoginController extends Controller
{
    // 执行验证码
    public function getCode()
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 46, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        session(['code'=>$phrase]);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }
    /**
     * 前台登录首页
     */
    public function getIndex()
    {
        return view('/home/login/login');
    }
    /**
     * ajax验证eamil邮箱
     */
    public function postAjaxemail(Request $request)
    {
        $data = $request -> all();
        $data_email = User::where('Uemail',$data['Uemail'])->first();
        //检测是否存在邮箱
        if(empty($data_email['Uemail'])){
            echo 0;
        }else {
            echo 1;
        }

    }
    /**
     * ajax验证tel手机
     */
    public function postAjaxtel(Request $request)
    {
        $data = $request -> all();
        $data_utel = User::where('Utel',$data['Utel'])->first();
        //检测是否存在手机号
        if(empty($data_utel['Utel'])){
            echo 0;
        }else {
            echo 1;
        }

    }
    /**
     * ajax验证密码是否正确 --邮箱
     */
    public function postAjaxpw(Request $request)
    {
        $data = $request->all();
        $data_email =$data['Uemail'];

        $hash = $data['Upassword'];
        $data_hash = User::where('Uemail',$data_email) -> where('Upassswd',$hash)-> first();
        //检测是否存在密码
        if(empty($data_hash)){
            echo 0;//密码不正确
        }else {
            echo 1;//密码正确
        }
    }
    /**
     * ajax验证密码是否正确 --手机
     */
    public function postAjaxtelpw(Request $request)
    {
        $data = $request->all();
        $data_utel =$data['Utel'];

        $hash = $data['Upassword2'];
        $data_hash = User::where('Utel',$data_utel) -> where('Upassswd',$hash) -> first();
        //检测是否存在密码
        if(empty($data_hash)){
            echo 0;//密码不正确
        }else {
            echo 1;//密码正确
        }
    }
    /**
     * ajax验证码人性化处理--邮箱
     */
    public function postAjaxcode(Request $request)
    {
        $data = $request -> all();
        $code = $data['Code']; 
        // 检测验证码是否正确
        if(session('code') != $code){
             echo 0;//验证码不正确
        } 
        else {
            echo 1;//验证码正确
        }
    }
    /**
     * ajax验证码人性化处理--手机
     */
    public function postAjaxcode2(Request $request)
    {
        $data = $request -> all();
        $code = $data['Code']; 
        // 检测验证码是否正确
        if(session('code') != $code){
             echo 0;//验证码不正确
        } 
        else {
            echo 1;//验证码正确
        }
    }
    /**
     * 登录处理
     */
    public function postSublogin(Request $request)
    {
        
        //接受--邮箱登录数据
        $data1 = $request->only(['Uemail', 'password','code']);
        if(!empty($data1['Uemail'])){
            //检测是否存在邮箱
            $data_email = User::where('Uemail',$data1['Uemail'])->first();
            if(!empty($data_email['Uemail'])){
                $data_password = User:: where('Uemail',$data1['Uemail']) ->where('Upassswd',$data1['password']) ->first();
                if(empty($data_password)){
                    return '<script type="text/javascript">alert("密码错误");history.go(-1);</script>';
                }   
            }else {
                return '<script type="text/javascript">alert("邮箱错误或不存在");history.go(-1);</script>';
            }
            $code = $data1['code']; 
            // 检测验证码是否正确
            if(session('code') != $code){
                 return '<script type="text/javascript">alert("验证码错误");history.go(-1);</script>';
            }
        }

        //接受--手机登录数据
        $data2 = $request->only(['Utel', 'telpassword','code2']);
        if(!empty($data2['Utel'])){  
            //检测手机号是否存在
            $data_utel = User::where('Utel',$data2['Utel'])->first();
            //检测是否存在手机号
            if(!empty($data_utel['Utel'])){
                $data_password = User:: where('Utel',$data2['Utel']) ->where('Upassswd',$data2['telpassword']) ->first();
                if(empty($data_password)){
                    return '<script type="text/javascript">alert("密码错误");history.go(-1);</script>';
                } 
            } else{
                return '<script type="text/javascript">alert("手机号码错误或不存在");history.go(-1);</script>';
            }
            $code2 = $data2['code2']; 
            // 检测验证码是否正确
            if(session('code') != $code2){
                 return '<script type="text/javascript">alert("验证码错误");history.go(-1);</script>';
            }
        }  

        // 全都成功后

        //把内容存入session
        if(!empty($data1['Uemail'])){
            session(['home_login'=>$data1['Uemail']]);
            return redirect('/');
        }
        if(!empty($data2['Utel'])){
            session(['home_login'=>$data2['Utel']]);
            return redirect('/');
        }
    }
    /**
     * 退出登录
     */
    public function getOut(Request $request)
    {
        //清除session中某个键
        $request->session()->forget('home_login');
        return '<script type="text/javascript">alert("退出成功");location.href="/"</script>';
    }
}

<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
class registerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * 加载注册页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/home/login/register');
    }

    /**
     * 执行添加注册
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表示符判断
            //邮箱
        if($request -> input('Uemail_method') == 'Uemail_method'){
            //用户名是否有数据
            $Uemail = $request -> input('Uemail');//注册的用户---邮箱
            //检测数据  自动验证  使用 FILTER_VALIDATE_EMAIL 过滤器
            if (!filter_var($Uemail, FILTER_VALIDATE_EMAIL)) {
                return '<script type="text/javascript">alert("邮箱格式填写错误");history.go(-1);</script>';
            }

            $data_email = User::where('Uemail',$Uemail)->first();
            //检测是否存在相同邮箱
            if(!empty($data_email['Uemail'])){
                return '<script type="text/javascript">alert("注册邮箱已存在");history.go(-1);</script>';
            }

            $Upassswd = $request -> input('Upassswd');
            $Upassswd2 = $request -> input('Upassswd2');
            //检测两次密码是否相同
            if($Upassswd !== $Upassswd2){
                return '<script type="text/javascript">alert("两次密码不一致");history.go(-1);</script>';
            }

            $token = str_random(50);
            $Uid = User::insertGetId(['Uemail'=>$Uemail,'token'=>$token,'Upassswd'=>$Upassswd,'Ualais' => $Uemail]);
            self::sendMail($Uemail,$Uid,$token);
            return view('/home/login/registerOk',['title'=>$Uemail]);
        }
            //手机
        if($request -> input('Utel_method') == 'Utel_method'){
            $Utel = $request -> input('Utel');//注册的用户---手机
            //正则判断格式
            if(preg_match_all("/^1[3|5|7|8|]{1}\d{9}$/",$Utel) != true){
                return '<script type="text/javascript">alert("手机号码格式不正确");history.go(-1);</script>';
                die;
            }

            //判断验证码
            if($request -> input('tel_code') != session('mobile_code')){
                return '<script type="text/javascript">alert("验证码错误");history.go(-1);</script>';
            }

            //查询数据库中是否存在
            $data_email = User::where('Utel',$Utel)->first();
            if(!empty($data_email['Utel'])){
                return '<script type="text/javascript">alert("您注册的手机号存在");history.go(-1);</script>';
            }

            $telUpassswd = $request -> input('telUpassswd');
            $telUpassswd2 = $request -> input('telUpassswd2');
            //检测两次密码是否相同
            if($telUpassswd !== $telUpassswd2){
                return '<script type="text/javascript">alert("两次密码不一致");history.go(-1);</script>';
            }

            $Uid = User::insertGetId(['Utel'=>$Utel,'status'=>2,'Upassswd'=>$telUpassswd,'Ualais' => $Utel]);
            return view('/home/login/registerStatusTel',['title'=>$Utel,'status_success'=>'已激活','status_error' => null]);
        }
    }
    /**
     * 发送手机号验证
     * 请求第三方
     */
    public function sendcode(Request $request)
    {
       
       //生成随机验证码
       $mobile_code = rand(1000,9999);
       $phone = $request -> input('Utel');
       //存入session
       session(['mobile_code' => $mobile_code]);

       //参数
       $post_data = "account=C19548128&password=beacd19231707df1c683cf2f1e1cb664&format=json&mobile=".$phone."&content=".rawurlencode("您的验证码是：".$mobile_code."。请不要把验证码泄露给其他人。");
       //短信接口地址
       $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit&".$post_data;

       //开始发送
        $ch = curl_init(); // 模拟http协议请求
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//不自动输出
        // 执行HTTP请求
        curl_setopt($ch , CURLOPT_URL , $target);
        $res = curl_exec($ch);
        echo $res;

    }

    /**
     * 封装发送邮件
     */
    public static function sendMail($Uemail,$Uid,$token)
    {
        //发送邮件进行注册
        Mail::send('home.login.emailz', ['user' => $Uemail,'Uid' => $Uid,'token' => $token], function ($m) use ($Uemail) {
            //发送给注册的用户
            $m->to($Uemail)->subject('【shareworld】恭喜您注册成功');
        });
    }

     /**
     * 激活邮箱
     */
    public function status(Request $request)
    {
        //获取点击传送的值
        $Uid = $request -> input('Uid');
        $token = $request -> input('token');
        //查询数据库中$Uid
        $user = User::find($Uid);
        $Uemail = $user['Uemail'];
        //判断是否已经激活
        if($user -> stauts == 2){
            return view('/home/login/registerStatus',['title'=>$Uemail,'status_error'=>'您已激活过','status_success' => null]);
        }
        //判断是否token保护值相同
        if($user -> token != $token){
            return view('/home/login/registerStatus',['title'=>$Uemail,'status_error'=>'激活失败','status_success' => null]);
        } else {
            //开始激活
            $user -> status = 2;
            //重新生活token，防止重复点击
            $user -> token = str_random(50);
            //执行保存
            if($user -> save()){
                return view('/home/login/registerStatus',['title'=>$Uemail,'status_success'=>'激活成功','status_error' => null]);
            } else {
                return view('/home/login/registerStatus',['title'=>$Uemail,'status_error'=>'激活失败','status_success' => null]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

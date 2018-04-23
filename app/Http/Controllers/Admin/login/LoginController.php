<?php

namespace App\Http\Controllers\admin\login;

use Illuminate\Http\Request;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Gregwar\Captcha\CaptchaBuilder;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin(Request $request)
    {
        //echo 123;
        /*$data = $request->except('_token');
        $data_one = User::where('Ualais',$data['Ualais'])->first();
        if($data_one['Upower']!=5){
            return '<script>alert("登录失败，您访问的权限不够，是否充值");location.href="/admin/index";</script>\';</script>';
        }else{
            session(['login' => 'true']);
            return redirect('/admin/index')->with('success','欢迎回来');
        }*/
        return view('admin.login.login');

    }
    /*验证是否有资格登录
     *执行登录
     *
     * */
    public function postCarry(Request $request)
    {
        $data = $request->except('_token');
       // $res = Hash::make($data['Upassswd']);
        $res = $data['Upassswd'];
        $data_two = User::where('Upassswd',$res)->first();
        if(empty($data_two)){
            return redirect('/admin/login')->with('error','密码输入错误');
        }
        if(session('code')!= $request->input('code')){
            $request->flashOnly('Ualais');
            return redirect('/admin/login')->with('error','验证码输入错误');
        }else{
            $data_one = User::where('Ualais',$data['Ualais'])->first();
            if($data_one['Upower']!=5){
                return redirect('/admin/login')->with('error','您没有权限访问');
            }else{
                session(['login' => 'true','Uinfo'=>$data_one]);
                // dump(session('Uinfo'));die;
                return redirect('/admin/index')->with('success','欢迎回来');
            }
        }
    }

    /**
     *  ajax验证用户是否合法
     *
     * @return \Illuminate\Http\Response
     */
    public function postAjax(Request $request)
    {
        $data = $request->all();
        //echo $data['username'];
        //$res = Hash::make($data['upassword']);
        $data_one = User::where('Ualais',$data['username'])->first();
        //$data_two = User::where('Upassswd',$res)->first();
        //检测是否存在用户名
        if(empty($data_one)){
                echo 1;//用户不存在
        }else {
            echo 2;//用户名存在
        }

    }

    /**
     * ajax验证密码是否合法
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postAjax2(Request $request)
    {
        $data = $request->all();
        $data_two = User::where('Upassswd',$data['upassword'])->where('Ualais',$data['username'])->first();
        //检测是否存在密码
        if(empty($data_two)){
            echo 1;//密码不存在
        }else {
            echo 2;//密码存在
        }
    }

    /**
     * 生成验证法验证法
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCode()
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        // Session::flash('milkcaptcha', $phrase);
        session(['code'=>$phrase]);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
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

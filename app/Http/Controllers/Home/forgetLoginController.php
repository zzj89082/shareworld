<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//引用对应的命名空间
use Gregwar\Captcha\CaptchaBuilder;
use Hash;
use App\User;
use Mail;
class forgetLoginController extends Controller
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
     *忘记密码页面 （马可）
     * @return [type] [description]
     */
    public function getEmailphone()
    {
        return view('/home/login/emailphone');
    }

    /**
     * 判断用户名和验证码(ajax发送)
     * @return [type] [description]
     */
    public function postYanzheng(Request $request)
    {
        //接收ajax传值
        $data = $request -> except('_token');
        //判断验证码是否一致
        if(session('code') !== $data['yzm']) {
            echo 0;
            exit;
        } else {
            //获取数据库数据
            $username = User::where('Ualais','=',$data['username'])->first();
            if(!$username) {
                echo 0;
                exit;
            } else {
               session(['yanzhengusername'=>$username->Uid]);
               echo 1;
            }
        }
    }

    /*
     * 加载找回方式模板
     * @return [type] [description]
     */
    public function getZhfs()
    {
        // 过滤通过url访问
        if(empty(session('yanzhengusername'))) {
            return redirect(url('home/forgetlogin/emailphone')); 
        }
        return view('/home/login/zhfs');
    }

    /**
     * 加载邮箱或手机模板
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function postYzzhfs(Request $request)
    {

        $data = $request -> except('_token');
        if($data['yzfs'] == 0) {
            //邮箱模板
            return view('/home/login/email');
        } else {
            return view('/home/login/phone');
        }
    }

    /**
     * 加载成功页面
     * @return [type] [description]
     */
    public function getCg(Request $request) {
        // 过滤通过url访问
        if(empty(session('yanzhengusername'))) {
            return redirect(url('home/forgetlogin/emailphone')); 
        }
        //删除session
        if(!session('yanzhengemail')) {
            $request->session()->forget('yanzhengusername');
        }
        return view('/home/login/chenggong');
    }

    /**
     * 发送邮件
     * @return [type] [description]
     */
    public function postEmail(Request $request)
    {
        //接收ajax传值
        $data = $request -> except('_token');
        //获取数据
        $user = User::find(session('yanzhengusername'));
        //发送邮件
        if($user->Uemail == $data['email']) {
            $username = $user->Ualais; //用户名
            $email = $data['email'];   //邮箱
            //发送邮件
            $res = Mail::send('/home/login/yanzhengemail', ['username' => $username,'email'=>$email], function ($m) use ($username,$email) {
                $m->to($email, $username)->subject('重置密码');
            });
            //判断是否发送成功
            if($res) {
                session(['yanzhengemail'=>$email]); //用户判断
                echo 1;
            } else {
                echo 2;
            }
            
        } else {
            echo 0;
        }
    }

    /**
     * a标签链接跳转加载页面
     * @return [type] [description]
     */
    public function getPsemail()
    {   
        // 过滤通过url访问
        if(empty(session('yanzhengusername'))) {
            return redirect(url('home/forgetlogin/emailphone')); 
        }
        return view('/home/login/passemail');
    }

    /**
     * 邮箱修改密码
     * @return [type] [description]
     */
    public function postPassemail(Request $request)
    {
         //验证session是否存在
        if(session('yanzhengusername')) {
            //接收数据
            $data = $request -> except('_token');
            if($data['pass'] == $data['repass']) {
                //执行添加
                $user = User::find(session('yanzhengusername'));
                $user -> Upassswd = $data['pass'];
                $res = $user -> save();
                if($res) {
                    //删除session
                    $request->session()->forget('yanzhengusername');
                    $request->session()->forget('yanzhengemail');
                    //返回登录页面
                    return redirect(url('/home/login'));
                } else {
                    return back()->with('error1','修改密码失败');
                }
            } else {
                return back()->with('error','密码不一致');
            }
        } else {
            echo '<script>alert("密码不能重复修改");location.href="'.url('/home/login').'"</script>';
        }     
    }

    /**
     * 发送短信
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function postPhone(Request $request)
    {
        //判断是否存在  用于多次修改
        if(session('yanzhengusername')) {
            //ajax 发送手机号
            $phone = $request -> except('_token');
            //获取数据对比
            $user = User::find(session('yanzhengusername'));
            //判断手机号是否一致
            if($user->Utel == $phone['phone']) {
                //发送短信
                $mobile_code = rand(1000,9999); //随机数
                session(['mobile_code'=>$mobile_code]);  //压入session
                //参数
                $post_data = "account=C16842497&password=40e751f298e99eb7355fa7bdfe473959&format=json&mobile=".$phone['phone']."&content=".rawurlencode("您的验证码是：".$mobile_code."。请不要把验证码泄露给其他人。");
                //短信接口地址
                $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit&".$post_data;
                $ch = curl_init(); //模拟Http请求协议
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //不自动输出
                curl_setopt($ch, CURLOPT_URL, $target); //执行Http协议
                $res = curl_exec($ch); //发送请求
                echo $res;
            } else {
                echo 0;
            }
        }else{
            echo 2;
        }
    }

    /**
     * 手机修改密码插入
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function postPassphone(Request $request)
    {
        //接收ajax传值
        $data = $request -> except('_token');
        //判断验证码是否一致
        if(session('mobile_code') == $data['phoneyzm']) {
            //执行插入
            $user = User::find(session('yanzhengusername'));
            $user->Upassswd = $data['pass']; //修改
            $res = $user->save(); //执行插入
            //判断是否插入成功
            if($res) {
                //删除session
                $request->session()->forget('mobile_code');
                echo 1;
            } else {
                echo 2;
            }
        } else {
            echo 0;
        }  
    }
    
}

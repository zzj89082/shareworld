<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Rollimg;
use \DB;
class ConfigController extends Controller
{
    /**
     * 加载网站配置界面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //加载模板
        return view('admin/config/create',['title'=>'网站配置']);
    }

    /**
     * 执行添加
     * @return [type] [description]
     */
    public function add(Request $request)
    {
        //接收PSOT信息
        $data = $request -> except(['_token']);
        //判断是否为空
        if(empty($data['config_title']) || empty($data['config_www']) || empty($data['config_setting'])) {
            return back()->with('error','配置失败');
        }
        //调用模型
        $config = Config::find(1);        
        //拼接路径 执行上传
        $logo_url = './admin/img/';

        //前台logo
        //检测是否有文件上传
        if($request -> hasFile('config_logo')) {
            //创建文件上传对象
            $config_logo = $request -> file('config_logo');
            //后缀名拼接
            $homelogo = 'homelogo'.'.'.$config_logo->getClientOriginalExtension();
            $config_logo->move($logo_url,$homelogo);
            //拼接路径插入数据库
            $logo_data = ltrim($logo_url,'.').$homelogo;
            //执行插入
            $config ->config_logo = $logo_data;
        } else {
            //如果没有上传 给默认路径插入 
            $config ->config_logo = $config ->config_logo;
        }

        //后台logo
        if($request -> hasFile('config_adminlogo')) {
            $config_adminlogo = $request -> file('config_adminlogo');
            $adminlogo = 'adminlogo'.'.'.$config_adminlogo->getClientOriginalExtension();
            $config_adminlogo->move($logo_url,$adminlogo);
            $admin_logo = ltrim($logo_url,'.').$adminlogo;
            //执行插入
            $config ->config_adminlogo = $admin_logo;
        } else {
            //如果没有上传 给默认路径插入
            $config ->config_adminlogo = $config ->config_adminlogo;
        }

        //网站ico
        if($request -> hasFile('config_ico')) {
            $config_ico = $request -> file('config_ico');
            $icologo = 'icologo'.'.'.$config_ico->getClientOriginalExtension();
            $config_ico->move($logo_url,$icologo);
            $ico_config = ltrim($logo_url,'.').$icologo;
            //执行插入
            $config ->config_ico =  $ico_config;
        } else {
            //如果没有上传 给默认路径插入
            $config ->config_ico = $config ->config_ico;
        }

        //执行插入文字的
        $config ->config_title = $data['config_title'];
        $config ->config_www = $data['config_www'];
        $config ->config_setting = $data['config_setting'];
        $rts = $config->save();
        if($rts) {
            return redirect(url('admin/index'))->with('success','配置成功');
        } else {
            return back()->with('error','配置失败');
        }
    }

    /**
     * 加载更换轮播图模板
     * @return [type] [description]
     */
    public function rollimg()
    {
        return view('admin/config/rollimg',['title'=>'更换轮播图']);        
    }

    /**
     * 执行添加轮播图
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function insertimg(Request $request)
    {
        //接收post传值
        $data = $request -> except(['_token']);
        //判断是否上传图片 最多上传多少张
        if(empty($data)) {
            return back()->with('error','图片至少一张'); 
        }
        //图片上传
        $Rimg = $request->file('Rimg');
        $filename = $Rimg->getClientOriginalExtension();
        //拼接文件名 路径
        $dirname = './admin/lunbotu/';
        $file_name = 'lunbotu'.date('Ymdhis',time()).'.'.$filename;
        $filedir = ltrim($dirname,'.').$file_name;
        //执行上传           
        $Rimg->move($dirname,$file_name);
        //判断是否上传成功
        // 开启事务   
        DB::beginTransaction();
        //实例化上传图片
        $rollimg = new Rollimg;
        $res3 = $rollimg -> insertGetId(['created_at'=>date('Y-m-d H:i:s',time()),'Rimg'=>$filedir]);
        //插入轮播图ID 
        $config = Config::find(1);
        $config ->config_rollimg = $config->config_rollimg.$res3.',';
        $res4 = $config->save();
        if($res3 && $res4) {
            //发送事务
            DB::commit();
            return redirect('/admin/index')->with('success','添加成功');
        } else {
            //回滚操作
            DB::rollBack();
            return back()->with('error','添加失败');
        }
    }



    public function delete($id)
    {
        $res = Rollimg::destroy($id);
        if($res){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}

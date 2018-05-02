<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Rollimg;
use App\Models\Admin\User;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取网站配置
        $data = Config::find(1);
        $rollimg = Rollimg::get();
        session(['data'=>$data]);
        //统计用户
        $pu_data = User::where('Upower',0)->count();  //普通用户
        $V_data = User::where('Upower',2)->count();  //大V用户
        $qiye_data = User::where('Upower',4)->count();  //企业用户
        $Vip_data = User::where('Upower',1)->count(); //VIP用户

        return view('admin/index',['data'=>$data,
            'rollimg'=>$rollimg,
            'pu_data'=>$pu_data,
            'V_data'=>$V_data,
            'qiye_data'=>$qiye_data,
            'Vip_data'=>$Vip_data
        ]); 
    }

}

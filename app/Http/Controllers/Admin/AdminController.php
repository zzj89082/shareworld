<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Rollimg;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $login = true;
        // $login = false;


        if($login == true){  
            //获取网站配置
            $data = Config::find(1);
            $rollimg = Rollimg::get();
            session(['data'=>$data]);
            return view('admin/index',['data'=>$data,'rollimg'=>$rollimg]);
        } else {
            return view('admin/login/login');
        }
    }

}

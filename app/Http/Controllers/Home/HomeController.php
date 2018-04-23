<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Rollimg;
use App\Models\Content;
use App\Models\Release;
use App\Models\Poster;
class HomeController extends Controller
{
    /**
     * 加载前台首页模板
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取轮播图
        $rollimg = Rollimg::all();
        //获取第一条内容
        $content = Content::orderby('Cid','desc')->first();
        //获取除第一条内容之外的所有内容只取4条        
        $content1 = Content::where('Cid','!=',$content->Cid)->take(4)->orderby('Cid','desc')->get();
        //获取分类为热门的数据       
        $remen = Content::where('Ccategory','=','热门')->orderby('Cid','desc')->get();
        $data = Release::where('Evideo','!=','null')->take(2)->get();
        // dd($data);
        return view('/home/index',[
            'lunbo'=>'热点推荐',
            'rollimg'=>$rollimg,
            'redian'=>'每日热点',
            'content'=>$content,
            'content1'=>$content1,
            'remen'=>$remen,
            'video'=>'热点视频',
            'data'=>$data,
        ]);

    }
    
    /**
     * 加载体育模板
     * @return \Illuminate\Http\Response
     */
    public function getSport()
    {
        //获取体育分类的数据
        $sport = Content::where('Ccategory','=','体育')->orderby('Cid','desc')->get();
        //获取商业广告，取3条
        $poster = Poster::where('POtype','=','商业广告')->orderby('POid','desc')->take(3)->get();
        $data = Release::where('Evideo','!=','null')->take(1)->get();
        // dd($poster);
        return view('/home/content/sport',[
            'title'=>'体育',
            'sport'=>$sport,
            'title'=>'体育竞技 ',
            'guanggao'=>'商业广告',
            'poster'=>$poster,
            'video'=>'热点视频',
            'data'=>$data,
        ]);
    }

    /**
     * 加载搜索页面
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getSearch(Request $request)
    {
        //获取查询的关键字
        $keywords = $request->only('keywords');
        $search = Content::where('Ctitle','like','%'.$keywords['keywords'].'%')->orderby('Cid','desc')->get();
        
        // dd($search[0]);
        //获取商业广告，取3条
        $poster = Poster::where('POtype','=','商业广告')->orderby('POid','desc')->take(3)->get();
        $data = Release::where('Evideo','!=','null')->take(1)->get();
        if(empty($search[0])){
            return view('/home/content/search404',[
            'title'=>'很抱歉，没有找到您所搜索的信息！',
            'search'=>$search,
            'poster'=>$poster,
            'video'=>'热点视频',
            'data'=>$data,
            ]);
        }
        return view('/home/content/search',[
            'keywords'=>$keywords,
            'search'=>$search,
            'poster'=>$poster,
            'video'=>'热点视频',
            'data'=>$data,
        ]);
    }
}

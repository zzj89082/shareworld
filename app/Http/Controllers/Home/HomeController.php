<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Type;
use App\Models\Comment;
use App\Models\Release;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        echo 'fuck';
    }

    /**
     * 军事首页
     */
    public function getMilitary()
    {
        $data = Content::where('Ccategory','军事') -> orderby('Cid','desc') -> get();

        return view('/home/content/military',['title' => '军事资讯','military_data' => $data]);
    }

    /**
     * 新鲜事首页
     * @return [type] [description]
     */
    public function getNovelty()
    {
        //新鲜事数据
        $data_novelty = Content::where('Ccategory','=','新鲜事') -> orderby('Cid','desc') -> paginate(10);
        // dd($data_novelty);
        foreach ($data_novelty as $key => $value) {
            $data_novelty[$key]['Ualais'] = $value ->novelty_user->Ualais; //属于关系 用户名
            $data_novelty[$key]['Uimage'] = $value ->novelty_user->Uimage; //属于关系 用户头像
        }

        $data_count = [];
        //统计内容的评论次数
        foreach ($data_novelty as $key => $value) {
            //统计每条的评论数
            $data_novelty[$key]['count'] = Comment::where('Cid','=',$value['Cid'])->count(); 
            //统计评论最多
            $data_count[$value->Cid] = Comment::where('Cid','=',$value['Cid'])->count();
        } 
        //获取最大值的键名 用于查询
        $Cid = array_search(max($data_count), $data_count);
        //获取评论最多的数据
        $data_max = Content::find($Cid);
        //获取内容的用户
        $data_max['Ualais'] = $data_max->novelty_user->Ualais; //用户名
        $data_max['Uimage'] = $data_max->novelty_user->Uimage; //用户头像
        $data_max['max'] = max($data_count); //存最多评论数

        //评论最多的所有评论信息及用户名
        $data_comment = Comment::where('Cid','=',$Cid)->orderby('created_at','desc')->take(5)->get();
        // dd($data_comment);
        //建立属于关系 所用评论用户
        foreach ($data_comment as $key => $value) {
            $data_comment[$key]['Ualais'] = $value->comment_user->Ualais; //获取评论用户名
            $data_comment[$key]['Uimage'] = $value->comment_user->Uimage; //获取评论用户头像
        }

        //获取视频
        $data_video = Release::where('Evideo','!=','')->orderby('created_at','desc')->first();
        //引入新鲜事模板
        return view('/home/content/novelty',[
            'title'=>'新鲜事',
            'data_novelty'=>$data_novelty,
            'data_max'=>$data_max,
            'data_comment'=>$data_comment,
            'data_video'=>$data_video
        ]);
    }

    /**
     * 搞笑首页
     * @return [type] [description]
     */
    public function getCold()
    {
        //搞笑数据
        $data_cold = Content::where('Ccategory','=','搞笑')->orderby('Cid','desc')->paginate(6);
        // dd($data_cold);
        foreach ($data_cold as $key => $value) {
            $data_cold[$key]['Ualais'] = $value ->novelty_user->Ualais; //属于关系 用户名
            $data_cold[$key]['Uimage'] = $value ->novelty_user->Uimage; //属于关系 用户头像
        }
        $data_count = [];
        //统计内容的评论次数
        foreach ($data_cold as $key => $value) {
            //统计每条的评论数
            $data_cold[$key]['count'] = Comment::where('Cid','=',$value['Cid'])->count(); 
            //统计评论最多
            $data_count[$value->Cid] = Comment::where('Cid','=',$value['Cid'])->count();
        } 
        //获取最大值的键名 用于查询
        $Cid = array_search(max($data_count), $data_count);
        //获取评论最多的数据
        $data_max = Content::find($Cid);
        //获取内容的用户
        $data_max['Ualais'] = $data_max->novelty_user->Ualais; //用户名
        $data_max['Uimage'] = $data_max->novelty_user->Uimage; //用户头像
        $data_max['max'] = max($data_count); //存最多评论数

        //评论最多的所有评论信息及用户名
        $data_comment = Comment::where('Cid','=',$Cid)->orderby('created_at','desc')->take(5)->get();
        // dd($data_comment);
        //建立属于关系 所用评论用户
        foreach ($data_comment as $key => $value) {
            $data_comment[$key]['Ualais'] = $value->comment_user->Ualais; //获取评论用户名
            $data_comment[$key]['Uimage'] = $value->comment_user->Uimage; //获取评论用户头像
        }

        //获取视频
        $data_video = Release::where('Evideo','!=','')->orderby('created_at','desc')->first();
        //引入搞笑模板
        return view('/home/content/cold',[
            'title'=>'搞笑',
            'data_cold'=>$data_cold,
            'data_max'=>$data_max,
            'data_comment'=>$data_comment,
            'data_video'=>$data_video
        ]);
    }

    /**
     * 时尚首页
     * @return [type] [description]
     */
    public function getFashion()
    {
        //时尚数据
        $data_fashion = Content::where('Ccategory','=','时尚')->orderby('Cid','desc')->paginate(10);
        foreach ($data_fashion as $key => $value) {
            $data_fashion[$key]['Ualais'] = $value ->novelty_user->Ualais; //属于关系 用户名
            $data_fashion[$key]['Uimage'] = $value ->novelty_user->Uimage; //属于关系 用户头像
        }
        $data_count = [];
        //统计内容的评论次数
        foreach ($data_fashion as $key => $value) {
            //统计每条的评论数
            $data_fashion[$key]['count'] = Comment::where('Cid','=',$value['Cid'])->count(); 
            //统计评论最多
            $data_count[$value->Cid] = Comment::where('Cid','=',$value['Cid'])->count();
        } 
        //获取最大值的键名 用于查询
        $Cid = array_search(max($data_count), $data_count);
        //获取评论最多的数据
        $data_max = Content::find($Cid);
        //获取内容的用户
        $data_max['Ualais'] = $data_max->novelty_user->Ualais; //用户名
        $data_max['Uimage'] = $data_max->novelty_user->Uimage; //用户头像
        $data_max['max'] = max($data_count); //存最多评论数

        //评论最多的所有评论信息及用户名
        $data_comment = Comment::where('Cid','=',$Cid)->orderby('created_at','desc')->take(5)->get();
        // dd($data_comment);
        //建立属于关系 所用评论用户
        foreach ($data_comment as $key => $value) {
            $data_comment[$key]['Ualais'] = $value->comment_user->Ualais; //获取评论用户名
            $data_comment[$key]['Uimage'] = $value->comment_user->Uimage; //获取评论用户头像
        }

        //获取视频
        $data_video = Release::where('Evideo','!=','')->orderby('created_at','desc')->first();
        //引入搞笑模板
        return view('/home/content/fashion',[
            'title'=>'时尚',
            'data_fashion'=>$data_fashion,
            'data_max'=>$data_max,
            'data_comment'=>$data_comment,
            'data_video'=>$data_video
        ]);
    }
}

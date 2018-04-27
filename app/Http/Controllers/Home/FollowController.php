<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\User;//用户模型
Use App\Models\Comment;//评论模型
use App\Models\Content;//内容模型
use App\Models\Poster;//广告模型
use App\Models\Release;//发布模型
class FollowController extends Controller
{
    /**
     * 所有的关注的人
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //通过session查找用户
        $Ualais = session('home_login');
        $user = User::where('Ualais',$Ualais)->orWhere('Uemail',$Ualais) -> orWhere('Utel',$Ualais)->first();//查询用户的信息
        if($user['Uattention'] == null){
            $user['UattentionCount'] = 0;
        }else{ 
            $user['UattentionCount'] = count(explode(',',rtrim($user['Uattention'],',')));//关注人总数
        }
        if($user['Ubean'] == null){
            $user['UbeanCount'] = 0;
        }else{
            $user['UbeanCount'] = count(explode(',',rtrim($user['Ubean'],',')));//粉丝总数
        }
        //查找所有的关注人
        $Uattention = explode(',',rtrim($user['Uattention'],','));
        $Uattention_data = User::find($Uattention);
        //查找最新资讯
        $content_data = Content::orderby('Cid','desc') -> take(4) -> get();
        foreach ($content_data as $key => $value) {
            //统计每条的评论数
            $content_data[$key]['count'] = Comment::where('Cid','=',$value['Cid'])->count(); 
        }

        //获取最新商业广告，取1条
        $poster = Poster::where('POtype','=','商业广告')->orderby('POid','desc')->first();

        //获取最新视频，取1条
        $video = Release::where('Evideo','!=','')->orderby('created_at','desc')->first();

        return view('/home/personal/follow',[
            'Uattention_data' => $Uattention_data,
            'user' => $user,
            'content_data' => $content_data,
            'poster' => $poster,
            'video' => $video,
            ]);
    }
    /**
     * 所有的粉丝
     */
    public function getBean()
    {
        //通过session查找用户
        $Ualais = session('home_login');
        $user = User::where('Ualais',$Ualais)->orWhere('Uemail',$Ualais) -> orWhere('Utel',$Ualais)->first();//查询用户的信息
        if($user['Uattention'] == null){
            $user['UattentionCount'] = 0;
        }else{ 
            $user['UattentionCount'] = count(explode(',',rtrim($user['Uattention'],',')));//关注人总数
        }
        if($user['Ubean'] == null){
            $user['UbeanCount'] = 0;
        }else{
            $user['UbeanCount'] = count(explode(',',rtrim($user['Ubean'],',')));//粉丝总数
        }
        //查找所有粉丝
        $Ubean = explode(',',rtrim($user['Ubean'],','));
        $Ubean_data = User::find($Ubean);

        //查找最新资讯
        $content_data = Content::orderby('Cid','desc') -> take(4) -> get();
        foreach ($content_data as $key => $value) {
            //统计每条的评论数
            $content_data[$key]['count'] = Comment::where('Cid','=',$value['Cid']) -> count(); 
        }

        //获取最新商业广告，取1条
        $poster = Poster::where('POtype','=','商业广告') -> orderby('POid','desc') -> first();

        //获取最新视频，取1条
        $video = Release::where('Evideo','!=','') -> orderby('created_at','desc') -> first();

        return view('/home/personal/bean',[
            'Ubean_data'=>$Ubean_data,
            'user' => $user,
            'content_data' => $content_data,
            'poster' => $poster,
            'video' => $video,
            ]);
    }

    /**
     * ajax无刷新关注与粉丝
     */
    public function getAjax(Request $request)
    {
        //关注的uid
        $Uid = $request -> input('Uid');
        //当前用户
        $user = $request -> input('user');

        //当前用户操作关注
        $Uattention = User::find($user);
        $Uattention -> Uattention .= $Uid.',';
        $Uattention -> save();

        //被关注用户操作(粉丝)
        $Ubean = User::find($Uid);
        $Ubean -> Ubean .= $user.',';
        $Ubean -> save();
        //成功返回
        echo 1;
    }
    /**
     * ajax无刷新取消关注与粉丝
     */
    public function getAjax2(Request $request)
    {
        //关注的uid
        $Uid = $request -> input('Uid');
        //当前用户
        $user = $request -> input('user');

        //当前用户操作关注
        $Uattention = User::find($user);
        //检测关注人是否存在
        if(strstr($Uattention -> Uattention,$Uid)){
            $Uid = $Uid.',';
            $Uattention -> Uattention = str_replace($Uid,"",$Uattention->Uattention);
        }
        $Uattention->save();

        //被关注用户操作(粉丝)
        $Ubean = User::find($Uid);
        //检测关注人是否存在
        if(strstr($Ubean -> Ubean,$user)){
            $user = $user.',';
            $Ubean -> Ubean = str_replace($user,"",$Ubean->Ubean);
        }
        $Ubean -> save();

        //成功返回
        echo 1;
    }
    /**
     * ajax点赞
     */
    public function getDianzan(Request $request)
    {
        //点赞的发布内容
        $Eid = $request -> input('Eid');
        //点赞的uid
        $Uid = $request -> input('Uid');
        //执行保存
        $release = Release::where('Eid','=',$Eid) -> first();

        $release -> Elike += 1;
        $release -> Elike_Uid .= $Uid.',';
        $release -> save();

        //成功后
        echo 1;
    }
        /**
     * ajax取消点赞
     */
    public function getDianzan2(Request $request)
    {
        //点赞的发布内容
        $Eid = $request -> input('Eid');
        //点赞的uid
        $Uid = $request -> input('Uid');
        //执行保存
        $release = Release::where('Eid','=',$Eid) -> first();
        //检测关注人是否存在
        if(strstr($release -> Elike_Uid,$Uid)){
            $Uid = $Uid.',';
            $release -> Elike_Uid = str_replace($Uid,"",$release->Elike_Uid);
            $release -> Elike -= 1;
        }
        $release -> save();

        //成功后
        echo 1;
    }
}

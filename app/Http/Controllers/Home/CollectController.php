<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Collect;
use App\Models\Poster;//广告模型
Use App\Models\Content;//内容模型
use App\Models\Release;//发布模型
use App\Models\Comment;//发布评论
use DB;

class CollectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postAdd(Request $request)
    {
        $cid = $request->only('cid');
        $uname = session('home_login');
        $user = User::where('Ualais','=',$uname)->orWhere('Uemail','=',$uname)->orWhere('Utel','=',$uname)->first();
        $collect = new Collect;
        $collect->uid = $user['Uid'];
        $collect->cid = $cid['cid'];;
        $res = $collect->save();
        if($res){
            echo '{"code":"1","data":"收藏成功"}';
        }else{
            echo '{"code":"2","data":"收藏失败"}';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postDelete(Request $request)
    {
        $cid = $request->only('cid');
        $uname = session('home_login');
        $user = User::where('Ualais','=',$uname)->orWhere('Uemail','=',$uname)->orWhere('Utel','=',$uname)->first();
        $res = Collect::where('cid','=', $cid['cid'])->where('uid','=', $user['Uid'])->delete();
        if($res){
            echo '{"code":"1","data":"取消收藏"}';
        }else{
            echo '{"code":"2","data":"取消失败"}';
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postReleaseadd(Request $request)
    {
        $eid = $request->only('eid');
        $uname = session('home_login');
        $user = User::where('Ualais','=',$uname)->orWhere('Uemail','=',$uname)->orWhere('Utel','=',$uname)->first();
        $collect = new Collect;
        $collect->uid = $user['Uid'];
        $collect->eid = $eid['eid'];;
        $res = $collect->save();
        if($res){
            echo '{"code":"1","data":"收藏成功"}';
        }else{
            echo '{"code":"2","data":"收藏失败"}';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postReleasedelete(Request $request)
    {
        $eid = $request->only('eid');
        $uname = session('home_login');
        $user = User::where('Ualais','=',$uname)->orWhere('Uemail','=',$uname)->orWhere('Utel','=',$uname)->first();
        $res = Collect::where('eid','=', $eid['eid'])->where('uid','=', $user['Uid'])->delete();
        if($res){
            echo '{"code":"1","data":"取消收藏"}';
        }else{
            echo '{"code":"2","data":"取消失败"}';
        }
    }


    public function getList()
    {
        $uname = session('home_login');
        $user = User::where('Ualais','=',$uname)->orWhere('Uemail','=',$uname)->orWhere('Utel','=',$uname)->first();
        $collect = $user->collect;
        $release = Release::orderby('created_at','desc');
        $releasecollect = $user->releasecollect;
        foreach ($releasecollect as $key => $value){
            $releasecollect[$key]['Uimage'] = User::where('Ualais','=',$value['Ualais'])->lists('Uimage')->first();
            $releasecollect[$key]['Uid'] = User::where('Ualais','=',$value['Ualais'])->lists('Uid')->first();
            if($releasecollect[$key]['Eimg']!=null){   
                $releasecollect[$key]['Eimg'] = explode(',',rtrim($releasecollect[$key]['Eimg'],','));
            }
            $releasecollect[$key]['count'] = Comment::where('Eid','=',$value['Eid'])-> count();
        }
        $sport = Content::where('Ccategory','=','体育')->orderby('Cid','desc')->get();
        $poster = Poster::where('POtype','=','商业广告')->orderby('POid','desc')->take(3)->get();
        $data = Release::where('Evideo','!=','null')->take(1)->get();
        return view('/home/personal/collect',[
            'title'=>'我的收藏',
            'collect'=>$collect,
            'releasecollect'=>$releasecollect,
            'sport'=>$sport,
            'poster'=>$poster,
            'data'=>$data,
            'guanggao'=>'商业广告',
            'video'=>'热点视频',
        ]);
    }

    
}

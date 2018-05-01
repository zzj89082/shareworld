<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Comment; //评论模型
use App\Models\Admin\User; //用户模型
use App\Models\Poster;//广告模型
use App\Models\Release;//发布模型
use App\Models\Content;//内容模型
class HcommentController extends Controller
{
    /**
     * 列表页
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //获取当前用户
        $username = session('home_login');
        //查询用户信息
        $user = User::where('Ualais','=',$username)->orWhere('Uemail','=',$username)->orWhere('Utel','=',$username)->first();
        // dd($user);
        //计算数量
        if(empty($user['Uattention'])){
            $user['UattentionCount'] = 0;
        }else{ 
            $user['UattentionCount'] = count(explode(',',rtrim($user['Uattention'],',')));//关注人总数
        }
        if(empty($user['Ubean'])){
            $user['UbeanCount'] = 0;
        }else{
            $user['UbeanCount'] = count(explode(',',rtrim($user['Ubean'],',')));//粉丝总数
        }
        //所有用户的相关评论
        $data = Comment::where('Uid','=',$user['Uid'])->get();
        //获取最新商业广告，取1条
        $poster = Poster::where('POtype','=','商业广告')->orderby('POid','desc')->first();
        //获取最新视频，取1条
        $video = Release::where('Evideo','!=','')->orderby('created_at','desc')->first();
        //查找最新资讯
        $content_data = Content::orderby('Cid','desc') -> take(4) -> get();
        foreach ($content_data as $key => $value) {
            //统计每条的评论数
            $content_data[$key]['count'] = Comment::where('Cid','=',$value['Cid'])->count(); 
        }
        return view('home/personal/comment',[
            'data' => $data,
            'user' => $user,
            'poster' => $poster,
            'video' => $video,
            'content_data' => $content_data,
            ]);
    }

    /**
     * 添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * 添加评论
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        if(isset($request->tijiao_content)) {
            //接收恢复数据
            
            $huifu_data = $request -> except('_token');
            // 取用户信息
            $user = User::where('Utel',session('home_login'))->orWhere('Uemail',session('home_login'))->first();
            if($user) {
                //执行插入
                $id = Comment::insertGetId(['Uid'=>$user->Uid,'Discuss_type2'=>$huifu_data['Discuss_type2'],'Discuss_type'=>$huifu_data['Discuss_type'],'Bualais'=>$huifu_data['username'],'Homebualais'=>$user->Ualais,'Eid'=>$huifu_data['Eid'],'Dcontent'=>$huifu_data['tijiao_content'],'created_at'=>date('Y-m-d H:i:s',time())]);
                //返回插入数据 json
                $data = Comment::find($id);
                $data->Uimg = $user->Uimage;
                // $data->Did = $id;
                echo json_encode($data);
            } else {
                echo 0;
            }
        } else {
             //接收数据
            $comment_data = $request -> except('_token');
            // 取用户信息
            $user = User::where('Utel',session('home_login'))->orWhere('Uemail',session('home_login'))->first();
            if($user) {
                //执行插入
                $id = Comment::insertGetId(['Uid'=>$user->Uid,'Homebualais'=>$user->Ualais,'Eid'=>$comment_data['Eid'],'Dcontent'=>$comment_data['comment'],'created_at'=>date('Y-m-d H:i:s',time())]);
                //插入Discuss_type 获取自身的ID
                $type = Comment::find($id);
                $type->Discuss_type = $id;
                $type->save();
                //返回插入数据 json
                $data = Comment::find($id);
                $data->Uimg = $user->Uimage;
                $data->Did = $id;
                echo json_encode($data);
            } else {
                echo 0;
            }
        }
    }

    /**
     * 详情页
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 修改页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 修改数据
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
     * 删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

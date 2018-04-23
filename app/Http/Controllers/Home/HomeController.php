<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\User;//用户模型
use App\Models\Content;//内容模型
use App\Models\Type;//类别模型
use App\Models\Poster;//广告模型
Use App\Models\Comment;//评论模型
use App\Models\Release;//发布模型
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
        //军事资讯
        $military_data = Content::where('Ccategory','军事') -> orderby('Cid','desc');
        $military_data = $military_data->paginate(6);
        //广告,最新的2个广告
        $poster_data = Poster::orderby('POid','desc') -> take(2)->get();

        //评论最多的id
        $military_data2 = Content::where('Ccategory','军事') -> orderby('Cid','desc') -> get();
        $data_count = [];
        foreach ($military_data2 as $key => $value) {
            //统计每条的评论数
            $military_data2[$key]['count'] = Comment::where('Cid','=',$value['Cid'])->count(); 
            //统计评论最多
            $data_count[$value->Cid] = Comment::where('Cid','=',$value['Cid'])->count();
        }
        //获取最大值的键名 用于查询
        $Cid = array_search(max($data_count), $data_count);
        //评论最多的1个资讯
        $military_hot = Content::find($Cid); 
        $military_hot['count'] = Comment::where('Cid','=',$Cid)->count();

        //通过评论的id查询--评论的用户
        $com_id = Comment::where('Cid','=',$Cid) -> orderby('Did','desc') -> take(5) -> lists('Did');
        $i = 1;
        foreach($com_id as $k => $v)
        {
            $comment = Comment::find($v);
            $comment_data[$i]['Did'] = $comment -> Did;//评论编号
            $comment_data[$i]['Dcontent'] = $comment -> Dcontent;//评论内容
            $comment_data[$i]['created_at'] = $comment -> created_at;//评论时间
            $comment_data[$i]['Uid'] = $comment -> Uid;//评论者ID
            $comment_data[$i]['Uimage'] = $comment -> comment_users -> Uimage;
            $i++;

        }




        return view('/home/content/military',[
            'title' => '军事资讯',
            'military_data' => $military_data,
            'military_data2' => $military_data2,
            'poster_data' => $poster_data,
            'military_hot' => $military_hot,
            'comment_data' => $comment_data
        ]);
    }
    /**
     * 美女首页
     */
    public function getGril()
    {
        //军事资讯
        $gril_data = Content::where('Ccategory','美女') -> orderby('Cid','desc');
        //添加分页
        $gril_data = $gril_data->paginate(6);
        //广告,最新的2个广告
        $poster_data = Poster::orderby('POid','desc') -> take(2)->get();

        //计算评论最多的id (用$gril_data2重新查询，是为了不影响分页)
        $gril_data2 = Content::where('Ccategory','美女') -> orderby('Cid','desc') -> get();
        $data_count = [];
        foreach ($gril_data2 as $key => $value) {
            //统计每条的评论数
            $gril_data2[$key]['count'] = Comment::where('Cid','=',$value['Cid'])->count(); 
            //统计评论最多
            $data_count[$value->Cid] = Comment::where('Cid','=',$value['Cid'])->count();
        }
        //获取最大值的键名 用于查询
        $Cid = array_search(max($data_count), $data_count);
        //得到最多的1个资讯和其评论数
        $gril_hot = Content::find($Cid); 
        $gril_hot['count'] = Comment::where('Cid','=',$Cid)->count();
        
        //通过评论的id查询--评论的用户
        $com_id = Comment::where('Cid','=',$Cid) -> orderby('Did','desc') -> take(5) -> lists('Did');
        $i = 1;
        foreach($com_id as $k => $v)
        {
            $comment = Comment::find($v);
            $comment_data[$i]['Did'] = $comment -> Did;//评论编号
            $comment_data[$i]['Dcontent'] = $comment -> Dcontent;//评论内容
            $comment_data[$i]['created_at'] = $comment -> created_at;//评论时间
            $comment_data[$i]['Uid'] = $comment -> Uid;//评论者ID
            $comment_data[$i]['Uimage'] = $comment -> comment_users -> Uimage;
            $i++;

        }
        return view('/home/content/gril',[
            'title'=>'美女动态',
            'gril_data' => $gril_data,
            'gril_data2' => $gril_data2,
            'poster_data' => $poster_data,
            'gril_hot' => $gril_hot,
            'comment_data' => $comment_data
            ]);
    }
    /**
     * 内容详情页
     */
    public function getShow($Cid)
    {
        //获取单个的内容
        $content_show = Content::find($Cid);
        //广告,最新的2个广告
        $poster_data = Poster::orderby('POid','desc') -> take(2)->get();
        //相关评论
        //通过评论的id查询--评论的用户
        $com_id = Comment::where('Cid','=',$Cid) -> orderby('Did','desc') -> take(10) -> lists('Did');
        $i = 1;
        if($com_id->count() > 0){
            foreach($com_id as $k => $v)
            {
                $comment = Comment::find($v);
                $comment_data[$i]['Did'] = $comment -> Did;//评论编号
                $comment_data[$i]['Dcontent'] = $comment -> Dcontent;//评论内容
                $comment_data[$i]['created_at'] = $comment -> created_at;//评论时间
                $comment_data[$i]['Uid'] = $comment -> Uid;//评论者ID
                $comment_data[$i]['Ualais'] = $comment -> comment_users -> Ualais;//评论者昵称
                $reply_data = null;
                //回复的用户
                if(DB::select('select * from sw_discuss where Bualais=?',[$comment_data[$i]['Ualais']]) != null){
                    $reply_Ualais = Comment::where('Bualais','=',$comment -> comment_users -> Ualais) -> orderby('Did','desc') -> take(5) -> lists('Did');
                    $j = 1;
                    foreach($reply_Ualais as $key => $value)
                    {
                        $reply = Comment::find($value);
                        $reply_data[$j]['Did'] = $reply -> Did;//评论编号
                        $reply_data[$j]['Dcontent'] = $reply -> Dcontent;//评论内容
                        $reply_data[$j]['created_at'] = $reply -> created_at;//评论时间
                        $reply_data[$j]['Uid'] = $reply -> Uid;//评论者ID
                        $reply_data[$j]['Ualais'] = $reply -> comment_users -> Ualais;//评论者昵称
                        $reply_data[$j]['Uimage'] = $reply -> comment_users -> Uimage;//评论者的头像
                        $j++;
                    } 
                    $comment_data[$i]['replay'] = true;
                } else {
                    $comment_data[$i]['replay'] = false;
                }

                $comment_data[$i]['Uimage'] = $comment -> comment_users -> Uimage;//评论者的头像
                $i++;

            }
        return view('/home/content/show',[
            'content_show'=>$content_show,
            'poster_data' => $poster_data,
            'comment_data' => $comment_data,
            'reply_data' => $reply_data
            ]);
        }else {
            return view('/home/content/show',[
            'content_show'=>$content_show,
            'poster_data' => $poster_data,
            'comment_data' => null,
            'reply_data' => null
            ]);
        }
    }
    /**
     * 发表评论
     */
    public function postComment(Request $request,$Cid)
    {
        $Cid = $Cid;//获取内容的ID
        if($request->session()->has('home_login')){
            $Ualais = session('home_login');//获取session中用户的信息
        }
        if($request->cookie('home_login')){
            $Ualais = $request->cookie('home_login');//获取cookie中用户的信息
        }
        $user = User::where('Ualais',$Ualais)->first();//查询用户的信息
        $Uid = $user['Uid'];//取出用户的ID

        $data = $request -> only('Dcontent');//获取评论的内容

        // 验证请求...
        $flight = new Comment;
        $flight->Uid = $Uid;
        $flight->Cid = $Cid;
        $flight->Dcontent = $data['Dcontent'];
        $res = $flight->save();
        if($res){
             return '<script type="text/javascript">alert("回复成功");location.href="/home/show/'.$Cid.'"</script>';
        }else {
             return '<script type="text/javascript">alert("回复失败");location.href="/home/show/'.$Cid.'"</script>';
        }
    }
}

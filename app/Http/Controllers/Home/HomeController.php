<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use App\User;//用户模型
use App\Models\Rollimg;//轮播模型
use App\Models\Content;//内容模型
use App\Models\Type;//类别模型
use App\Models\Poster;//广告模型
Use App\Models\Comment;//评论模型
use App\Models\Release;//发布模型
use Illuminate\Support\Facades\Cache;//缓存
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
    /** 加载搜索页面
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

    /**
     * 美女首页
     */
    public function getGril()
    {
        //美女动态
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
        if($request->session()->has('home_login')==false && $request->cookie('home_login') == null){
            return '<script type="text/javascript">alert("请您登录");location.href="/home/login/index"</script>';
        }
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
             return '<script type="text/javascript">alert("回复成功");location.href="/home/show/'.(int)$Cid.'"</script>';
        }else {
             return '<script type="text/javascript">alert("回复失败");location.href="/home/show/'.(int)$Cid.'"</script>';
        }
    }
    /**
     * 头条展示页面
     *
     * @return \Illuminate\Http\Response
     */
    public function getTop()
    {
       
        //数据库操作的方式
        $data = Content::where('Ccategory','头条')->get();
        return view('home.content.top',['title'=>'今日头条','data' => $data]);
    }

    /**
     * 视频展示页面
     *
     * @return \Illuminate\Http\Response
     */
    public function getVideo()
    {
        $data = Release::where('Evideo','!=','null')->get();
        $content = Content::orderby('Cid','desc')->first();
        //获取除第一条内容之外的所有内容只取4条
        $content1 = Content::where('Cid','!=',$content->Cid)->take(4)->orderby('Cid','desc')->get();
        //获取分类为热门的数据
        $remen = Content::where('Ccategory','=','热门')->orderby('Cid','desc')->get();
        $data = Release::where('Evideo','!=','null')->take(2)->get();
        // dd($data);
        return view('home.content.video',[
            'lunbo'=>'热点推荐',
            'redian'=>'每日热点',
            'content'=>$content,
            'content1'=>$content1,
            'remen'=>$remen,
            'data'=>$data,
        ]);

        return view('home.content.video',['data' => $data]);
    }

    /**
     * 加入memcache缓存机制
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getContent(Request $request)
    {
      if(Cache::has('data')){
            //echo 'memcache';
            $data = Cache::get('data'); //获取
        }else{
            //echo 'mysql';
            $id = $request->input('Cid');
            $data = Content::find($id);
            Cache::put('data',$data,1440);
        }
        return view('home.content.content',['data'=>$data]);

    }
}

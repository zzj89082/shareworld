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
use App\Models\Collect;//收藏模型
use App\Models\Feedback;//信息反馈模型
use Illuminate\Support\Facades\Cache;//缓存
use App\Models\Config; //网站配置
class HomeController extends Controller
{

    /**
     * 加载前台首页模板
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询网站配置
        $data_config = Config::find(1);
        // 存入session
        session(['data_config'=>$data_config]);
        //获取轮播图
        $rollimg = Rollimg::orderby('created_at','desc') ->take(4)->get();
        //获取第一条内容
        $content = Content::orderby('Cid','desc')->first();
        $content['Ccomment'] = Comment::where('Cid','=',$content['Cid'])->count(); 
        //获取除第一条内容之外的所有内容只取4条        
        $content1 = Content::where('Cid','!=',$content->Cid)->take(4)->orderby('Cid','desc')->get();
        foreach ($content1 as $key => $value) {
            //统计每条的评论数
            $content1[$key]['Ccomment'] = Comment::where('Cid','=',$value['Cid'])->count(); 
        }
        //获取分类为热门的数据       
        $remen = Content::where('Ccategory','=','热门')->orderby('Cid','desc')->get();
        foreach ($remen as $key => $value) {
            //统计每条的评论数
            $remen[$key]['Ccomment'] = Comment::where('Cid','=',$value['Cid'])->count(); 
        }
        $data = Release::where('Evideo','!=','null') -> orderby('Eid','desc') -> take(2) -> get();
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
        $sport = Content::where('Ccategory','=','体育')->orderby('Cid','desc');
        $sport = $sport -> paginate(6);
        //获取商业广告，取3条
        $poster = Poster::where('POtype','=','商业广告')->orderby('POid','desc')->take(3)->get();
        // dd($poster);
        return view('/home/content/sport',[
            'sport'=>$sport,
            'title'=>'体育竞技 ',
            'guanggao'=>'商业广告',
            'poster'=>$poster,
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
        if(count($com_id)>0){
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
        } else {
            return view('/home/content/military',[
                'title' => '军事资讯',
                'military_data' => $military_data,
                'military_data2' => $military_data2,
                'poster_data' => $poster_data,
                'military_hot' => $military_hot,
            ]);
        }
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
        if(count($com_id)>0){
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
        } else {
            return view('/home/content/gril',[
                'title'=>'美女动态',
                'gril_data' => $gril_data,
                'gril_data2' => $gril_data2,
                'poster_data' => $poster_data,
                'gril_hot' => $gril_hot,
                ]);
        }
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
            $data_novelty[$key]['Ccomment'] = Comment::where('Cid','=',$value['Cid'])->count(); //计算评论次数
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
        $data_max['Ccomment'] = Comment::where('Cid','=',$data_max['Cid'])->count(); 
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
        $data_max['Ccomment'] = Comment::where('Cid','=',$data_max['Cid'])->count(); 

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
        $data_max['Ccomment'] = Comment::where('Cid','=',$data_max['Cid'])->count();

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
     * 内容详情页
     */
    public function getShow($id)
    {
        //获取当前用户
        $username = session('home_login');
        $user = User::where('Ualais','=',$username)->orWhere('Uemail','=',$username)->orWhere('Utel','=',$username)->first();
        $collect = Collect::where('cid','=',$id)->where('uid','=',$user['Uid'])->first();
        //获取单个的内容
        $content_show = Content::find($id);
        $content_show -> Ccount +=1;
        $content_show -> save();
        //广告,最新的2个广告
        $poster_data = Poster::orderby('POid','desc') -> take(2)->get();
         //相关评论
        //通过评论的id查询--评论的用户
        //取Eid隐藏域传递Eid
         //取Eid隐藏域传递Eid
        $data_find = Content::find($id);
        $user = User::where('Utel',session('home_login'))->orWhere('Uemail',session('home_login'))->first();
        //取评论内容的评论
        $data_get = Comment::where('Bualais','=',0)->where('Homebualais','!=','null')->where('Cid',$id)->orderBy('created_at','asc')->get();
        if(!empty($data_get[0])) {
            //循环使用模型
            $data_bp = [];
            foreach ($data_get as $key => $value) {
                $data_get[$key]['Uimage'] = $value->comment_user->Uimage; //取用户头像
                //取标识
                $data_bp = Comment::where('Cid',$id)->lists('Discuss_type2');
                //第一层评论
                // $data_get1 = Comment::where('Eid',$id)->where('Discuss_type',$value->Discuss_type)->where('Discuss_type2',$value->Did)->get();                

                foreach ($data_bp as $key1 => $value1) {
                     if($value1 == null) {
                        unset($value1);
                        continue;
                    }
                    if($value1 == $value->Did) {
                        $value['yi'] = Comment::where('Discuss_type2',$value1)->orderBy('created_at','asc')->get(); 
                    }
                }
            }    
        }
        //取出头像
        foreach ($data_get as $key => $value) {
            if(isset($value->yi)) {
                foreach ($value->yi as $key1 => $value1) {
                    $value->yi[$key1]['Uimage']  = $value1->comment_user->Uimage; //取用户头像
                }
            }
            
        }

        $a = [];
        if(isset($data_bp)) {
            foreach ($data_bp as $k => $v) {
                if($v == null) {
                    unset($k);
                    continue;
                }
                $a[] = $v;
            }   
            sort($a);
        }

        foreach ($data_get as $key => $value) {
            if(isset($value->yi)) {
                foreach ($value->yi as $key1 => $value1) {
                    $value1['yi2'] = Comment::where('Discuss_type2',$value1->Did)->orderBy('created_at','asc')->get();
                    foreach ($value1->yi2 as $key2 => $value2) {
                        $value1['yi2'][$key2]['Uimage'] = $value2->comment_user->Uimage; //取用户头像
                    }
                }
            }
        }
        return view('/home/content/show',[
            'data_find'=>$data_find,
            'data_get'=>$data_get,
            'user'=>$user,
            'content_show' => $content_show,
            'poster_data' => $poster_data,
            'collect'=>$collect,
        ]);
    }
    /**
     * 发表评论
     */
    public function postComment(Request $request)
    {
        if(isset($request->tijiao_content)) {
            //接收恢复数据
            $huifu_data = $request -> except('_token');
            // 取用户信息
            $user = User::where('Utel',session('home_login'))->orWhere('Uemail',session('home_login'))->first();
            if($user) {
                //执行插入
                $id = Comment::insertGetId(['Uid'=>$user->Uid,'Discuss_type2'=>$huifu_data['Discuss_type2'],'Discuss_type'=>$huifu_data['Discuss_type'],'Bualais'=>$huifu_data['username'],'Homebualais'=>$user->Ualais,'Cid'=>$huifu_data['Eid'],'Dcontent'=>$huifu_data['tijiao_content'],'created_at'=>date('Y-m-d H:i:s',time())]);
                //返回插入数据 json
                $data = Comment::find($id);
                $data->Uimg = $user->Uimage;
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
                $id = Comment::insertGetId(['Uid'=>$user->Uid,'Homebualais'=>$user->Ualais,'Cid'=>$comment_data['Eid'],'Dcontent'=>$comment_data['comment'],'created_at'=>date('Y-m-d H:i:s',time())]);
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
        $data = Release::where('Evideo','!=','null')->orderby('Eid','desc');
        $data = $data->paginate(4);
        $content = Content::orderby('Cid','desc')->first();
        //获取除第一条内容之外的所有内容只取4条
        $content1 = Content::where('Cid','!=',$content->Cid)->take(4)->orderby('Cid','desc')->get();
        return view('home.content.video',[
            'title'=>'最新视频',
            'redian'=>'每日热点',
            'content'=>$content,
            'content1'=>$content1,
            'data'=>$data,
        ]);
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
    /**
     * 关于我们
     */
    public function getGuanyu()
    {
       return view('home.content.guanyu');
    }
    /**
     * 信息反馈
     */
    public function getFankui()
    {
        //通过session查找用户
        $Ualais = session('home_login');
        $user = User::where('Ualais',$Ualais)->orWhere('Uemail',$Ualais) -> orWhere('Utel',$Ualais)->first();//查询用户的信息
        $feedback = Feedback::where('Uid','=',$user['Uid']) -> get();
        return view('home/content/feedback',['feedback' => $feedback]);
    }
    /**
     * 添加反馈
     */
    public function postAddfankui(Request $request)
    {
        $data = $request -> except(['_token']);
        //通过session查找用户
        $Ualais = session('home_login');
        $user = User::where('Ualais',$Ualais)->orWhere('Uemail',$Ualais) -> orWhere('Utel',$Ualais)->first();//查询用户的信息
        $Uid = $user['Uid'];

        //发送存储
        $feedback = new Feedback;
        $feedback -> Uid = $Uid;
        $feedback -> Fcontent = $data['text'];
        $res = $feedback -> save();
        if($res){
            return '<script type="text/javascript">alert("反馈成功");location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
        } else {
            return '<script type="text/javascript">alert("反馈失败");location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
        }
    }
}

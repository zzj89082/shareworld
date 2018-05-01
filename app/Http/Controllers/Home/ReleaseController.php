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
use App\Models\Collect;//收藏模型
class ReleaseController extends Controller
{
    /**
     * 发布首页展示
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //通过session查找用户
        $Ualais = session('home_login');
        $user = User::where('Ualais',$Ualais)->orWhere('Uemail',$Ualais) -> orWhere('Utel',$Ualais)->first();//查询用户的信息
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

        //获取发布的信息
        $release = Release::orderby('created_at','desc');
        $release = $release->paginate(3, ['*'], 'rpage');
        foreach ($release as $key => $value){
            $release[$key]['Uimage'] = User::where('Ualais','=',$value['Ualais'])->lists('Uimage')->first();
            $release[$key]['Uid'] = User::where('Ualais','=',$value['Ualais'])->lists('Uid')->first();
            if($release[$key]['Eimg']!=null){   
                $release[$key]['Eimg'] = explode(',',rtrim($release[$key]['Eimg'],','));
            }
            $release[$key]['count'] = Comment::where('Eid','=',$value['Eid'])-> count();
        }
        //获取热门的信息
        $remen = Content::where('Ccategory','=','热门')->orderby('Cid','desc');
        $remen = $remen->paginate(6, ['*'], 'mpage');
        foreach ($remen as $key => $value) {
            //统计每条的评论数
            $remen[$key]['count'] = Comment::where('Cid','=',$value['Cid'])-> count(); 
        }

        //获取头条的信息
        $toutiao = Content::where('Ccategory','=','头条')->orderby('Cid','desc');
        $toutiao = $toutiao->paginate(1, ['*'], 'tpage');;//----------------------数据不够，分页会报错，回头加数据
        foreach ($toutiao as $key => $value) {
            //统计每条的评论数
            $toutiao[$key]['count'] = Comment::where('Cid','=',$value['Cid'])-> count(); 
        }

        //获取视频的信息
        $shipin = Content::where('Ccategory','=','视频')->orderby('Cid','desc');
        $shipin = $shipin->paginate(1, ['*'], 'spage');//----------------------数据不够，分页会报错，回头加数据
        foreach ($shipin as $key => $value) {
            //统计每条的评论数
            $shipin[$key]['count'] = Comment::where('Cid','=',$value['Cid'])-> count(); 
        }

        //获取新鲜事的信息
        $xinxianshi = Content::where('Ccategory','=','新鲜事')->orderby('Cid','desc');
        $xinxianshi = $xinxianshi->paginate(3, ['*'], 'xpage');
        foreach ($xinxianshi as $key => $value) {
            //统计每条的评论数
            $xinxianshi[$key]['count'] = Comment::where('Cid','=',$value['Cid'])-> count(); 
        }

        //获取搞笑的信息
        $gaoxiao = Content::where('Ccategory','=','搞笑')->orderby('Cid','desc');
        $gaoxiao = $gaoxiao->paginate(3, ['*'], 'gpage');
        foreach ($gaoxiao as $key => $value) {
            //统计每条的评论数
            $gaoxiao[$key]['count'] = Comment::where('Cid','=',$value['Cid'])-> count(); 
        }

        //获取时尚的信息
        $shishang = Content::where('Ccategory','=','时尚')->orderby('Cid','desc');
        $shishang = $shishang->paginate(3, ['*'], 'hpage');
        foreach ($shishang as $key => $value) {
            //统计每条的评论数
            $shishang[$key]['count'] = Comment::where('Cid','=',$value['Cid'])-> count(); 
        }

        //获取军事的信息
        $junshi = Content::where('Ccategory','=','军事')->orderby('Cid','desc');
        $junshi = $junshi->paginate(3, ['*'], 'jpage');
        foreach ($junshi as $key => $value) {
            //统计每条的评论数
            $junshi[$key]['count'] = Comment::where('Cid','=',$value['Cid'])-> count(); 
        }

        //获取美女的信息
        $meinv = Content::where('Ccategory','=','美女')->orderby('Cid','desc');
        $meinv = $meinv->paginate(3, ['*'], 'vpage');
        foreach ($meinv as $key => $value) {
            //统计每条的评论数
            $meinv[$key]['count'] = Comment::where('Cid','=',$value['Cid'])-> count(); 
        }

        //获取体育的信息
        $tiyu = Content::where('Ccategory','=','体育')->orderby('Cid','desc');
        $tiyu = $tiyu->paginate(3, ['*'], 'ypage');
        foreach ($tiyu as $key => $value) {
            //统计每条的评论数
            $tiyu[$key]['count'] = Comment::where('Cid','=',$value['Cid'])-> count(); 
        }

    return view('/home/personal/release',[
            'user' => $user,
            'content_data' => $content_data,
            'poster' => $poster,
            'video' => $video,
            'release' => $release,
            'remen' => $remen,
            'toutiao' => $toutiao,
            'shipin' => $shipin,
            'xinxianshi' => $xinxianshi,
            'gaoxiao' => $gaoxiao,
            'shishang' => $shishang,
            'junshi' => $junshi,
            'meinv' => $meinv,
            'tiyu' => $tiyu,
        ]);
    }

    /**
     * 执行图片上传(无刷新)
     */
    public function postUpload(Request $request)
    {
        ///////////////////////
        //print_r($_FILES); //
        ///////////////////////
        if($request -> hasFile('profile')){
            $profile = $request -> file('profile');
            $temp_name = str_random(12);//随机35位字符串
            $hz = $profile -> getClientOriginalExtension();//后缀
            $name = $temp_name.'.'.$hz;
            $file_path = './uploads/release/'.date('Ymd',time());
            $created_at = date('Y-m-d H:i:s',time());
            $res = $profile -> move($file_path,$name);//上传
            //找到用户昵称
            $Ualais = User::where('Uemail','=',session('home_login')) -> orWhere('Utel','=',session('home_login'))->lists('Ualais') -> first();
            if($res){
                 DB::table('sw_tempImg')->insert(['Ualais'=>$Ualais,'Eimg'=>ltrim($file_path.'/'.$name,'.'),'created_at'=>$created_at]);
                 $res_str = [
                        'code'=>0, 
                        'msg'=>'上传成功',
                        'data'=>[
                            'src'=>ltrim($file_path.'/'.$name,'.')
                        ] 
                    ];
            }else{
                $res_str = [
                        'code'=>1, 
                        'msg'=>'上传失败',
                        'data'=>[
                            'src'=>''
                        ] 
                    ];
            }
        }else{
            $res_str = [
                        'code'=>2, 
                        'msg'=>'没有文件可上传',
                        'data'=>[
                            'src'=>''
                        ] 
                    ];
        }

        echo json_encode($res_str);
    }
    /**
     * 执行发布
     */
    public function postPublish(Request $request)
    {
        // 接收数据
        $data = $request -> except(['_token','profile']);
        if(isset($data['Evideo']) && !empty($data['Evideo']) &&  count($data) > 2){
            return '<script type="text/javascript">alert("视频与图片 只能上传一种哦亲！");location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
        }
        //-----用户名Ualais
        $home_login = session('home_login');
        $user = User::where('Ualais',$home_login)->orWhere('Uemail',$home_login) -> orWhere('Utel',$home_login)->first();//查询用户的信息
        $Ualais = $user['Ualais'];
        //-----用户输入文本Dcontent
        $Earticle = $data['Earticle'];

        //只上传图片
        if(empty($data['Evideo'])){
            unset($data['Earticle']);
            //------用户上传的图片Eimg
            $Eimg = '';
            $i = 0;
            foreach(array_reverse($data) as $k => $v){
                if($i > 3){
                    break;
                }
                $Eimg .= $v .',';
                $i++;
            }
            $flight = new Release;
            $flight->Ualais = $Ualais;
            $flight->Earticle = $Earticle;
            $flight->Eimg = $Eimg;
            $res = $flight->save();
            if($res){
                return '<script type="text/javascript">alert("发布成功");location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
            } else {
                return '<script type="text/javascript">alert("发布失败");location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
            }
        }
        //只上传视频
        if(!empty($data['Evideo'])){
            if ($_FILES['Evideo']['error'] != 0) {
            //匹配错误号，生成对应的错误信息
                switch($_FILES['Evideo']['error']) {
                    case 1:
                        return '<script type="text/javascript">alert("超过INI允许的大小");location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
                        break;
                    case 2:
                        return '<script type="text/javascript">alert("超过表单允许的大小");location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
                        break;
                    case 3:
                        return '<script type="text/javascript">alert("部分文件被上传");location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
                        break;
                    case 4:
                        return '<script type="text/javascript">alert("没有文件被上传");location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
                        break;
                    case 6:
                        return '<script type="text/javascript">alert("临时目录有问题");location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
                        break;
                    case 7:
                        return '<script type="text/javascript">alert("文件写入失败");location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
                        break;
                }
                return false;
            }
            $Evideo = $request -> file('Evideo');
            //创建临时文件名
            $temp_name = time().rand(100,999);
            //获取后缀名
            $hz = $Evideo -> getClientOriginalExtension();
            //拼接文件名
            $filename = $temp_name . '.' . $hz;
            //执行上传
            $Evideo -> move('./uploads/releaseVideo/'.date('Ymd',time()),$filename);
            //指定Evideo路径值
            $data_Evideo= '/uploads/releaseVideo/'.date('Ymd',time()).'/'.$filename;

            //执行数据库添加
            $flight = new Release;
            $flight->Ualais = $Ualais;
            $flight->Earticle = $Earticle;
            $flight->Evideo = $data_Evideo;
            $res = $flight->save();
            //判断是否成功
            if($res){
                return '<script type="text/javascript">alert("发布成功");location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
            }else{
                return '<script type="text/javascript">alert("发布失败");location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
            }
        }
    }
    /**
     * 发布详情页
     */
    public function getReleaseshow($id)
    {
        $username = session('home_login');
        $user = User::where('Ualais','=',$username)->orWhere('Uemail','=',$username)->orWhere('Utel','=',$username)->first();
        $collect = Collect::where('eid','=',$id)->where('uid','=',$user['Uid'])->first();
        //获取单个的内容
        $content_show = Release::find($id);
        if(!empty($content_show['Eimg'])){ 
            $content_show['Eimg'] = explode(',',rtrim($content_show['Eimg'],','));
        }
        $content_show['Uimage'] = User::where('Ualais','=',$content_show['Ualais']) -> lists('Uimage');
        //广告,最新的2个广告
        $poster_data = Poster::orderby('POid','desc') -> take(2)->get();
        //相关评论
        //通过评论的id查询--评论的用户
        //取Eid隐藏域传递Eid
         //取Eid隐藏域传递Eid
        $data_find = Release::find($id);  
        $user = User::where('Utel',session('home_login'))->orWhere('Uemail',session('home_login'))->first();
        //取评论内容的评论
        $data_get = Comment::where('Bualais','=',0)->where('Homebualais','!=','null')->where('Eid',$id)->orderBy('created_at','asc')->get();
        if(!empty($data_get[0])) {
            //循环使用模型
            $data_bp = [];
            foreach ($data_get as $key => $value) {
                $data_get[$key]['Uimage'] = $value->comment_user->Uimage; //取用户头像
                //取标识
                $data_bp = Comment::where('Eid',$id)->lists('Discuss_type2');
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
        return view('/home/personal/releaseshow',[
            'data_find'=>$data_find,
            'data_get'=>$data_get,
            'user'=>$user,
            'content_show' => $content_show,
            'poster_data' => $poster_data,
            'collect'=>$collect,
            ]);
    }
}

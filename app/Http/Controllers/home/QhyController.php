<?php

namespace App\Http\Controllers\home;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Release;
use App\Models\Admin\User;
use App\Http\Requests;
use App\Http\Controllers\home\Poster;
//use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use \Redis;
class QhyController extends Controller
{
    /**
     * 头条展示页面
     *
     * @return \Illuminate\Http\Response
     */
    public function getTop()
    {
       /* $redis = new Redis;
        $redis -> connect('localhost',6379);
        $redis->select(2);
        $test = $redis->lrange('list_Cid',0,-1);
        //==============nosql redis 缓存机制
        /*$pub = $redis->lindex('list_Cid',1);
        dd($pub);*/
     /*   $redis ->flushdb(2);
        if(empty($test)){
            $data = Content::where('Ccategory','头条')->orderby('Cid','desc')->get();
            //dd($data);
            echo 'mysql';
            $tmp_data = [];
            foreach($data as $k=>$v){
                //dd($v->Ctitle);
                $tem_data['Ctitle'] =$v->Ctitle;
                $tem_data['Ccontent'] =$v->Ccontent;
                $tem_data['Uid'] =$v->Uid;
                dd($tmp_data);
                $redis->select('2');
                //把所有内容的cid作为表名压如list中
                $redis->lpush('list_Cid',$v['Cid']);
                $id = $redis->incr(1);
                //$v1= json_decode($v);
                //dd($v->Cid);
                $redis->hset($v->Cid,$id,$v);
            }
        }else{
            echo 'redis';
            $data = [];
            //dd($test);
            foreach ($test as $value) {
                $keys = $redis->hkeys($value);//获取哈希所有的键名
                //dd($keys);
                $temp = $redis->hmget($value,$keys);
                $data[] =$temp;

            }

        }*/
        //dd($data);
      /* phpinfo();
        dd();*/
        //数据库操作的方式
        $data = Content::where('Ccategory','头条')->get();
        //dd($data['Cpicture']);
        //dd($data[0]->Cpicture);
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
       /* dd($data);
        dd($data->release_user);*/
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
                //redis缓存机制
        //$id = $request->input('Cid');
        //dd($id);
        //$redis = new Redis();
        //Redis::del('content');
       /* $res = Redis::Exists($id);
        dd($res);*/
        //$data = Redis::hget('content',50);
       /* $data = Content::find($id);y
        Redis::select('5');
        //$res = Redis::hset('content',$id,$data);
        $data = Redis::hget('content',$id);
        dd($data);*/


        /*if(Redis::hExists('content','user-'.$id)){
            echo 'redis';
            $data = Redis::hget('content','user-'.$id);
        }else{
            echo 'mysql';
            $data = Content::find($id);
            Redis::select('5');
            Redis::hset('content','user-'.$id,$data);
        }
        return view('home.content.content',['data'=>$data]);*/
        //Redis::del('content');
       /* $key = 'user:Ualais:6';
         $user = User::find(33);
        //dd($user);
        if($user){
            //将用户名存储到Redis中
            Redis::set($key,$user->Ualais);
        }
        $data = Redis::get($key);
        dump($data);*/

                 //没有缓存机制
       /* $id = $request->input('Cid');
        $data = Content::find($id);
        //dd($data);
        //dd($data->content_user);
        //dd($data);*/
        //phpinfo();

                //缓存机制1
        //Cache::flush();
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
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

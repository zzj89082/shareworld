<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Photo;
use App\Models\Content;

class PhotoController extends Controller
{
    /**
     * 显示相册
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取当前用户
        $username = session('home_login');
        //查询用户信息
        $photo = User::where('Ualais','=',$username)->first();
        //查找关系文章
        $pic = $photo->user_content;
        $Photo = Photo::orderby('Pid','desc')->get();
        // dd($photo);
        return view('/home/personal/photo',[
            'pic'=>$pic,
            'photo'=>$photo,
            'zhaopian'=>$Photo,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * 多文件上传
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //如果文件上传有内容执行
        if($request -> hasFile('photo')){
            //获取上传的文件
            $photo = $request -> file('photo');
            //临时名为32为随机字符串
            $temp_name = str_random(32);
            //获取文件后缀名
            $hz = $photo -> getClientOriginalExtension();
            //拼接文件名
            $name = $temp_name.'.'.$hz;
            //拼接上传路径
            $file_path = './uploads/'.date('Ymd',time());
            //文件保存信息
            $res = $photo -> move($file_path,$name);
            //接收隐藏域信息
            $user = $request -> except('_token');
            $user['photo'] = ltrim($file_path.'/'.$name,'.');
            if($res){
                \DB::table('sw_photo')->insert($user);
                $Photo = Photo::get();
                $res_str = [
                    'code'=>0,
                    'msg'=>'上传成功',
                    'data'=>[
                        'src'=>ltrim($file_path.'/'.$name,'.'),
                        'data'=>$Photo,
                    ]
                ];

            }else{
                 $res_str = [
                    'code'=>1,
                    'msg'=>'上传失败',
                    'data'=>[
                        'src'=>'',
                    ]
                ];
            }
        }else{
            $res_str = [
                    'code'=>2,
                    'msg'=>'没有文件可上传',
                    'data'=>[
                        'src'=>'',
                    ]
                ];
        }
        //返回json格式
        echo json_encode($res_str);
    }



    public function postPdelete($id)
    {
        $res = Photo::destroy($id);
        if($res){
            return redirect('/photo')->with('success','删除成功'); //跳转 并且附带信息
        }else{
            return back()->with('error','删除失败'); //跳转 并且附带信息
        }
    }




    public function postCdelete($id)
    {
        $res = Content::destroy($id);
        if($res){
            return redirect('/photo')->with('success','删除成功'); //跳转 并且附带信息
        }else{
            return back()->with('error','删除失败'); //跳转 并且附带信息
        }
    }

    /**
     * Display the specified resource.
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

<?php

namespace App\Http\Controllers\home;
use Illuminate\Http\Request;
use App\Models\Admin\User;
use App\Models\Release;
use App\Http\Requests;
use App\Models\Content;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
class PersonalController extends Controller
{
    /**
     * 个人中心主页面
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $Utel = session('home_login');
        $data = User::where('Utel',$Utel)->first();
        //dd($data->Ualais);
        //dd($data[0]);
        $content = Release::where('Ualais',$data->Ualais)->take(2)->get();
        $content_1 = Content::orderby('Cid','desc')->first();
        $content1 = Content::where('Cid','!=',$content_1->Cid)->take(4)->orderby('Cid','desc')->get();
        //dd($content);
        return view('home.personal.self',['data'=>$data,'content'=>$content,'content1'=>$content1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postUpload(Request $request)
    {
        $req = $request->input('Uid');

           // print_r($res);
        if($request -> hasFile('Uimage')){
            // dd(123);
            $file = $request->file('Uimage');
            //设置临时的文件名
            // dd($file);
            $temp_name = time()+rand(10000,99999);
            //获取文件的后缀名
            $hz = $file -> getClientOriginalExtension();
            //dd($hz);
            $filename = $temp_name.'.'.$hz;
            //执行上传
            $res = $file -> move('./uploads/'.date('Ymd',time()),$filename);
            // dd($res);
            //将文件路径插入数据库中
            $path = '/uploads/'.date('Ymd',time()).'/'.$filename;
            //dd($path);
            //$data['Uimage'] = $path;
            if($res){
                \DB::table('sw_users')->where('Uid',$req)->update(['Uimage'=>$path]);
                // echo '上传成功';
                $res_str = [
                    'code'=>0,
                    'msg'=>'上传成功',
                    'data'=>[
                        'src'=>$path
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postEdit(UserEditRequest $request)
    {
        //echo 123;
        $data = $request->except('_token');
        //dd($data);
        $tem_data = User::where('Ualais',$data['Ualais'])->where('Uid','!=',$data['_Uid'])->first();
        if(!empty($tem_data)){
            return redirect('/personal/index')->with('error','用户名已存在');
        }else{
            $user =  User::where('Uid',$data['_Uid'])->first();
            $user->Ualais = $data['Ualais'];
            $user->Uemail = $data['Uemail'];
            $user->Usex = $data['Usex'];
            $user->Utel = $data['Utel'];
            $user->Uinfo = $data['Uinfo'];
            $user->date = $data['date'];
            $res = $user->save();
            if($res>0){
                //跳转 并且附带信息
                return redirect('/personal/index')->with('success','修改成功');
            }else{
                //跳转 并且附带信息
                return back()->with('error','修改失败');
            }
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

<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use App\Http\Requests\UserAddRequest;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //接收分页传来的信息
        $show = $request->input('show','');
        //设置自定义默认分页条数
        if($show == 0 || empty($show)){
            $show = 5;
            //return redirect($_SERVER['HTTP_REFERER']);
        }
        //接收用户名查找的数据
        $usearch = $request->input('usearch','');
        //接收邮箱查找的数据
        $esearch = $request->input('esearch','');
        //创建数据库对象并进行分页 搜索  模型必须要加后面的where条件
        $mysql = User::where('Uid','>','0');
        $count = User::count();
       /* $SumPage = ceil($count/$show);*/
        //检测如果$usearch 设置where查找
        if(isset($usearch) && !empty($usearch)){
            $data = $mysql-> where('Ualais','like','%'.$usearch.'%');
        }
        //检测如果$esearch 设置就where查找
        if(isset($esearch) && !empty($esearch)){
            $mysql->where('Uemail','like','%'.$esearch.'%');
        }
        $data = $mysql->paginate($show);//获取所有的数据并且分页
        return  view('Admin.User.list',
            ['data'=>$data,
            'title'=>'用户列表',
            'search'=>$request->all(),
            'count'=>$count
             ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // echo 123;
        return view('Admin.User.add',['title'=>'用户添加']);
    }

    /**
     * 执行添加
     * 返回添加成果
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserAddRequest $request)
    {
        //处理字段信息
        $data = $request->except('_token','Urpassswd');

         //用Hash密码加密
        $data['Upassswd'] = Hash::make($data['Upassswd']);
        //创建文件上传的添加
        $file = $request->file('Uimage');
        //设置临时的文件名
        $temp_name = time()+rand(10000,99999);
        //获取文件的后缀名
        $hz = $file -> getClientOriginalExtension();
        $filename = $temp_name.'.'.$hz;
        //执行上传
        $file -> move('./uploads/'.date('Ymd',time()),$filename);
        //将文件路径插入数据库中
        $path = '/uploads/'.date('Ymd',time()).'/'.$filename;
         // dd($path);
        $data['Uimage'] = $path;
        //实例化 空模型 进行修改
        $user =  new User;
        $user->Ualais = $data['Ualais'];
        $user->Upassswd = $data['Upassswd'];
        $user->Uemail = $data['Uemail'];
        $user->Usex = $data['Usex'];
        $user->Utel = $data['Utel'];
        $user->Uinfo = $data['Uinfo'];
        $user->Upower = $data['Upower'];
        $user->Uimage = $data['Uimage'];
        $user->date = $data['date'];
        $res = $user->save();
        if($res>0){
            //跳转 并且附带信息
            return redirect('/admin/user')->with('success','添加成功');
        }else{
            //跳转 并且附带信息
            return back()->with('error','添加失败');
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
        $data = User::where('Uid',$id)->first();
        //dd($data);
        return view('Admin.User.show',['title'=>'用户详情','data'=>$data]);
    }

    /**
     * 加载修改的页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::where('Uid',$id)->first();
        //dd($data);
        return view('Admin.User.edit',['title'=>'用户修改','data'=>$data]);
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
        //处理字段信息
        $data = $request->except('_token','_method');
        //如果用户从新添加的图片
        if(isset($data['Uimage'])){
            $file = $request->file('Uimage');
            // dd($file);
            //设置临时的文件名
            $temp_name = time()+rand(10000,99999);
            //获取文件的后缀名
            $hz = $file -> getClientOriginalExtension();
            $filename = $temp_name.'.'.$hz;
            //执行上传
            $file -> move('./uploads/'.date('Ymd',time()),$filename);
            //将文件路径插入数据库中
            $path = '/uploads/'.date('Ymd',time()).'/'.$filename;
            // dd($path);
            $data['Uimage'] = $path;
            $user =  User::where('Uid',$id)->first();
            $user->Ualais = $data['Ualais'];
            $user->Uemail = $data['Uemail'];
            $user->Usex = $data['Usex'];
            $user->Utel = $data['Utel'];
            $user->Uinfo = $data['Uinfo'];
            $user->Upower = $data['Upower'];
            $user->Uimage = $data['Uimage'];
            $user->date = $data['date'];
            $res = $user->save();
            if($res>0){
                //跳转 并且附带信息
                return redirect('/admin/user')->with('success','修改成功');
            }else{
                //跳转 并且附带信息
                return back()->with('error','修改失败');
            }
        //没有从新上传后
        }else{
            $user =  User::where('Uid',$id)->first();
            $user->Ualais = $data['Ualais'];
            $user->Uemail = $data['Uemail'];
            $user->Usex = $data['Usex'];
            $user->Utel = $data['Utel'];
            $user->Uinfo = $data['Uinfo'];
            $user->Upower = $data['Upower'];
            $user->date = $data['date'];
            $res = $user->save();
            if($res>0){
                //跳转 并且附带信息
                return redirect('/admin/user')->with('success','修改成功');
            }else{
                //跳转 并且附带信息
                return back()->with('error','修改失败');
            }
        }





    }

    /**
     * 执行删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data =User::where('uid',$id)->first();
        $res = $data->delete();
        if($res>0){
            //跳转 并且附带信息
            return redirect('/admin/user')->with('success','删除成功');
        }else{
            //跳转 并且附带信息
            return back()->with('error','删除失败');
        }

    }
}

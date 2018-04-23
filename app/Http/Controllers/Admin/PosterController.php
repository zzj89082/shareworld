<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Poster;
class PosterController extends Controller
{
    /**
     * 广告列表页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        //接收搜索关键字
            //接收的广告商
        $POauthor = $request -> input('search','');
            //接收价格
        $POprice = $request -> input('search2','');
            //接收类型
        $POtype = $request -> input('search3','');
            //接收的页码
        $page_count = $request -> input('page_count',3);
        //创建数据对象
        $poster = new Poster;
        $poster = Poster::where('POid','>','0')-> orderby('POid','desc');
        //判断是否存在
        if(isset($POauthor) && !empty($POauthor)){
            $poster -> where('POauthor','like','%'.$POauthor.'%');
        }
        if(isset($POprice) && !empty($POprice)){
            $poster -> where('POprice','>', $POprice);
        }
        if(isset($POtype) && !empty($POtype)){
           $poster -> where('POtype','like','%'.$POtype.'%');
        }
        //获取数据并且分页
        $data = $poster -> paginate($page_count);
        //加载模板
        return view('admin/poster/list',[
                'title' => '广告',
                'data' => $data,
                'search' => $request->all()
            ]);
    }

    /**
     * 加载添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/poster/add',['title'=>'添加广告']);
    }

    /**
     * 执行添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request -> except(['_token']);//去除某个参数
        //创建文件上传对象
        $POpic = $request -> file('POpic');
        //创建临时文件名
        $temp_name = time().rand(100,999);
        //获取后缀名
        $hz = $POpic -> getClientOriginalExtension();
        //拼接文件名
        $filename = $temp_name . '.' . $hz;
        //执行上传
        $POpic -> move('./uploads/'.date('Ymd',time()),$filename);
        //指定profile路径值
        $data['POpic'] = '/uploads/'.date('Ymd',time()).'/'.$filename;
        $data['created_at'] = date('Y-m-d H:i:s',time());

        //执行数据库添加
        $res = Poster::insert($data);
        //判断是否成功
        if($res){
            return redirect('/admin/poster')->with('success','添加成功'); //跳转 并且附带信息
        }else{
            return back()->with('error','添加失败'); //跳转 并且附带信息
        }
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
     * 加载修改页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $poster = Poster::find($id);
        return view('admin/poster/edit',['title' => '修改广告','data' => $poster]);
    }

    /**
     * 执行修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request -> except(['_token','_method']);
        //判断用户是否修改头像
        if(!isset($data['POpic'])){
            //如果没修改，将profile2赋值给profile
            $data['POpic'] = $data['POpic2'];
        } else {
            //如果修改了
            //创建文件上传对象
            $POpic = $request -> file('POpic');
            //创建临时文件名
            $temp_name = time().rand(100,999);
            //获取后缀名
            $hz = $POpic -> getClientOriginalExtension();
            //拼接文件名
            $filename = $temp_name . '.' . $hz;
            //执行上传
            $POpic -> move('./uploads/'.date('Ymd',time()),$filename);
            //指定profile路径值
            $data['POpic'] = '/uploads/'.date('Ymd',time()).'/'.$filename;
        }
        //删除profile2
        unset($data['POpic2']);
        $data['updated_at'] = date('Y-m-d H:i:s',time());

        //执行数据库添加
        $res = Poster::where('POid',$id) -> update($data);
        //判断是否成功
        if($res){
            return redirect('/admin/poster')->with('success','修改成功'); //跳转 并且附带信息
        }else{
            return back()->with('error','修改失败'); //跳转 并且附带信息
        }
    }

    /**
     * 软删除广告
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poster = Poster::find($id);
        $res = $poster -> delete();
        //判断是否成功
        if($res){
            return redirect('/admin/poster')->with('success','删除成功'); //跳转 并且附带信息
        }else{
            return back()->with('error','删除失败'); //跳转 并且附带信息
        }
    }

}

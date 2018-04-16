<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Release;
class ReleaseController extends Controller
{
    /**
     * 发布管理列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request -> input('search','');  //用户名
        $search1 = $request -> input('search1',''); // 发布内容
        $page_count = $request -> input('page_count',3); //分页页数
        //实例化模型
        $config = new Release;
        //用户名
        if(!empty($search)) {
            $config = $config->where('Ualais','like','%'.$search.'%');
        }
        //发布内容
        if(!empty($search1)) {
            $config = $config -> where('Earticle','like','%'.$search1.'%');
        }
        //查询数据进行分页
        $data = $config->paginate($page_count);   
        return view('admin/release/list',['data'=>$data,'search'=>$request ->all()]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * 详情页
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Release::find($id);
        //将字符串分割数组 （遍历）
        if(!empty($data->Eimg)) {
            $Eimg = rtrim($data->Eimg,',');
            $data->Eimg = explode(',',$Eimg);
        }
        return view('admin/release/show',['data'=>$data]);
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
     * 软删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //执行软删除
        $data = Release::find($id);
        $data->Etype = '管理员删除';
        $res = $data -> save();
        $res1 = $data -> delete();
        //判断是否成功
        if($res1) {
            return redirect('/admin/release')->with('success','删除成功');
        } else {
            return back()->with('error','删除失败');
        }
    }
}

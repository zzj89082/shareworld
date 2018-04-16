<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Release;
class DereleaseController extends Controller
{
    /**
     * 软删除列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request -> input('search','');  //用户名
        $search1 = $request -> input('search1',''); // 发布内容
        $search2 = $request -> input('search2',''); //删除类型
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
        //删除类型
        if(!empty($search2)) {
            $config = $config -> where('Etype','like','%'.$search2.'%');
        }
        //获取数据
        $data = $config->onlyTrashed()->get();
        return view('admin/derelease/index',['title'=>'发布未通过','data'=>$data,'search'=>$request->all()]);
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
     * 恢复数据
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //进行恢复
        $data = Release::onlyTrashed()->where('Eid','=',$id)->first();
        //修改类型
        $data->Etype = '';
        $data -> save();
        //执行恢复
        $res = $data->restore();
        //判断是否恢复
        if($res) {

            return redirect('/admin/derelease')->with('success','恢复成功');
        } else {
            return back()->with('error','恢复失败');
        }
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
     * 彻底删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        //获取数据彻底删除
        $res = Release::onlyTrashed()->where('Eid','=',$id)->forceDelete();
        //判断是否删除成功
        if($res) {
            return redirect('/admin/derelease')->with('success','删除成功');
        } else {
            return back()->with('error','删除失败');
        }
    }
}

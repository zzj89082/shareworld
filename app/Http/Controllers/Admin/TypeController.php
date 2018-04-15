<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Type::all();
        return view('admin/type/list',['data'=>$data,'title'=>'分类列表']);
    }

    /**
     * 加载添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加分类模板
        return view('admin/type/create',['title'=>'分类添加']);
    }

    /**
     * 执行添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收传来的值，除去_token
        $data = $request->except('_token');
        //根据接收的值查找数据库里的数据
        $data1 = Type::where('Ttype',$data['type'])->first();
        //判断数据库是否存在要添加的值，如果不存在就添加，存在输出添加失败
        if(empty($data1->Ttype)){
            //往数据库添加数据
            $type = new Type;
            $type->Ttype = $data['type'];
            $res = $type->save();
            if($res){
                return redirect('admin/type/')->with('success','添加成功');
            }else{
                return back()->with('error','添加失败');
            }
        }
            return back()->with('error','分类已存在');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo 'show';
    }

    /**
     * 加载修改页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //根据id查找数据库信息
        $data = Type::find($id);
        //加载修改模板
        return view('admin/type/edit',['data'=>$data,'title'=>'分类修改']);
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
        //接收数据，除去_token和_method
        $data = $request->except('_token','_method');
        //根据接收的信息获取数据库信息
        $type = Type::where('Tid','>','0')->where('Ttype',$data['Ttype'])->first();
        //如果数据库没有获取到信息就执行修改
        if($type == null){
            //根据id执行修改
            $res = Type::where('Tid','=',$id)->update($data);
            if($res){
                return redirect('admin/type/')->with('success','修改成功');
            }else{
                return back()->with('error','修改失败');
            }
        }else{
            return back()->with('error','分类已存在');
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
        //根据id获取数据
        $data = Type::find($id);
        //删除数据
        $res = $data->delete();
        if($res){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}

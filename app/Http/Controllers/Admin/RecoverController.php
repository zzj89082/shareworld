<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Poster;
use App\Models\Rollimg;
use DB;

class RecoverController extends Controller
{

    /**
     * 获取所有被软删除的模型
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        //获取数据并且分页
        $data = Poster::onlyTrashed() -> paginate(5);
        $rdata = Rollimg::onlyTrashed()->orderby('Rid','asc')->get();
        //加载模板
        return view('admin/recover/list',[
            'title' => '回收站',
            'data' => $data,
            'rdata' => $rdata,
        ]);
    }

    /**
     * 恢复被删除的模型
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function update($id)
    {
        //根据id查找模型并恢复
        $res = Poster::withTrashed()->where('POid', $id)->restore();
        if($res){
            return back()->with('success','恢复成功');
        }else{
            return back()->with('error','恢复失败');
        }
    }

    /**
     * 永久删除模型
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete($id)
    {
        //获取要删除的模型
        $data = Poster::onlyTrashed()->find($id);
        //执行删除
        $res = $data->forceDelete();
        // dd($res);
        if($res == null){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败'); 
        }
    }


    public function rupdate($id)
    {
        //根据id查找模型并恢复
        $res = Rollimg::withTrashed()->where('Rid', $id)->restore();
        if($res){
            return back()->with('success','恢复成功');
        }else{
            return back()->with('error','恢复失败');
        }
    }



    public function rdelete($id)
    {
        //获取要删除的模型
        $config = DB::table('sw_config')->find(1);
        $config = explode(',',$config->config_rollimg);
        $res = array_search($id, $config);
        unset($config[$res]);
        $config = implode(',',$config);
        $res1 = DB::table('sw_config')->where('id', 1)->update(['config_rollimg' => $config]);
        $data = Rollimg::onlyTrashed()->find($id);
        //执行删除
        $res = $data->forceDelete();
        // dd($res);
        if($res == null){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败'); 
        }
    }
    

}

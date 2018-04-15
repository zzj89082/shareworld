<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use App\User;
use App\Models\Feedback;
class FeedbackController extends Controller
{
    /**
     * 处理反馈列表页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        

        $fb_id = Feedback::lists('Fid');
        $i = 1;
        foreach($fb_id as $k => $v)
        {
            $feedback = Feedback::find($v);
            $feedback_data[$i]['Fid'] = $feedback -> Fid;
            $feedback_data[$i]['Fcontent'] = $feedback -> Fcontent;
            $feedback_data[$i]['Freplay'] = $feedback -> Freplay;
            $feedback_data[$i]['created_at'] = $feedback -> created_at;
            $feedback_data[$i]['updated_at'] = $feedback -> created_at;

            /*$feedback_data[$i]['Uimage'] = $feedback -> feedback_users -> Uimage;
            $feedback_data[$i]['Ualais'] = $feedback -> feedback_users -> Ualais;*/

            $i++;

        }
        
        /*//搜索块
        $Ualais = new User;
        //接收搜索关键字
        $Ualais = $request -> input('search','');

        //判断是否存在
        if(isset($Ualais) && !empty($Ualais)){
            $feedback = User::where('Ualais','like','%'.$Ualais.'%');
            dd($feedback);
        }
        */

        //获取数据并且分页
        $feedback_data = $feedback -> orderBy('Fid','desc') -> paginate(2);
        //加载模板
        return view('admin/feedback/list',[
                'title' => '处理反馈',
                'data' => $feedback_data,
                'search' => $request->all()
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
     * 回复反馈信息
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feedback = Feedback::find($id);
        $feedback_data['Fid'] = $feedback -> Fid;
        $feedback_data['Fcontent'] = $feedback -> Fcontent;
        $feedback_data['Freplay'] = $feedback -> Freplay;
        $feedback_data['created_at'] = $feedback -> created_at;
        $feedback_data['updated_at'] = $feedback -> created_at;
        $feedback_data['Uimage'] = $feedback -> feedback_users -> Uimage;
        $feedback_data['Ualais'] = $feedback -> feedback_users -> Ualais;
        // dd($feedback_data);
        return view('admin/feedback/replay',['title' => '回复反馈信息','data' => $feedback_data]);
    }

    /**
     * 执行回复
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request -> except(['_token','_method']);
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        //执行数据库添加
        $res = Feedback::where('Fid',$id) -> update($data);
        //判断是否成功
        if($res){
            return redirect('/admin/feedback')->with('success','回复成功'); //跳转 并且附带信息
        }else{
            return back()->with('error','回复失败'); //跳转 并且附带信息
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = Feedback::find($id);
        $res = $feedback -> delete();
        //判断是否成功
        if($res){
            return redirect('/admin/feedback')->with('success','删除成功'); //跳转 并且附带信息
        }else{
            return back()->with('error','删除失败'); //跳转 并且附带信息
        }
    }
}

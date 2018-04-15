<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use App\User;
Use App\Models\Comment;
Use App\Models\Content;
Use App\Models\Release;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //接收搜索关键字
        $Ualais = $request -> input('search','');

        $com_id = Comment::lists('Did');
        $i = 1;
        foreach($com_id as $k => $v)
        {
            $comment = Comment::find($v);
            $comment_data[$i]['Did'] = $comment -> Did;//评论编号
            $comment_data[$i]['Dcontent'] = $comment -> Dcontent;//评论内容
            $comment_data[$i]['created_at'] = $comment -> created_at;//评论时间
            $comment_data[$i]['Bualais'] = $comment -> Bualais;//被评论者
            $comment_data[$i]['Uid'] = $comment -> Uid;//评论者ID
            $comment_data[$i]['Cid'] = $comment -> comment_content['Cid'];//内容ID
            $comment_data[$i]['Eid'] = $comment -> comment_release['Eid'];//发布ID
            $i++;

        }
        // dd($comment_data);

        //创建数据对象---------便于搜索展开
        $comment = Comment::where('Did','>','0');
        //判断是否存在
        if(isset($Ualais) && !empty($Ualais)){
            //通过搜索的值去用户表查询
            $uid = User::where('Ualais','like','%'.$Ualais.'%') -> lists('Uid');
            $ass = [];
            foreach($uid as $k => $v){
                array_push($ass,$v);
            }
            //增加where条件区间
            $comment -> whereIn('Uid',$ass);
        }
        //获取数据并且分页
        $comment_data = $comment -> orderBy('Did','desc') -> paginate(2);

        return view('admin/comment/list',[
                'title' => '评论',
                'data' => $comment_data,
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
        $feedback = Comment::find($id);
        $res = $feedback -> delete();
        //判断是否成功
        if($res){
            return redirect('/admin/comment')->with('success','删除成功'); //跳转 并且附带信息
        }else{
            return back()->with('error','删除失败'); //跳转 并且附带信息
        }
    }
}

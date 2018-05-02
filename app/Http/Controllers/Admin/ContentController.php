<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Type;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Type::where('Ttype','!=','热门')->get();
        $data1 = Content::where('Ccategory','热门')->orderby('Cid','desc');
        $data1 = $data1->paginate(5);
        $data2 = Content::where('Ccategory','头条')->orderby('Cid','desc');
        $data2 = $data2->paginate(5);
        $data3 = Content::where('Ccategory','视频')->orderby('Cid','desc');
        $data3 = $data3->paginate(5);
        $data4 = Content::where('Ccategory','新鲜事')->orderby('Cid','desc');
        $data4 = $data4->paginate(5);
        $data5 = Content::where('Ccategory','搞笑')->orderby('Cid','desc');
        $data5 = $data5->paginate(5);
        $data6 = Content::where('Ccategory','时尚')->orderby('Cid','desc');
        $data6 = $data6->paginate(5);
        $data7 = Content::where('Ccategory','军事')->orderby('Cid','desc');
        $data7 = $data7->paginate(5);
        $data8 = Content::where('Ccategory','美女')->orderby('Cid','desc');
        $data8 = $data8->paginate(5);
        $data9 = Content::where('Ccategory','体育')->orderby('Cid','desc');
        $data9 = $data9->paginate(5);
        $data10 = Content::where('Ccategory','八卦')->orderby('Cid','desc');
        $data10 = $data10->paginate(5);
        return view('/admin/content/list',[
            'title'=>'内容列表',
            'data'=>$data,
            'data1'=>$data1,
            'data2'=>$data2,
            'data3'=>$data3,
            'data4'=>$data4,
            'data5'=>$data5,
            'data6'=>$data6,
            'data7'=>$data7,
            'data8'=>$data8,
            'data9'=>$data9,
            'data10'=>$data10,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Type::all();
        return view('/admin/content/create',['title'=>'内容添加','data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $file = $request->file('Cpicture');

        $data['Uid'] =session('Uinfo')['Uid'];

        if(empty($data['Ctitle']) || empty($data['Ccontent']) || empty($data['Ccategory']) || empty($file)){
            return back()->with('error','内容不能为空');
        }
        $temp_name = time().rand(10000,99999);
        $hz = $file -> getClientOriginalExtension();
        $pic = $temp_name.'.'.$hz;
        $file -> move('./uploads/content/'.date('Ymd',time()),$pic);
        $data['Cpicture'] = '/uploads/content/'.date('Ymd',time()).'/'.$pic;
        $data['created_at'] = date('Y-m-d H:i:s',time());
        $res = Content::insert($data);
        if($res){
            return redirect('/admin/content')->with('success','添加成功');
        }else{
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
        $data = Content::find($id);
        return view('/admin/content/show',['title'=>'内容详情','data'=>$data]);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo 'edit';
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
        echo 'update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Content::destroy($id);
        if($res){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}

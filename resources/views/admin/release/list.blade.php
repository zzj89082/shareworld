@extends('admin/layout/header')
@section('content')
     
<section id="main-content">
  <section class="wrapper">
     <div class="col-lg-12">
      <h3 class="page-header"><i class="fa fa-table"></i> 发布列表
                <!--  search form start -->
                <ul class="nav top-menu" style="float:right;">                    
                    <li>
                        <form class="navbar-form" action="/admin/release" method="get">
                           <span style="font-size:16px;">显示条目</span>
                           <select name="page_count" id="" class="btn-group" style="font-size:16px;">
                                <option value="3" @if(isset($search['page_count']) && $search['page_count'] == 3) selected @endif>3</option>
                                <option value="10" @if(isset($search['page_count']) && $search['page_count'] == 10) selected @endif >10</option>
                                <option value="20" @if(isset($search['page_count']) && $search['page_count'] == 20) selected @endif>20</option>
                                <option value="40" @if(isset($search['page_count']) && $search['page_count'] == 40) selected @endif>40</option>
                            </select>
                            <input class="form-control" placeholder="用户名" type="text" name="search" value="{{$search['search'] = isset($search['search']) ? $search['search'] : '' }}">
                            <input class="form-control" placeholder="发布内容" type="text" name="search1" value="{{$search['search1'] = isset($search['search1']) ? $search['search1'] : '' }}">
                            <input type="submit" value="查找" class="btn btn-primary btn-sm">
                        </form>
                    </li>                    
                </ul>
                <!--  search form end -->                
            </h3>
      <!-- prompt -->
      <!-- prompt -->
     </div>
     <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                发布列表
            </header>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>用户名</th>
                    <th>发布内容</th>
                    <th>发布图片</th>
                    <th>发布视频</th>
                    <th>发布时间</th>
                    <th>操作</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $v)
                  <tr>
                    <td>{{ $v->Eid }}</td>
                    <td>{{ $v->Ualais }}</td>
                    <td>{{ $v->Earticle }}</td>
                    <td>
                        @if(empty($v->Eimg))
                           <font color="red">视频和图片只能上传一种</font> 
                        @else
                            {{ substr($v->Eimg,0,15) }}..............
                        @endif
                    </td>
                    <td>
                         @if(empty($v->Evideo))
                           <font color="red">视频和图片只能上传一种</font> 
                        @else
                            {{ substr($v->Evideo,0,15) }}..............
                        @endif
                    </td>
                    <td>{{ $v->created_at }}</td>
                    <td>
                        <a href="/admin/release/{{ $v->Eid }}" class="btn btn-success">详情</a>
                         <form action="/admin/release/{{ $v->Eid }}" method="post" style="display:inline">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                              <input class="btn btn-danger" type="submit" value="删除" onclick="return confirm('你确定要删除吗');">
                        </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </section>
      </div>
      <div class="page" style="text-align:center">
         {!! $data->appends($search) -> render() !!}
      </div>
      
  </section>
</section>
@endsection
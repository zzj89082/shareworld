@extends('admin/layout/header')
@section('content')
     
<section id="main-content">
  <section class="wrapper">
     <div class="col-lg-12">
      <h3 class="page-header"><i class="fa fa-table"></i>{{ $title }}
                <ul class="nav top-menu" style="float:right;">                    
                    <li>
                        <form class="navbar-form" action="/admin/derelease" method="get">
                            <input class="form-control" placeholder="用户名" type="text" name="search" value="{{$search['search'] = isset($search['search']) ? $search['search'] : '' }}">
                            <input class="form-control" placeholder="内容" type="text" name="search1" value="{{$search['search1'] = isset($search['search1']) ? $search['search1'] : '' }}">
                            <input class="form-control" placeholder="删除类型" type="text" name="search2" value="{{$search['search2'] = isset($search['search2']) ? $search['search2'] : '' }}">
                            <input type="submit" value="查找" class="btn btn-primary btn-sm">
                        </form>
                    </li>                    
                </ul>
      </h3>

     </div>
     <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                {{ $title }}
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
                    <th>删除类型</th>
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
                    <td>{{ $v->Etype }}</td>
                    <td>{{ $v->created_at }}</td>
                    <td>
                        <a href="/admin/derelease/{{ $v->Eid }}" class="btn btn-success">恢复</a>
                         <form action="/admin/derelease/{{ $v->Eid }}" method="post" style="display:inline">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                              <input class="btn btn-danger" type="submit" value="彻底删除" onclick="return confirm('你确定要彻底删除吗');">
                        </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </section>
      </div>
      
  </section>
</section>
@endsection
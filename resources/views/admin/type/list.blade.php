@extends('admin/layout/header')
@section('content')

<section id="main-content">
  <section class="wrapper">
  	<div class="row">
		<div class="col-sm-12">
		  <h3 class="page-header"><i class="fa fa-table"></i> 内容管理</h3>
		 	
          <section class="panel">
              <header class="panel-heading">
                  {{ $title }}
              </header>
              <table class="table">
                  <thead>
	                  <tr>
	                      <th>ID</th>
	                      <th>分类名称</th>
	                      <th>添加时间</th>
	                      <th>操作</th>
	                  </tr>
                  </thead>
                  @foreach($data as $k => $v)
                  <tbody>
	                  <tr>
	                      <td class="col-sm-3">{{ $v->Tid }}</td>
	                      <td class="col-sm-3">{{ $v->Ttype }}</td>
	                      <td class="col-sm-3">{{ $v->created_at }}</td>
	                      <td class="btn-group col-sm-3">
							<a class="btn btn-warning" href="/admin/type/{{ $v->Tid }}/edit"><i class="icon_plus_alt2"> 修改</i></a>
							<form action="/admin/type/{{ $v->Tid }}" method="post" style="display:inline;">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button class="btn btn-danger" type="submit" onclick="return confirm('确认要删除吗？')"><i class="icon_close_alt2"> 删除</i></button>
							</form>
	                      </td>
	                  </tr>
                  </tbody>
                  @endforeach
              </table>
          </section>
      </div>
	</div>
  </section>
</section>
@endsection
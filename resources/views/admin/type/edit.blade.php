@extends('admin/layout/header')
@section('content')

<section id="main-content">
  <section class="wrapper">
  	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="fa fa-table"></i> 内容管理</h3>
			
              <section class="panel">
                  <header class="panel-heading">
                      {{ $title }}
                  </header>
                  <div class="panel-body">
                      <div class="form">
                          <form class="form-validate form-horizontal" id="feedback_form" method="post" action="/admin/type/{{$data->Tid}}">
                          	{{ csrf_field() }}
                          	{{ method_field('PATCH') }}
                              <div class="form-group ">
                                  <label for="Ttype" class="control-label col-lg-2">分类名称<span class="required">*</span></label>
                                  <div class="col-lg-10">
                                      <input class="form-control" id="Ttype" name="Ttype" value="{{$data->Ttype}}" minlength="2" type="text" required/>
                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="Turl" class="control-label col-lg-2">分类名称<span class="required">*</span></label>
                                  <div class="col-lg-10">
                                      <input class="form-control" id="Turl" name="Turl" value="{{$data->Turl}}" minlength="2" type="text" required/>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-warning" type="submit">修改</button>
                                      <button class="btn btn-default" type="button">重置</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
                  
              </section>
          </div>
	</div>
</section>
</section>
/@endsection
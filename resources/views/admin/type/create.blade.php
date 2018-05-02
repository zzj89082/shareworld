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
                          <form class="form-validate form-horizontal" id="feedback_form" method="post" action="/admin/type">
                          	{{ csrf_field() }}
                              <div class="form-group ">
                                  <label for="type" class="control-label col-lg-2">分类名称<span class="required">*</span></label>
                                  <div class="col-lg-10">
                                      <input class="form-control" id="type" name="type" value="" minlength="2" type="text" required/>
                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="url" class="control-label col-lg-2">分类地址<span class="required">*</span></label>
                                  <div class="col-lg-10">
                                      <input class="form-control" id="url" name="url" value="" minlength="2" type="text" required/>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-primary" type="submit">添加</button>
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
@endsection
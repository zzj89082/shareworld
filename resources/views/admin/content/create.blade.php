@extends('admin/layout/header')
@section('content')

<section id="main-content">
  <section class="wrapper">
  	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="fa fa-table"></i> 内容管理</h3>
			@if(session('success'))
		        <div class="alert alert-success fade in">
		          <button data-dismiss="alert" class="close close-sm" type="button">
		              <i class="icon-remove"></i>
		          </button>
		          {{  session('success') }}
		        </div>
		        @endif        
		                        

		        @if(session('error'))
		        <div class="alert alert-block alert-danger fade in">
		          <button data-dismiss="alert" class="close close-sm" type="button">
		              <i class="icon-remove"></i>
		          </button>
		          {{  session('error') }}
		        </div>
	        @endif
              <section class="panel">
                  <header class="panel-heading">
                      {{$title}}
                  </header>
                  <div class="panel-body">
                      <div class="form">
                          <form class="form-validate form-horizontal" id="feedback_form" method="post" action="/admin/content" novalidate="novalidate" enctype="multipart/form-data">
                          	{{ csrf_field() }}
                              <div class="form-group ">
                                  <label for="cname" class="control-label col-lg-2">所属类别 <span class="required"></span></label>
                                  <div class="col-lg-10">
                                      <select class="form-control m-bot15"  name="Ccategory" required>
                                      	@foreach($data as $v)
                                          <option>{{ $v->Ttype }}</option>
                                        @endforeach
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="title" class="control-label col-lg-2">文章标题 <span class="required"></span></label>
                                  <div class="col-lg-10">
                                      <input class="form-control " id="title" type="text" name="Ctitle" required/>
                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="Cpicture" class="control-label col-lg-2">内容图片</label>
                                  <div class="col-lg-10">
                                      <input class="form-control " id="Cpicture" type="file" name="Cpicture" />
                                  </div>
                              </div>
                                                                  
                              <div class="form-group ">
                                  <label for="ccomment" class="control-label col-lg-2">文章内容</label>
                                  <div class="col-lg-10">
                                      <textarea class="form-control " id="ccomment" name="Ccontent" required/></textarea>
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
/@endsection
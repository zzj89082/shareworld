@extends('admin/layout/header')
@section('content')

<section id="main-content">
  <section class="wrapper">
  	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="fa fa-table"></i> 内容管理</h3>

              <section class="panel">
                  <header class="panel-heading">
                      {{$title}}
                  </header>
                  <div class="panel-body">
                      <div class="form">
                          <form class="form-validate form-horizontal" id="feedback_form" method="post" action="" novalidate="novalidate" >
                              
                              <div class="form-group ">
                                  <label for="title" class="control-label col-lg-2">ID <span class="required"></span></label>
                                  <div class="col-lg-10">
                                      <input class="form-control " id="title" value="{{ $data->Cid }}" readonly type="text" nrequired/>
                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="title" class="control-label col-lg-2">所属分类 <span class="required"></span></label>
                                  <div class="col-lg-10">
                                      <input class="form-control " id="title" value="{{ $data->Ccategory }}" readonly type="text"  required/>
                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="Cpicture" class="control-label col-lg-2">文章标题</label>
                                  <div class="col-lg-10">
                                      <input class="form-control " id="Cpicture" readonly value="{{ $data->Ctitle }}" type="text"  />
                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="Cpicture" class="control-label col-lg-2">文章标题</label>
                                  <div class="col-lg-10">
                                      <img src="{{ $data->Cpicture }}" style="height:50px">
                                  </div>
                              </div>
                                                                  
                              <div class="form-group ">
                                  <label for="ccomment" class="control-label col-lg-2">文章内容</label>
                                  <div class="col-lg-10">
                                      <textarea class="form-control " id="ccomment"  readonly required/>{{ $data->Ccontent }}</textarea>
                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="Cpicture" class="control-label col-lg-2">插入时间</label>
                                  <div class="col-lg-10">
                                      <input class="form-control " id="Cpicture" readonly value="{{ $data->created_at }}" type="text"  />
                                  </div>
                              </div>
                            
                              <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-10">
                                      <a class="btn btn-info" onclick="history.back()" style="border-radius: 8px;"><i class="icon_close_alt2"> 返回</i></a>
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
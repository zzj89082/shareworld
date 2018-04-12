@extends('admin/layout/header')

@section('content')     
                                


             

<section id="main-content">
 	<section class="wrapper">   
 	   @if(session('error'))
                <div class="alert alert-block alert-danger fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                      <i class="icon-remove"></i>
                  </button>
                  <strong>{{ session('error') }}</strong>
              </div>
                @endif   
	    <div class="form">
	    	<h1 class="text-center">{{ $title }}</h1>
	        <form class="form-validate form-horizontal" id="feedback_form" method="post" enctype="multipart/form-data" action="{{ url('admin/config/add') }}" novalidate="novalidate">
             {{ csrf_field() }}
            <div class="form-group">
                  <label for="cname" class="control-label col-lg-2">网站名称<span class="required">*</span></label>
                  <div class="col-lg-9">
                      <input class="form-control" id="cname" name="config_title" minlength="5" type="text">
                  </div>
              </div> 
              <div class="form-group">
                  <label for="cname" class="control-label col-lg-2">前台logo<span class="required">*</span></label>
                  <div class="col-lg-9">
                      <input class="form-control" id="cname" name="config_logo" minlength="5" type="file">
                  </div>
              </div>
              <div class="form-group">
                  <label for="cname" class="control-label col-lg-2">后台logo<span class="required">*</span></label>
                  <div class="col-lg-9">
                      <input class="form-control" id="cname" name="config_adminlogo" minlength="5" type="file">
                  </div>
              </div>
              <div class="form-group">
                  <label for="cname" class="control-label col-lg-2">网站ico<span class="required">*</span></label>
                  <div class="col-lg-9">
                      <input class="form-control" id="cname" name="config_ico" minlength="5" type="file">
                  </div>
              </div>
              <div class="form-group">
                  <label for="cname" class="control-label col-lg-2">网站网址<span class="required">*</span></label>
                  <div class="col-lg-9">
                      <input class="form-control" id="cname" name="config_www" minlength="5" type="text">
                  </div>
              </div>
              
              <div class="form-group">
                  <label for="cname" class="control-label col-lg-2">环境信息<span class="required">*</span></label>
                  <div class="col-lg-9">
                      <input class="form-control" id="cname" name="config_setting" minlength="5" type="text">
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-9">
                      <button class="btn btn-primary form-control" type="submit">更改配置</button>
                  </div>
              </div>
          </form>
      </div>
    </section>  
</section>


      

          <!--主体部分-->


@endsection
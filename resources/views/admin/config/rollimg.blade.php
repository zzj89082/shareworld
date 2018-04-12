@extends('admin/layout/header')

@section('content')

		
@if(session('error'))
                <div class="alert alert-block alert-danger fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                      <i class="icon-remove"></i>
                  </button>
                  <strong>{{ session('error') }}</strong>
              </div>
                @endif   
<section id="main-content">
 	<section class="wrapper">   
 	   

	    <div class="form">
	    	<h1 class="text-center">{{ $title }}</h1>
	        <form class="form-validate form-horizontal" id="feedback_form" method="post" enctype="multipart/form-data" action="{{ url('admin/config/insertimg') }}" novalidate="novalidate">
             {{ csrf_field() }}
              <div class="form-group">
                  <label for="cname" class="control-label col-lg-2">上传图片<span class="required">*</span></label>
                  <div class="col-lg-9">
                      <input class="form-control" id="cname" name="Rimg" minlength="5" type="file">
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-9">
                      <button class="btn btn-primary form-control" type="submit">更换轮播图</button>
                  </div>
              </div>
          </form>
      </div>
    </section>  
</section>




@endsection
@extends('admin/layout/header')

@section('content')

<section id="main-content">
  <section class="wrapper">
	 <div class="row">
	 			<div class="col-sm-2"></div>
                  <div class="col-sm-8">
                      <section class="panel">
                          <header class="panel-heading">
                             	<a class="btn btn-hover" style="margin-left:-16px;" href="{{ $_SERVER['HTTP_REFERER'] }}">返回上页</a>
                          </header>
                          <table class="table">
                              <tbody>
                              <tr>
                              	  <td></td>
                                  <td>ID</td>
                                  <td class="text-center">{{$data->Eid}}</td>
                              </tr>
                                <tr>
                              	  <td></td>
                                  <td>用户名</td>
                                  <td class="text-center">{{$data->Ualais}}</td>
                              	</tr>
                              	<tr>
                              	  <td></td>
                                  <td>发布内容</td>
                                   <td class="text-left">{{$data->Earticle}}</td>
                              	</tr>
                              	<tr>
                              	  <td></td>
                                  <td>发布时间</td>
                                   <td class="text-center">{{$data->created_at}}</td>
                              	</tr>
                              </tbody>
                          </table>
                      </section>
                  </div>
              </div>
        
         
      
  		@if(!empty($data->Evideo))
          <h4 class="text-center">发布视频</h4>
    	@elseif(!empty($data->Eimg))
      		<h4 style="text-align: center;">发布图片</h4>
      @else
          <h4 style="text-align: center;">发布的内容</h4>
    	@endif
        



    @if(!empty($data->Evideo) || !empty($data->Eimg))        
      @if(empty($data->Evideo))
				<div id="wocao" style="width:750px; height: 210px; margin-left: 200px;padding-left: 35px;">	
				</div>
				
				@foreach($data->Eimg as $k => $v)
					<script type="text/javascript">					
							$('#wocao').append('<div style="width: 100px;height: 100px;float: left;margin: 0px 15px 5px 0px;"><img src="{{ $v }}" style="width: 100px;height: 100px;"></div>');
					</script>				
				@endforeach
		  @else
			<div style="width:480px;box-sizing: border-box; height: 200px;margin:auto;">
		      <video width="470" height="200" controls="controls">
				  <source src="{{ $data->Evideo }}" type="video/mp4" />
				  <source src="{{ $data->Evideo }}" type="video/ogg" />
				  <source src="{{ $data->Evideo }}" type="video/webm" />
				  <object data="{{ $data->Evideo }}" width="100%" height="100%">
				    <embed src="{{ $data->Evideo }}" width="100%" height="100%" />
				  </object>
				</video>
			</div>
      @endif
    @else
      <h4 style="text-align: center;">没有发布的图片和视频</h4>
    @endif
	</section>
</section>

@endsection

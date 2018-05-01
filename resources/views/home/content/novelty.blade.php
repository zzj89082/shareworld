@extends('home/layout/header')
@section('content')


	<!-- 内容区域 -->
	<div class="banner-section">
    <h3 class="tittle">{{$title}} <i class="glyphicon glyphicon-flag"></i></h3>
	 	<!--/top-news-->
		<div class="top-news" style="margin-top:-50px;">
		  	<!-- 中间 -->
			<div class="top-inner second">
				@foreach($data_novelty as $k => $v)
				<div class="col-md-12 top-text" style="margin: 5px 0;border-bottom:1px dashed #ccc">
					 <div class="col-md-3 item-pic">
					 <a href="/home/show/{{ $v->Cid }}"><img src="{{ $v->Cpicture }}" class="img-responsive" alt="" style="width:220px;height:120px;"></a>
					 </div>
					 <div class="col-md-9 item-details">
					    <h4 class="top"><a href="/home/show/{{ $v->Cid }}">{{ $v->Ctitle }}</a></h4>
						<p>{{mb_substr($v->Ccontent,0,80).'...'}}</p>
						
						<div>
					    	<p>{{ $v->created_at }}<a class="span_link" href="/home/show/{{ $v->Cid }}"><span class="glyphicon glyphicon-comment"></span>{{ $v->Ccomment or 0 }}</a><span class="glyphicon glyphicon-eye-open"></span>{{ $v->Ccount or 0 }}
					    	</p>
					    </div>
					 </div>
				 </div>

				<div class="clearfix"></div>
				@endforeach
				<div style="text-align: center;">
				{!! $data_novelty->render() !!}
				</div>
		 	</div>
			<!-- 中间end -->
	    </div>
		<!--//top-news-->
     </div>
	<!-- 右侧 -->
	<div class="banner-right-text">
	<!--右侧标题-->
	 <h3 class="tittle">评论最多 <i class="glyphicon glyphicon-facetime-video"></i></h3>
	 <div class="general-news">
		<div class="general-inner">
			<!--最多评论的内容-->
			<div class="general-text">
				<!--图片-->
				 <a href="/home/show/{{ $data_max->Cid }}"><img src="{{ $data_max->Cpicture }}" class="img-responsive" alt=""></a>
				 	<!--标题-->
				    <p class="top" style="font-size:16px;"><a href="/home/show/{{ $data_max->Cid }}">{{mb_substr($data_max->Ctitle,0,20).'..'}}</a></p>
					<p>{{mb_substr($data_max->Ccontent,0,66).'..'}}</p>
					    <p>{{strtok($data_max['created_at'],' ')}}
					    <a class="span_link" href="/home/show/{{ $data_max->Cid }}">
					    	<span class="glyphicon glyphicon-comment"></span>{{ $data_max->Ccomment or 0 }}  
					    </a>
					    	<span class="glyphicon glyphicon-eye-open"></span>{{ $data_max->Ccount or 0 }} 
					    </p>
			 </div>

			 <!--所有评论者-->
			 <div class="edit-pics">
		       @foreach($data_comment as $k=> $v )
		       <div class="editor-pics">
					<div class="col-md-3 item-pic">
					   <img src="{{ $v->Uimage }}" class="img-responsive" style="width:80px;height:60px;border-radius:50%;">
					</div>
					<div class="col-md-9 item-details" style="height:60px;padding-top:10px;">
						<p class="inner two" style="font-size:14px;"><span style="color:#37608E">@</span><span style="color:#FFAF03">{{ $v->Ualais }}</span> : 
						<a href="/home/show/{{ $v->Cid }}">{{mb_substr($v->Dcontent,0,20).'..'}}</a>
						 </p>
					 </div>
					<div class="clearfix"></div>
				</div>
				
				@endforeach							
			</div>
							<!--所有评论者结束-->
			<div class="media">	
				 <h3 class="tittle media">视频 <i class="glyphicon glyphicon-floppy-disk"></i></h3>
				  <div class="general-text two">
				  	<a href="/release/releaseshow/{{$data_video->Eid}}">
					  <video width="330" height="400" controls="controls" style="background-color:rgba(0,0,0,0.8)">
							  <source src="{{ $data_video->Evideo }}" type="video/mp4" />
							  <source src="{{ $data_video->Evideo }}" type="video/ogg" />
							  <source src="{{ $data_video->Evideo }}" type="video/webm" />
							  <object data="{{ $data_video->Evideo }}" width="100%" height="100%">
							    <embed src="{{ $data_video->Evideo }}" width="100%" height="100%" />
							  </object>
							</video>
					</a>	
					
				  </div>
	         </div>

		 		</div>
			</div>	
		</div>
	<!--右侧结束-->
	<div class="clearfix"> </div>
<!-- 内容区域结束 -->

@endsection
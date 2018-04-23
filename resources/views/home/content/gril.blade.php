@extends('home/layout/header')
@section('content')

	<!-- 内容区域 -->
	<div class="banner-section">
    <h3 class="tittle">{{$title}} <i class="glyphicon glyphicon-eye-open"></i></h3>
	 	<!--/top-news-->
		<div class="top-news" style="margin-top:-50px;">
		  	<!-- 中间 -->
			<div class="top-inner second">
				@foreach($gril_data as $k => $v)
					<div class="col-md-6 top-text">
						 <a href="/home/show/{{$v->Cid}}"><img src="{{$v->Cpicture}}" class="img-responsive" alt="" style="height:260px;"></a>
						    <h5 class="top"><a href="/home/show/{{$v->Cid}}" title="{{$v->Ctitle}}">{{mb_substr($v->Ctitle,0,16).'..'}}</a></h5>
							<p>{{mb_substr($v->Ccontent,0,66).'..'}}</p>
						    <p>{{strtok($v->created_at,' ')}}
							    <a class="span_link" href="single.html" style="float:right">
							    	<span class="glyphicon glyphicon-circle-arrow-right"></span>
							    </a>
						    	<a class="span_link" href="#" style="float:right">
							    	<span class="glyphicon glyphicon-eye-open"></span>56 
							    </a>
							    <a class="span_link" href="#" style="float:right">
							    	<span class="glyphicon glyphicon-comment"></span>{{$gril_data2[$k]['count']}} 
							    </a>
						    </p>

					</div>
					@if( $k%2 == 1 )
				 	<div class="clearfix" style="margin-bottom:20px;"> </div>
					@endif
					
				 @endforeach
				 <div class="clearfix"> </div>
				 <!-- 分页 -->
				 <div class="text-center">
	                  {!! $gril_data->render() !!}
			     </div>
		 	</div>
			<!-- 中间end -->
	    </div>
		<!--//top-news-->
     </div>
	<!-- 右侧 -->
	<div class="banner-right-text">
	 <h3 class="tittle">热门评论  <i class="glyphicon glyphicon-facetime-video"></i></h3>
	<!--/general-news-->
	 <div class="general-news">
		<div class="general-inner">
				<div class="general-text">
					 	<video width="320" height="350" controls="controls">
							  <source src="{{ $gril_hot->Cvideo }}" type="video/mp4" />
							  <source src="{{ $gril_hot->Cvideo }}" type="video/ogg" />
							  <source src="{{ $gril_hot->Cvideo }}" type="video/webm" />
							  <object data="{{ $gril_hot->Cvideo }}" width="100%" height="100%">
							    	<embed src="{{ $gril_hot->Cvideo }}" width="100%" height="100%" />
							  </object>
						</video>
					    <h5 class="top"><a href="#" title="{{$gril_hot['Earticle']}}">{{mb_substr($gril_hot['Ctitle'],0,16).'..'}}</a></h5>
					    <a class="span_link" href="#">
					    	<span class="glyphicon glyphicon-comment"></span>{{$gril_hot['count']}} 
					    </a>
					    <a class="span_link" href="#">
					    	<span class="glyphicon glyphicon-eye-open"></span>56  
					    </a>
					    <a class="span_link" href="single.html">
					    	<span class="glyphicon glyphicon-circle-arrow-right"></span>
					    </a>
					    </p>
				</div>
			 	<div class="edit-pics">
			 		@foreach($comment_data as $k => $v)	
		      		<div class="editor-pics">
					 <div class="col-md-3 item-pic">
					   <a href="/member/{{$v['Uid']}}"><img src="{{ $v['Uimage'] }}" class="img-responsive" alt="" style="width:100px;height:70px;"></a>

					   </div>
						<div class="col-md-9 item-details">
							<h5 class="inner two"><a href="single.html" title="{{$v['Dcontent']}}">{{mb_substr($v['Dcontent'],0,14).'..'}}</a></h5>
							 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>{{strtok($v['created_at'],' ')}} <a href="/comment/{{$v['Uid']}}"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
						 </div>
						<div class="clearfix"></div>
					</div>
					@endforeach
				</div>
				<div class="media">	
					 <h3 class="tittle media">Poster <i class="glyphicon glyphicon-leaf"></i></h3>
					 <!-- 广告 -->
					 @foreach($poster_data as $k => $v)
					  <div class="general-text two">
						 <a href="{{$v->POurl}}"><img src="{{$v->POpic}}" class="img-responsive" alt="" style="height:260px;"></a>
							<p>{{mb_substr($v->POmiaoshu,0,66).'..'}}</p>
					  </div>
					  @endforeach
					  <!-- 广告end -->
		        </div>
			     
		 </div>
	</div>	
	<!--//general-news-->
	<!--/news-->
	</div>
	<div class="clearfix"> </div>
<!-- 内容区域结束 -->
@endsection
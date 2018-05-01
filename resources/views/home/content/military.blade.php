@extends('home/layout/header')
@section('content')

	<!-- 内容区域 -->
	<div class="banner-section">
    <h3 class="tittle">{{$title}} <i class="glyphicon glyphicon-flag"></i></h3>
	 	<!--/top-news-->
		<div class="top-news" style="margin-top:-50px;">
		  	<!-- 中间 -->
		  	<style type="text/css">
				.zzjhove img:hover{box-shadow: 0 0 5px 1px #6BC4C7}
		  	</style>
			<div class="top-inner second">
				@foreach($military_data as $k => $v)
					<div class="col-md-6 top-text zzjhove" style="height:430px;">
						 <a href="/home/show/{{$v->Cid}}"><img src="{{$v->Cpicture}}" class="img-responsive" alt="" style="height:300px;"></a>
						    <h4 class="top"><a href="/home/show/{{$v->Cid}}" title="{{$v->Ctitle}}">{{mb_substr($v->Ctitle,0,16).'..'}}</a></h4>
							<p>{{mb_substr($v->Ccontent,0,66).'..'}}</p>
						    <p>{{strtok($v->created_at,' ')}}
						    	<a class="span_link" href="/home/show/{{$v->Cid}}" style="float:right">
							    	<span class="glyphicon glyphicon-eye-open"></span>{{$v->Ccount}} 
							    </a>
							    <a class="span_link" href="/home/show/{{$v->Cid}}" style="float:right">
							    	<span class="glyphicon glyphicon-comment"></span>{{$military_data2[$k]['count']}} 
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
	                  {!! $military_data->render() !!}
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
					 <a href="/home/show/{{$military_hot->Cid}}"><img src="{{$military_hot['Cpicture']}}" class="img-responsive" alt=""></a>
					    <h4 class="top"><a href="/home/show/{{ $military_hot->Cid }}">{{mb_substr($military_hot['Ctitle'],0,16).'..'}}</a></h4>
						<p>{{mb_substr($military_hot->Ccontent,0,66).'..'}}</p>
					    <p>{{strtok($military_hot['created_at'],' ')}}
					    <a class="span_link" href="/home/show/{{ $military_hot->Cid }}">
					    	<span class="glyphicon glyphicon-comment"></span>{{$military_hot['count']}}  
					    </a>
					   
					    	<span class="glyphicon glyphicon-eye-open"></span>{{$military_hot->Ccount}}  
					   
					    </p>
				</div>
			 	<div class="edit-pics">
			 	@if(isset($comment_data))
			 		@foreach($comment_data as $k => $v)	
		      		<div class="editor-pics">
					 <div class="col-md-3 item-pic">
					   <a href="/home/show/{{$military_hot->Cid}}"><img src="{{ $v['Uimage'] }}" class="img-responsive" alt="" style="width:100px;height:70px;"></a>

					   </div>
						<div class="col-md-9 item-details">
							<h5 class="inner two"><a href="/home/show/{{$military_hot->Cid}}" title="{{$v['Dcontent']}}">{{mb_substr($v['Dcontent'],0,14).'..'}}</a></h5>
							 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>{{strtok($v['created_at'],' ')}} <a href="/home/show/{{$military_hot->Cid}}"><i class="glyphicon glyphicon-comment"></i></a></div>
						 </div>
						<div class="clearfix"></div>
					</div>
					
					@endforeach
				@endif
				</div>
				<div class="media">	
					 <h3 class="tittle media">Poster <i class="glyphicon glyphicon-leaf"></i></h3>
					 <!-- 广告 -->
					 @foreach($poster_data as $k => $v)
					  <div class="general-text two">
						 <a href="{{$v->POurl}}" target="_blank"><img src="{{$v->POpic}}" class="img-responsive" alt="" style="height:260px;"></a>
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
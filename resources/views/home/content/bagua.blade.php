@extends('home/layout/header')
@section('content')

<!-- 内容区域 -->
<div class="banner-section">
   <h3 class="tittle">{{ $title }}<i class="glyphicon glyphicon-screenshot"></i></h3>
	  <!--/top-news-->
	  
        <div class="top-news" style="margin-top:-50px;">
		  	<!-- 中间 -->
			<div class="top-inner second">
				@foreach($bagua as $k => $v)
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
				{!! $bagua->render() !!}
				</div>
		 	</div>
			<!-- 中间end -->
	    </div>

			<!--//top-news-->
     </div>
	<div class="banner-right-text">
	 <h3 class="tittle">{{ $guanggao }}  <i class="glyphicon glyphicon-floppy-disk"></i></h3>
	<!--/general-news-->
	 <div class="general-news">
		<div class="general-inner">
			@foreach ($poster as $v)
			<div class="general-text">
				<a href="/home/show/{{ $v->POid }}"><img src="{{ $v->POpic }}" class="img-responsive" alt=""></a>
				<h4 class="top"><a href="single.html">{{ $v->POauthor }}</a></h4>
			</div>
			 @endforeach
		 </div>
	</div>	
	<!--//general-news-->
	<!--/news-->
	<!--/news-->
</div>
	<div class="clearfix"> </div>
<!-- 内容区域结束 -->
@endsection
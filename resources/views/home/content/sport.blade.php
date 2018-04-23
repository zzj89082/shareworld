@extends('home/layout/header')
@section('content')

<!-- 内容区域 -->
<div class="banner-section">
   <h3 class="tittle">{{ $title }}<i class="glyphicon glyphicon-screenshot"></i></h3>
	  <!--/top-news-->
	  <div class="top-news">
		<div class="top-inner">
			@foreach($sport as $k => $v)
			<div class="col-md-12 top-text" style="margin: 15px 0;">
				 <div class="col-md-3 item-pic">
				 <a href="/home/show/{{ $v->Cid }}"><img src="{{ $v->Cpicture }}" class="img-responsive" alt=""></a>
				 </div>
				 <div class="col-md-9 item-details">
				    <h4 class="top"><a href="/home/show/{{ $v->Cid }}">{{ $v->Ctitle }}</a></h4>
					<p>{{mb_substr($v->Ccontent,0,80).'...'}}</p>
					<div><img src="{{$v->content_user->Uimage}}" style="width:30px;height:30px;border-radius: 50%"> {{$v->content_user->Ualais}}</div>
					<div>
				    	<p>{{ $v->created_at }}<a class="span_link" href="/home/show/{{ $v->Cid }}"><span class="glyphicon glyphicon-comment"></span>{{ $v->Ccomment or 0 }}</a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
				    </div>
				 </div>
			 </div>
			@endforeach
			 <div class="clearfix"> </div>
		 </div>
		 
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
						<div class="media">	
						 <h3 class="tittle media">{{ $video }} <i class="glyphicon glyphicon-facetime-video"></i></h3>
						@foreach ($data as $v)
						  <div class="general-text two">
							 <video width="470" height="400" controls="controls">
							  <source src="{{ $v->Evideo }}" type="video/mp4" />
							  <source src="{{ $v->Evideo }}" type="video/ogg" />
							  <source src="{{ $v->Evideo }}" type="video/webm" />
							  <object data="{{ $v->Evideo }}" width="100%" height="100%">
							    <embed src="{{ $v->Evideo }}" width="100%" height="100%" />
							  </object>
							</video>
								<h4 class="top"><a href="single.html">{{ $v->Ualais }}</a></h4>
								<p>{{ $v->Earticle }}</p>
								<p>{{ $v->created_at }}<a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
						  </div>
						@endforeach
			         </div>
			    <!-- <div class="general-text two">
				    <a href="single.html"><img src="/home/images/gen2.jpg" class="img-responsive" alt=""></a>
				    <h4 class="top"><a href="single.html">Consetetur sadipscing elit</a></h4>
					<p>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt labore dolore magna aliquyam eratsed diam justo duo dolores rebum.</p>
				    <p>On Jun 27 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
			    </div> -->
		 </div>
	</div>	
	<!--//general-news-->
	<!--/news-->
	<!--/news-->
</div>
	<div class="clearfix"> </div>
<!-- 内容区域结束 -->
@endsection
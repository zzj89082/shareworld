@extends('home/layout/header')
@section('content')

<!-- 内容区域 -->
<div class="banner-section">
   <!-- <h3 class="tittle">{{--{{ $title }}--}}<i class="glyphicon glyphicon-screenshot"></i></h3> -->
	  <!--/top-news-->
	  <div class="top-news">
		<div class="top-inner">
			<h3>{{$title}}</h3>
			 <div class="clearfix"> </div>
		 </div>
		 
        </div>
			<!--//top-news-->
     </div>
	<div class="banner-right-text">
	 <!-- <h3 class="tittle">{{--{{ $guanggao }}--}}  <i class="glyphicon glyphicon-floppy-disk"></i></h3> -->
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
						 <h3 class="tittle media">{{--{{ $video }}--}} <i class="glyphicon glyphicon-facetime-video"></i></h3>
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
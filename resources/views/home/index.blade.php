@extends('home/layout/header')
@section('content')

<!-- 内容区域 -->
<div class="banner-section">
   <h3 class="tittle">{{ $lunbo }} <i class="glyphicon glyphicon-picture"></i></h3>
	<div class="banner">
         <div  class="callbacks_container">
			<ul class="rslides" id="slider4">
				@foreach($rollimg as $v)
			       <li>
					  <img src="{{ $v->Rimg }}" class="img-responsive" alt="" />
   				</li>
				@endforeach
				</ul>
			</div>
			<!--banner-->
			<script src="/home/js/responsiveslides.min.js"></script>
	 <script>
	    // You can also use "$(window).load(function() {"
	    $(function () {
	      // Slideshow 4
	      $("#slider4").responsiveSlides({
	        auto: true,
	        pager:true,
	        nav:true,
	        speed: 500,
	        namespace: "callbacks",
	        before: function () {
	          $('.events').append("<li>before event fired.</li>");
	        },
	        after: function () {
	          $('.events').append("<li>after event fired.</li>");
	        }
	      });
	    });
	  </script>
 <div class="clearfix"> </div>
	    <div class="b-bottom">
		</div>
	 </div>
	   <!--//banner-->
	  <!--/top-news-->
	  <div class="top-news">
		<div class="top-inner">
			@foreach($remen as $k => $v)
			<div class="col-md-12 top-text" style="margin: 15px 0;">
				 <div class="col-md-3 item-pic">
				 <a href="/home/show/{{ $v->Cid }}"><img src="{{ $v->Cpicture }}" class="img-responsive" alt="" style="width:220px;height:160px;"></a>
				 </div>
				 <div class="col-md-9 item-details">
				    <h4 class="top"><a href="/home/show/{{ $v->Cid }}">{{ $v->Ctitle }}</a></h4>
					<p>{{mb_substr($v->Ccontent,0,80).'...'}}</p>
					<div><img src="{{$v->content_user->Uimage}}" style="width:30px;height:30px;border-radius: 50%"> {{$v->content_user->Ualais}} </div>
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
	 <h3 class="tittle">{{ $redian }}  <i class="glyphicon glyphicon-floppy-disk"></i></h3>
	<!--/general-news-->
	 <div class="general-news">
		<div class="general-inner">
			<div class="general-text">
				 <a href="/home/show/{{ $content->Cid }}"><img src="{{ $content->Cpicture }}" class="img-responsive" alt=""></a>
				    <h4 class="top"><a href="/home/show/{{ $content->Cid }}">{{ $content->Ctitle }}</a></h4>
					<p>{{mb_substr($content->Ccontent,0,50).'...'}}</p>
				    <p>{{ $content->created_at }}<a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>{{ $content->Ccomment or 0}} </a><a class="span_link" href="/home/show/{{ $content->Cid }}"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
			 </div>
			 <div class="edit-pics">
			 		@foreach($content1 as $v)
					      <div class="editor-pics">
								 <div class="col-md-3 item-pic">
								   <img src="{{ $v->Cpicture }}" class="img-responsive" style="width:100px;height:70px;">
								   </div>
									<div class="col-md-9 item-details">
										<h4 class="inner two"><a href="/home/show/{{ $v->Cid }}">{{ $v->Ctitle }}</a></h4>
										 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>{{ $v->created_at }} <a href="#"><i class="glyphicon glyphicon-comment"></i>{{ $v->Ccomment or 0 }}</a></div>
									 </div>
									<div class="clearfix"></div>
								</div>
					@endforeach
							</div>
						<div class="media">	
						 <h3 class="tittle media">{{ $video }} <i class="glyphicon glyphicon-facetime-video"></i></h3>
						 @foreach ($data as $v)
						  <div class="general-text two">
							 <video width="320" height="350" controls="controls">
							  <source src="{{ $v->Evideo }}" type="video/mp4" />
							  <source src="{{ $v->Evideo }}" type="video/ogg" />
							  <source src="{{ $v->Evideo }}" type="video/webm" />
							  <object data="{{ $v->Evideo }}" width="100%" height="100%">
							    <embed src="{{ $v->Evideo }}" width="100%" height="100%" />
							  </object>
							</video>
								<h4 class="top"><a href="single.html">{{ $v->Ualais }}</a></h4>
								<p>{{ $v->Earticle }}</p>
								<p>{{ $v->created_at }} <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
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
@extends('home/layout/header')
@section('content')

	<!-- 内容区域 -->
	<div class="banner-section">
    <h3 class="tittle">{{$title}} <i class="glyphicon glyphicon-flag"></i></h3>
	 	<!--/top-news-->
		<div class="top-news" style="margin-top:-50px;">
		  	<!-- 中间 -->
			<div class="top-inner second">
				@foreach($military_data as $k => $v)
					<div class="col-md-6 top-text">
						 <a href="single.html"><img src="{{$v->Cpicture}}" class="img-responsive" alt="" style="height:300px;"></a>
						    <h5 class="top"><a href="single.html">{{mb_substr($v->Ctitle,0,10).'..'}}</a></h5>
							<p>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt labore dolore magna aliquyam eratsed diam justo duo dolores rebum.</p>
						    <p>On Jun 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
					</div>
					@if( $k%2 == 1 && $k>2)
				 	<div class="clearfix" style="margin-bottom:20px;"> </div>
					@endif
				 @endforeach
		 	</div>
			<!-- 中间end -->
	    </div>
		<!--//top-news-->
     </div>
	<!-- 右侧 -->
	<div class="banner-right-text">
	 <h3 class="tittle">News  <i class="glyphicon glyphicon-facetime-video"></i></h3>
	<!--/general-news-->
	 <div class="general-news">
		<div class="general-inner">
			<div class="general-text">
				 <a href="single.html"><img src="/home/images/gen1.jpg" class="img-responsive" alt=""></a>
				    <h5 class="top"><a href="single.html">Consetetur sadipscing elit</a></h5>
					<p>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt labore dolore magna aliquyam eratsed diam justo duo dolores rebum.</p>
				    <p>On Jun 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
			 </div>
			 <div class="edit-pics">
					      <div class="editor-pics">
								 <div class="col-md-3 item-pic">
								   <img src="/home/images/f4.jpg" class="img-responsive" alt="">

								   </div>
									<div class="col-md-9 item-details">
										<h5 class="inner two"><a href="single.html">New iPad App to simulate your Guitar</a></h5>
										 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
									 </div>
									<div class="clearfix"></div>
								</div>
								<div class="editor-pics">
								 <div class="col-md-3 item-pic">
								   <img src="/home/images/f1.jpg" class="img-responsive" alt="">

								   </div>
									<div class="col-md-9 item-details">
										<h5 class="inner two"><a href="single.html">New iPad App to simulate your Guitar</a></h5>
										 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
									 </div>
									<div class="clearfix"></div>
								</div>
								<div class="editor-pics">
								 <div class="col-md-3 item-pic">
								   <img src="/home/images/f1.jpg" class="img-responsive" alt="">

								   </div>
									<div class="col-md-9 item-details">
										<h5 class="inner two"><a href="single.html">New iPad App to simulate your Guitar</a></h5>
										 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
									 </div>
									<div class="clearfix"></div>
								</div>
								<div class="editor-pics">
								 <div class="col-md-3 item-pic">
								   <img src="/home/images/f4.jpg" class="img-responsive" alt="">

								   </div>
									<div class="col-md-9 item-details">
										<h5 class="inner two"><a href="single.html">New iPad App to simulate your Guitar</a></h5>
										 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
									 </div>
									<div class="clearfix"></div>
								</div>
							</div>
						<div class="media">	
						 <h3 class="tittle media">Media <i class="glyphicon glyphicon-floppy-disk"></i></h3>
						  <div class="general-text two">
							 <a href="single.html"><img src="/home/images/gen3.jpg" class="img-responsive" alt=""></a>
								<h5 class="top"><a href="single.html">Consetetur sadipscing elit</a></h5>
								<p>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt labore dolore magna aliquyam eratsed diam justo duo dolores rebum.</p>
								<p>On Jun 27 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
						  </div>
			         </div>
			    <div class="general-text two">
				    <a href="single.html"><img src="/home/images/gen2.jpg" class="img-responsive" alt=""></a>
				    <h5 class="top"><a href="single.html">Consetetur sadipscing elit</a></h5>
					<p>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt labore dolore magna aliquyam eratsed diam justo duo dolores rebum.</p>
				    <p>On Jun 27 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
			    </div>
		 </div>
	</div>	
	<!--//general-news-->
	<!--/news-->
	</div>
	<div class="clearfix"> </div>
<!-- 内容区域结束 -->
@endsection
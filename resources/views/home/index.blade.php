@extends('home/layout/header')
@section('content')

<!-- 内容区域 -->
<div class="banner-section">
   <h3 class="tittle">General <i class="glyphicon glyphicon-picture"></i></h3>
	<div class="banner">
         <div  class="callbacks_container">
			<ul class="rslides" id="slider4">
			       <li>
					  <img src="/home/images/1.jpg" class="img-responsive" alt="" />

					</li>
					<li>
						 <img src="/home/images/2.jpg" class="img-responsive" alt="" />


					</li>
					<li>
					 <img src="/home/images/3.jpg" class="img-responsive" alt="" />

					
					</li>
					<li>
					 <img src="/home/images/3.jpg" class="img-responsive" alt="" />


					</li>
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
	      <h5 class="top"><a href="single.html">What turn out consetetur sadipscing elit</a></h5>
	      <p>On Aug 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
		</div>
	 </div>
	   <!--//banner-->
	  <!--/top-news-->
	  <div class="top-news">
		<div class="top-inner">
			<div class="col-md-6 top-text">
				 <a href="single.html"><img src="/home/images/pic1.jpg" class="img-responsive" alt=""></a>
				    <h5 class="top"><a href="single.html">Consetetur sadipscing elit</a></h5>
					<p>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt labore dolore magna aliquyam eratsed diam justo duo dolores rebum.</p>
				    <p>On Jun 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
			 </div>
			<div class="col-md-6 top-text two">
				 <a href="single.html"><img src="/home/images/pic2.jpg" class="img-responsive" alt=""></a>
				    <h5 class="top"><a href="single.html">Consetetur sadipscing elit</a></h5>
					<p>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt labore dolore magna aliquyam eratsed diam justo duo dolores rebum.</p>
				    <p>On Jun 27 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
			 </div>
			 <div class="clearfix"> </div>
		 </div>
		 <div class="top-inner second">
			<div class="col-md-6 top-text">
				 <a href="single.html"><img src="/home/images/pic3.jpg" class="img-responsive" alt=""></a>
				    <h5 class="top"><a href="single.html">Consetetur sadipscing elit</a></h5>
					<p>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt labore dolore magna aliquyam eratsed diam justo duo dolores rebum.</p>
				    <p>On Jun 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
			 </div>
			<div class="col-md-6 top-text two">
				 <a href="single.html"><img src="/home/images/pic4.jpg" class="img-responsive" alt=""></a>
				    <h5 class="top"><a href="single.html">Consetetur sadipscing elit</a></h5>
					<p>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt labore dolore magna aliquyam eratsed diam justo duo dolores rebum.</p>
				    <p>On Jun 27 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
			 </div>
			 <div class="clearfix"> </div>
		 </div>
        </div>
			<!--//top-news-->
     </div>
	<!--//banner-section--><div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >网页模板</a></div>
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
	<!--/news-->
</div>
	<div class="clearfix"> </div>
<!-- 内容区域结束 -->
@endsection
<!DOCTYPE HTML>
<html>
<head>
<link href="{{ session('data_config')['config_ico'] }}" type="image/x-icon" rel="chortcut icon"/>
<title>{{ session('data_config')['config_title'] }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="keywords" content="Blogger Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android  Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="/home/css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href='/home/css/style.css?family=Open+Sans:700,700italic,800,300,300italic,400italic,400,600,600italic' rel='stylesheet' type='text/css'>
<!--Custom-Theme-files-->
	<link href="/home/css/style.css" rel='stylesheet' type='text/css' />	
	<script src="/home/js/jquery.min.js"> </script>
	<script src="/layui/layui.all.js"> </script>
<!--/script-->
	<style type="text/css">
		ul,li{
			list-style: none;
			margin: 0px;
			padding: 0px;
		}

	</style>
<script type="text/javascript" src="/home/js/move-top.js"></script>
<script type="text/javascript" src="/home/js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				})
			});
</script>

</head>
<body>
	<!-- header-section-starts -->
      <div class="h-top" id="home">
		   <div class="top-header">
				  <ul class="cl-effect-16 top-nag">
						<li><a href="http://www.hao123.com/mail" data-hover="联系我们">联系我们</a></li> 
						<li><a href="/home/guanyu" data-hover="关于我们">关于我们</a></li>
						@if(session('home_login'))
						<li><a href="/home/fankui" data-hover="信息反馈">信息反馈</a></li>
						<li><a href="/release" data-hover="发布微博">发布微博</a></li>
						@else
						<li><a href="/home/login" data-hover="信息反馈">信息反馈</a></li>
						<li><a href="/home/login" data-hover="登录">登录</a></li>
						@endif
					</ul>
					<div class="search-box">
					    <div class="b-search">
								<form action="/home/search" method="get">
										<input type="text" value="{{$keywords['keywords'] or 'Search'}}" name="keywords" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
										<input type="submit" value="">
								</form>
							</div>
						</div>

					<div class="clearfix"></div>
				</div>
       </div>
	<div class="full">
			<div class="col-md-3 top-nav">
				    <div class="logo">
						<a href="/"><img style="width:120px;height:56px;" src="{{ session('data_config')['config_logo'] }}" alt=""></a>
					</div>
					<div class="top-menu">
						<?php
							use App\Models\Type;
							$data = Type::where('Ttype','!=','热门')->get();
						?>
							
						
					<ul class="cl-effect-16">
						<li><a href="/" data-hover="热门">热门</a></li>
						@foreach ($data as $v)
							<li><a href="/home/{{$v->Turl}}" data-hover="{{$v->Ttype}}">{{$v->Ttype}}</a></li>
						@endforeach 
						
					</ul>
					<!-- script-for-nav -->
					<script>
						$( "span.menu" ).click(function() {
						  $( ".top-menu ul" ).slideToggle(300, function() {
							// Animation complete.
						  });
						});
					</script>
				<!-- script-for-nav --> 	
					<ul class="side-icons">
							<li><a class="fb" href="#"></a></li>
							<li><a class="twitt" href="#"></a></li>
							<li><a class="goog" href="#"></a></li>
							<li><a class="drib" href="#"></a></li>
					</ul>
			    </div>
			</div>
	<div class="col-md-9 main">
		<!--banner-section-->

		<!-- 内容区域 -->
		@section('content')
        @show
		<!-- 内容区域结束 -->

	    <!--/footer-->
		<div class="footer">
				 <div class="footer-top">
				    <div class="col-md-4 footer-grid">
					     <h4>制作人　团队 </h4>
				          <ul class="bottom">
							 <li>重案六组制作</li>
							 <li>张智建、马鸿灿、齐红运、付方政</li>
						 </ul>
				    </div>
					  <div class="col-md-4 footer-grid">
					     <h4>主页　邮箱</h4>
				            <ul class="bottom">
						     <li><i class="glyphicon glyphicon-home"></i>www.shareworld.com </li>
							 <li><i class="glyphicon glyphicon-envelope"></i>18410043871@163.com</li>
						   </ul>
				    </div>
					<div class="col-md-4 footer-grid">
					     <h4>电话　地址</h4>
				           <ul class="bottom">
						     <li><i class="glyphicon glyphicon-map-marker"></i>北京昌平区兄弟连3A06 </li>
							 <li><i class="glyphicon glyphicon-earphone"></i>phone: (888) 184-1004-3871 </li>
						   </ul>
				    </div>
					<div class="clearfix"> </div>
				 </div>
		 </div>
		<div class="copy">
		    <p>Copyright &copy; 2018.Company name All rights reserved.More Templates <a href="#" target="_blank" title="分享我的世界" style="color:#fff">分享我的世界</a> -重案六组制作</p>
		</div>
		<div class="clearfix"> </div>	

	</div>
	<div class="clearfix"> </div>
	
</div>	
		<!--//footer-->
			<!--start-smooth-scrolling-->
						<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
		<script type="text/javascript">
			$(function(){
				$(document).scroll(function(){
					//页面
					var height = $('.main').height();
					height = height - 45;
					$('.full>.top-nav').css('padding-bottom',height+'px');
				});
			});
		</script>

</body>
</html>
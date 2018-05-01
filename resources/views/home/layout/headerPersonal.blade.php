<!DOCTYPE HTML>
<html>
<head>
<link href="{{ session('data_config')['config_ico'] }}" type="image/x-icon" rel="chortcut icon"/>
<link rel="stylesheet" type="text/css" href="/layui/css/layui.css" media="all">
<script type="text/javascript" src="/layui/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/layui/layui.all.js"></script>
<title>{{ session('data_config')['config_title'] }}</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Blogger Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android  Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="/home/css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href='/home/css/style.css?family=Open+Sans:700,700italic,800,300,300italic,400italic,400,600,600italic' rel='stylesheet' type='text/css'>
<!--Custom-Theme-files-->
	<link href="/home/css/style.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet"  href="/home/css/zoom.css" media="all" />	
	<link rel="stylesheet" href="/layui/css/layui.css" media="all">
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
<!-- 表情 -->
<link rel="stylesheet" type="text/css" href="/home/css/jquery.sinaEmotion.css">
<script src="/home/js/jquery.sinaEmotion.js"></script>
<!-- 表情end -->
<!-- layui -->
	<link rel="stylesheet" type="text/css" href="/layui/css/layui.css">
	<script type="text/javascript" src="/layui/layui.all.js"></script>
	<script>
	//由于模块都一次性加载，因此不用执行 layui.use() 来加载对应模块，直接使用即可：
	;!function(){
	  var layer = layui.layer
	  ,form = layui.form;
	}();
	</script> 
<!-- layui-end -->

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
						<li><a href="/personal/index" data-hover="个人中心">个人中心</a></li>
						<li><a href="/home/login/out" data-hover="退 出">退 出</a></li>
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

					<ul class="cl-effect-16">

						<li><a href="/release" data-hover="发布微博">发布微博</a></li> 
						<li><a href="/photo" data-hover="相　　册">相　　册</a></li>
						<li><a href="/hcomment" data-hover="评　　论">评　　论</a></li>
						<li><a data-hover="我的收藏" href="/collect/list">我的收藏</a></li>

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
		@if (count($errors) > 0)
			<div class="alert alert-danger" id="box2">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
				<script type="text/javascript">
				$('#box2').click(function(){
					//alert('123');
					$(this).css('display','none');
				});
				</script>
			</div>
			@endif
		<!--banner-section-->
		@if(session('success'))
			<script>
				layer.msg("{{session('success')}}",{time: 1000});
			</script>
		@endif

		@if(session('error'))
			<script>
				layer.msg("{{ session('error') }}", {icon: 5,anim: 6,time: 1000});
			</script>
		@endif
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
	<script type="text/javascript">
		//layUI
		//一般直接写在一个js文件中
		layui.use(['layer', 'form'], function(){
			var layer = layui.layer
					,form = layui.form;
		});
	</script>

	<!-- 读取模版的提示信息 -->
	@if(session('success'))
		<script>
			layer.msg("{{session('success')}}",{time: 1000});
		</script>
	@endif

	@if(session('error'))

		<script>
			layer.msg("{{ session('error') }}", {icon: 5,anim: 6,time: 1000});
		</script>
	@endif

</body>
</html>
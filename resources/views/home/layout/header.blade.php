<!DOCTYPE HTML>
<html>
<head>
<link href="/admin/img/favicon.png" type="image/x-icon" rel="chortcut icon"/>
<title>{{ Config::get('view.webTitle') }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Blogger Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android  Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="/home/css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href='/home/css/style.css?family=Open+Sans:700,700italic,800,300,300italic,400italic,400,600,600italic' rel='stylesheet' type='text/css'>
<!--Custom-Theme-files-->
	<link href="/home/css/style.css" rel='stylesheet' type='text/css' />	
	<script src="/home/js/jquery.min.js"> </script>
<!--/script-->
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
						<li><a href="registration.html" data-hover="联系我们">联系我们</a></li> 
						<li><a href="about.html" data-hover="关于我们">关于我们</a></li>
						<li><a href="services.html" data-hover="在线咨询">在线咨询</a></li>
						<li><a href="login.html" data-hover="登录">登录</a></li>
					</ul>
					<div class="search-box">
					    <div class="b-search">
								<form>
										<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
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
						<a href="index.html"><img src="/home/images/logo.jpg" alt=""></a>
					</div>
					<div class="top-menu">

					<ul class="cl-effect-16">
						<li><a class="active" href="/home/index" data-hover="热门">热门</a></li> 
						<li><a href="about.html" data-hover="头条">头条</a></li>
						<li><a href="grid.html" data-hover="视频">视频</a></li>
						<li><a href="services.html" data-hover="新鲜事">新鲜事</a></li>
						<li><a href="gallery.html" data-hover="搞笑">搞笑</a></li>
						<li><a href="contact.html" data-hover="时尚">时尚</a></li>
						<li><a href="/home/military" data-hover="军事">军事</a></li>
						<li><a href="/home/gril" data-hover="美女">美女</a></li>
						<li><a href="contact.html" data-hover="体育">体育</a></li>
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
					     <h4>Lorem sadipscing </h4>
				          <ul class="bottom">
							 <li>Consetetur sadipscing elitr</li>
							 <li>Magna aliquyam eratsed diam</li>
						 </ul>
				    </div>
					  <div class="col-md-4 footer-grid">
					     <h4>Message Us Now</h4>
				            <ul class="bottom">
						     <li><i class="glyphicon glyphicon-home"></i>Available 24/7 </li>
							 <li><i class="glyphicon glyphicon-envelope"></i><a href="mailto:info@example.com">mail@example.com</a></li>
						   </ul>
				    </div>
					<div class="col-md-4 footer-grid">
					     <h4>Address Location</h4>
				           <ul class="bottom">
						     <li><i class="glyphicon glyphicon-map-marker"></i>2901 Glassgow Road, WA 98122-1090 </li>
							 <li><i class="glyphicon glyphicon-earphone"></i>phone: (888) 123-456-7899 </li>
						   </ul>
				    </div>
					<div class="clearfix"> </div>
				 </div>
		 </div>
		<div class="copy">
		    <p>Copyright &copy; 2018.Company name All rights reserved.More Templates <a href="#" target="_blank" title="分享我的世界">分享我的世界</a> - Collect from <a href="#" title="重案六组制作" target="_blank">重案六组制作</a></p>
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


</body>
</html>
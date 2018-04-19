<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ Config::get('view.webTitle') }}</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- 自动跳转 -->
	<meta http-equiv="refresh" content="5;url=http://www.shareworld.com/">
	<!-- //css files -->
	<link href="/admin/img/favicon.png" type="image/x-icon" rel="chortcut icon"/>
	<style type="text/css">
		*{
			margin:0;padding:0;
		}
		html{overflow: hidden}
		.jumbotron{
			margin-bottom: 0;
		}

		.slide{
			background: url(./images/Slider.jpg) no-repeat;
			height: 500px;
			color: #fff;
			text-align: center;
			height: 900px;
			text-transform: uppercase;
		}

		
		.slide h1{
			vertical-align: middle;	
			font-size: 55px;
			font-size: 8.5vmin;
			margin-bottom: 70px;
			text-shadow: 1px 1px 2px rgba(150, 150, 150, 1);
		}
		.container{
			padding-top:10%;
		}
		.container a{
			background:#FA5C58;
			color:#fff;
			text-decoration: none;
			display: block;
			line-height: 62px;
			margin:0 auto;
			width:268px;height:62px;
		}
		b{
			color:#A2FF71;
		}
	</style>
</head>
<body>
	
	<div id="home" class="jumbotron slide">
		<div class="container" style="">
			<span>
			<h2>@if ($status_success)
						恭喜您
						@endif
					 @if($status_error)
					 	非常抱歉
					 	@endif
			　<b>{{$title}}</b>
			</h2></span>
			<h1>Weclome to Share World</h1>
			<a class="btn btn-lg btn-primary button--ujarak" target="_blank">
			@if($status_success)
				{{$status_success}}
			@endif
			@if($status_error)
				{{$status_error}}
			@endif
			</a>
		</div>
	</div>
</body>
</html>
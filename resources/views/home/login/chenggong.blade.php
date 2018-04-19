<!DOCTYPE HTML>
<html>
<head>
<title>{{ Config::get('view.webTitle') }}</title>
<link href="/home/wjmm/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<script type="text/javascript" src="/jquery/jquery-1.8.3.min.js"></script>
</head>
<body>	
<div class="login">
	<h2>ShareWorld</h2>
	<div class="login-top">
		<div class="class3">
			<div class="class1">1</div>
			<div class="class2"></div>
			<div class="class2"></div>
			<div class="class2"></div>
			<div class="class2"></div>
			<div class="class1">2</div>
			<div class="class2"></div>
			<div class="class2"></div>
			<div class="class2"></div>
			<div class="class2"></div>
			<div class="class1" style="background: orange">3</div>
		</div>
		@if(session('yanzhengemail'))
		<h1 style="line-height: 150px;font-size: 20px;font-weight: 900;color:#2E3235;">发送邮件成功、请去邮箱激活</h1>
		@else 
		<h1 style="line-height: 150px;font-size: 20px;font-weight: 900;color:#2E3235;">修改密码成功<a href="http://www.shareworld.com/home/login">去登录</a></h1>
		@endif
	</div>
	<div class="login-bottom">
		<h3>New User &nbsp;<a href="http://www.shareworld.com/">返回主页</a>&nbsp Here</h3>
	</div>
</div>
<div class="copyright">
	<p>Share World &copy; 2018 PHP200期重案六组制作 | 点击返回 <a target="_blank" href="http://www.shareworld.com/">首页</a></p>
</div>
</body>
</html>
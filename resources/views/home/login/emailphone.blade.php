<!DOCTYPE HTML>
<html>
<head>
<title>{{ Config::get('view.webTitle') }}</title>
<!-- Custom Theme files -->
<link href="/home/wjmm/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<script type="text/javascript" src="/jquery/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/home/wjmm/js/yzm.js"></script>
 <link rel="stylesheet" type="text/css" href="/layui/css/layui.css">
<script type="text/javascript" src="/layui/layui.all.js"></script>
<script type="text/javascript" src="/layui/jquery-3.2.1.min.js"></script>
<!-- layUI框架 -->
<script type="text/javascript">
    //layUI
    //一般直接写在一个js文件中
    layui.use(['layer', 'form'], function(){
      var layer = layui.layer
      ,form = layui.form;
    });
</script>
<!--Google Fonts-->
<!--Google Fonts-->
</head>
<body>
	<!--用户名开始-->
<div class="login">
	<h2>ShareWorld</h2>
	<div class="login-top">
		<h1>找回账号密码</h1>
		<form onsubmit="return false;">
			<input type="text" name="username" value="用户名" onfocus="this.value = ''"; onblur="if (this.value == '') {this.value = '用户名';}">
			<div style="width: 240px">
				<input type="text" name="yzm" value="验证码" onfocus="this.value = ''"; onblur="if (this.value == '') {this.value = '验证码';}" style="width: 88px;float: left;">
				<img src="{{url('/home/forgetlogin/code')}}" style="padding-left:10px;" id="imgmake">
			</div>
			{{ csrf_field()}}
	    </form>
	    <div class="forgot">
	    	<input type="submit" value="立即验证" style="width:100%;">
	    </div>
	</div>
	<div class="login-bottom">
		<h3>New User &nbsp;<a href="http://www.shareworld.com/">返回主页</a>&nbsp Here</h3>
	</div>
</div>
<!--用户名结束-->	
<div class="copyright">
	<p>Share World &copy; 2018 PHP200期重案六组制作 | 点击返回 <a target="_blank" href="http://www.shareworld.com/">首页</a></p>
</div>
</body>
</html>
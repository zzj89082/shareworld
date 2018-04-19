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
	
	<!--选择找回方式开始-->
<div class="login">
	<h2>ShareWorld</h2>
	<div class="login-top">
		<div class="class3">
			<div class="class1" style="background: orange">1</div>
			<div class="class2"></div>
			<div class="class2"></div>
			<div class="class2"></div>
			<div class="class2"></div>
			<div class="class1">2</div>
			<div class="class2"></div>
			<div class="class2"></div>
			<div class="class2"></div>
			<div class="class2"></div>
			<div class="class1">3</div>
		</div>
		<h1>验证方式</h1>
		<form method="post" action="/home/forgetlogin/yzzhfs">
			邮箱验证：<input type="radio" name="yzfs" value="0" style="width:18px;height: 18px;"><br><br>
			手机验证：<input type="radio" name="yzfs" value="1" checked="checked" style="width:18px;height: 18px;"><br><br>
			{{ csrf_field()}}
			<div class="forgot">
	    		<input type="submit" value="提交" style="width:100%;">
	    	</div>
	    </form>
	</div>
	<div class="login-bottom">
		<h3>New User &nbsp;<a href="http://www.shareworld.com/">返回主页</a>&nbsp Here</h3>
	</div>
</div>
<!--找回方式结束-->

<div class="copyright">
	<p>Share World &copy; 2018 PHP200期重案六组制作 | 点击返回 <a target="_blank" href="http://www.shareworld.com/">首页</a></p>
</div>
</body>
</html>
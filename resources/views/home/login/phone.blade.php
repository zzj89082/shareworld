<!DOCTYPE html>
<html>
<head>
<title>{{ Config::get('view.webTitle') }}</title>
<link href="/home/wjmm/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<script type="text/javascript" src="/jquery/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/home/wjmm/js/phone.js"></script>
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
			<div class="class1" style="background: orange">2</div>
			<div class="class2"></div>
			<div class="class2"></div>
			<div class="class2"></div>
			<div class="class2"></div>
			<div class="class1">3</div>
		</div>
		<h1>手机验证</h1>
		<form onsubmit="return false;">
			<font size="4">新密码：</font><input type="password" name="pass" value="" placeholder="请输入密码">
			<font size="4">确认密码：</font><input type="password" name="repass" value="" placeholder="请输入确认密码">
			<font size="4">手机号：</font><input type="text" name="phone" value="" placeholder="请输入手机号">
			<input type="text" name="phoneyzm" placeholder="手机验证码" style="width: 87px;"><button style="width: 90px;height: 45px;cursor: pointer; border: none;border-radius: 20px;margin-left: 10px;color: #fff; background: #E15748;">获取验证码</button>
			{{ csrf_field()}}
	    </form>
	    <div class="forgot">
	    	<input type="submit" value="提交" style="width:100%;">
	    </div>
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
		
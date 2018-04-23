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
	<!--密码是否一致-->
	@if(session('error')) 
	<script type="text/javascript">
	 layer.msg("{{ session('error') }}", {icon: 5,anim: 6,time: 1000});
	 </script>
	 @endif
	<!--密码设置失败-->
	 @if(session('error1')) 
	<script type="text/javascript">
	 layer.msg("{{ session('error1') }}", {icon: 5,anim: 6,time: 1000});
	 </script>
	 @endif
<div class="login">
	<h2>ShareWorld</h2>
	<div class="login-top">
		<h1>修改密码</h1>
		<form action="{{ url('/home/forgetlogin/passemail') }}" method="post">
			{{ csrf_field()}}
			<font size="4">新密码：</font><input type="password" name="pass" value="" placeholder="请输入密码">
			<font size="4">确认密码：</font><input type="password" name="repass" value="" placeholder="请输入确认密码">
			<div class="forgot">
	    		<input type="submit" value="提交" style="width:100%;">
	    	</div>
	    </form>
	</div>
	<div class="login-bottom">
		<h3>New User &nbsp;<a href="http://www.shareworld.com/">返回主页</a>&nbsp Here</h3>
	</div>
</div>
</body>
</html>
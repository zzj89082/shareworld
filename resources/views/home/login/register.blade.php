<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ Config::get('view.webTitle') }}</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="keywords" content="Branded Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="/home/css/login.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="/home/css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->
<!-- online-fonts -->
<link href="/home/css/login.css?family=Orbitron:400,500,700,900" rel="stylesheet">
<link href="/home/css/login.css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<link href="/admin/img/favicon.png" type="image/x-icon" rel="chortcut icon"/>
<link rel="stylesheet" type="text/css" href="/layui/css/layui.css">
<script type="text/javascript" src="/layui/layui.all.js"></script>
<script type="text/javascript" src="/layui/jquery-3.2.1.min.js"></script>
<script>
    //由于模块都一次性加载，因此不用执行 layui.use() 来加载对应模块，直接使用即可：
    ;!function(){
        var layer = layui.layer
                ,form = layui.form;
    }();
</script>
<!-- //online-fonts -->
<!-- 滑动特效 -->
<style type="text/css">
	div.social_icons ul{
		margin-left: 25%;
	}
	div.social_icons ul li{
		float: left;
	}
	div.slide-social{
		width:130px;
	}
	.dis{display:block;}
	.undis{display:none;}
	#tel_code_button{
		outline: none;
		font-size: 1em;
		border: none;
		border: 1px solid #e15726;
		width: 70.5%;
		height:46px;
		color: #fff;
		background-color: #137DFF;
		padding: 1em 0 1em 1em;
		letter-spacing: 1px;
	}
	#tel_code_button:hover{
		color: #fff;
		background-color: #E15726;
		cursor: pointer;
	}
</style>
</head>
<body>
<div class="w3-agile-banner">
	<div class="center-container">
		<!--header-->
		<div class="header-w3l">
			<h1> My <span>Share</span> World 注册</h1>
		</div>
		<!--//header-->
		<!--main-->
		<div class="main-content-agile">
			<div class="wthree-pro">
				<h2>Welcome to register</h2>
			</div>
			<div class="w3-head-continue">
				<h4>注册一个属于我们的世界！</h4>
			</div>
			<div class="social_icons" id="tb_">
				<ul>
					<!-- 邮箱 -->
					<li id="tb_1" class="hovertab" onclick="x:HoverLi(1);">
						<div class="slide-social w3l">
						<a href="#">
							<div class="button">邮箱注册</div>
							<div class="facebook icon"> <i class="facebook"></i> </div>
							<div class="facebook slide">
								<p>邮箱注册</p>
							</div>
							<div class="clear"></div>
							</a>
						</div>
					</li>
					<!-- 手机 -->
					<li id="tb_2" class="normaltab" onclick="i:HoverLi(2);">
						<div class="slide-social w3l">
						<a href="#">
							<div class="button">手机注册</div>
							<div class="twitter icon"> <i class="twitter"></i></div>
							<div class="twitter slide">
								<p>手机注册</p>
							</div>
							<div class="clear"></div>
							</a> 
						</div>
					</li>
				</ul>
			</div>

			<div class="clear" style="height:20px;"></div>
			<!-- 邮箱登录 -->
			<div class="sub-main-w3 dis" id="tbc_01">	
				<form action="/home/register" method="post">
					<input type="hidden" name="Uemail_method" value="Uemail_method">
					{{csrf_field()}}
					<input placeholder="E-mail" name="Uemail" type="email" required="" id="Uemail" value="">
					<input  placeholder="Password" name="Upassswd" type="password" required="" id="Upassswd">
					<input  placeholder="确认密码" name="Upassswd2" type="password" required="" id="Upassswd2">
					<div class="clear"></div>
					<div class="rem-w3">
						<span class="check-w3"><input type="checkbox" checked />已经阅读并同意本站协议</span>
					</div>
					<div class="clear"></div>
					<input type="submit" value="点击注册">
				</form>
				<script type="text/javascript">
					$.ajaxSetup({
		               headers: {
		                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		               }
		           	});
		           		//ajax 实现登录时无刷新验证---邮箱
				       $('#Uemail').blur(function(){
				           var Uemail = $('#Uemail').val();
				           $.post('/home/ajax_register/email',{'Uemail':Uemail},function(msg){
				                if(msg == '1'){
				                    layer.msg('邮箱已存在', {
							        time: 3000 //3s后自动关闭
							      });
				                }
				                if(msg == '2'){
				                	layer.msg('邮箱格式不正确', {
							        time: 3000 //3s后自动关闭
							      });
				                }
				           },'HTML');
				       });

				       $('#Uemail').focus(function(){
				       		$('#Uemail').val('');
				       });
				       //ajax实现验证---密码---邮箱
				      $('#Upassswd').blur(function(){
				           var Upassswd = $('#Upassswd').val();
				           $.post('/home/ajax_register/pw',{'Upassword':Upassswd},function(msg){
				                if(msg == '2'){
				                	layer.msg('密码格式不正确(要求:6-18位)', {
							        time: 3000 //3s后自动关闭
							      	});
				                	$('#Upassswd').val('');
				                }
				           },'HTML');
				       });
				      $('#Upassswd2').blur(function(){
				      	   var Upassswd = $('#Upassswd').val();
				           var Upassswd2 = $('#Upassswd2').val();
				           $.post('/home/ajax_register/pw',{'Upassword2':Upassswd2,'Upassword':Upassswd},function(msg){
				                if(msg == '1'){
				                	layer.msg('两次密码不一致', {
							        time: 3000 //3s后自动关闭
							      	});
				                	$('#Upassswd2').val('');
				                }
				           },'HTML');
				       });
				</script>
			</div>
			<!-- 邮箱登录end -->

			<!-- 手机登录 -->
			<div class="sub-main-w3 undis" id="tbc_02">	
				<form action="/home/register" method="post">
					<input type="hidden" name="Utel_method" value="Utel_method">
					{{csrf_field()}}
					<input placeholder="Phone" name="Utel" type="text" required="" id="Utel" value="">
					<p style="margin-top:20px;">
						<input placeholder="手机验证码" name="tel_code" type="text" required="" id="tel_code" style="float:left;width:100px;">
						<button style="float:left" id="tel_code_button" onclick="sendCode();">免费获取验证码</button>
					</p>
					<input  placeholder="Password" name="telUpassswd" type="password" required="" id="telUpassswd">
					<input  placeholder="确认密码" name="telUpassswd2" type="password" required="" id="telUpassswd2">
					<div class="clear"></div>
					<div class="rem-w3">
						<span class="check-w3"><input type="checkbox" checked />已经阅读并同意本站协议</span>
					</div>
					<div class="clear"></div>
					<input type="submit" value="点击注册">
				</form>
				<script type="text/javascript">
					$.ajaxSetup({
		               headers: {
		                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		               }
		           	});
					//验证手机号
					//ajax 实现登录时无刷新验证---手机
			       $('#Utel').blur(function(){
			           var Utel = $('#Utel').val();
			           $.post('/home/ajax_register/tel',{'Utel':Utel},function(msg){
			                if(msg == '1'){
			                    layer.msg('号码已存在', {
							        time: 3000 //3s后自动关闭
							      	});
			                }
			                if(msg == '2'){
			                	layer.msg('号码格式不正确', {
							        time: 3000 //3s后自动关闭
							      	});
			                }
			           },'HTML');
			       });

			       $('#Utel').focus(function(){
			       		$('#Utel').val('');
			       });
			       //发送ajax进行手机验证
					function sendCode(){
						$.post('/home/register/sendcode',{'Utel':$('#Utel').val()},function(msg){
							if(msg.code == 2){
								layer.msg('发送成功', {
							        time: 3000 //3s后自动关闭
							      });
							}
						},'json');
					}
			       //ajax实现验证---密码---手机
			      $('#telUpassswd').blur(function(){
			           var telUpassswd = $('#telUpassswd').val();
			           $.post('/home/ajax_register/pw',{'Upassword':telUpassswd},function(msg){
			                if(msg == '2'){
			                	layer.msg('密码格式不正确(要求:6-18位)', {
							        time: 3000 //3s后自动关闭
							      	});
			                	$('#telUpassswd').val('');
			                }
			           },'HTML');
			       });
			      $('#telUpassswd2').blur(function(){
			      	   var telUpassswd = $('#telUpassswd').val();
			           var telUpassswd2 = $('#telUpassswd2').val();
			           $.post('/home/ajax_register/pw',{'Upassword2':telUpassswd2,'Upassword':telUpassswd},function(msg){
			                if(msg == '1'){
			                	layer.msg('两次密码不一致', {
							        time: 3000 //3s后自动关闭
							      	});
			                	$('#telUpassswd2').val('');
			                }
			           },'HTML');
			       });
				    
				</script>
			</div>
			<!-- 手机登录end -->

			<div class="w3-head-continue">
				<h4>已有账号? <a href="/home/login">直接登录</a></h4>		
			</div>
		</div>
		<!--//main-->
		<!--footer-->
		<div class="footer">
			<p>&copy; 2018 PHP200期,重案六组制作 | 点击返回 <a href="http://www.shareworld.com/" target="_blank">首页</a></p>
		</div>
		<!--//footer-->
	</div>
</div>
<!-- js -->
<!-- 滑动门js -->
<script type="text/javascript" language="javascript">
	//<!CDATA[
	function g(o){return document.getElementById(o);}
	function HoverLi(n){
	//如果有N个标签,就将i<=N;
	//本功能非常OK,兼容IE7,FF,IE6;http://www.xiaogezi.cn/ [小鸽子]系列
	for(var i=1;i<=2;i++){g('tb_'+i).className='normaltab';g('tbc_0'+i).className='sub-main-w3 undis';}g('tbc_0'+n).className='sub-main-w3 dis';g('tb_'+n).className='hovertab';
	}
	//如果要做成点击后再转到请将<li>中的onmouseover 改成 onclick;
	//]]>
</script>
<!-- //js -->
</body>
</html>
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
</style>
</head>
<body>
<div class="w3-agile-banner">
	<div class="center-container">
		<!--header-->
		<div class="header-w3l">
			<h1> My <span>Share</span> World 登录</h1>
		</div>
		<!--//header-->
		<!--main-->
		<div class="main-content-agile">
			<div class="wthree-pro">
				<h2>Welcome to login</h2>
			</div>
			<div class="w3-head-continue">
				<h4>一起来分享我们的世界！</h4>
			</div>
			<div class="social_icons" id="tb_">
				<ul>
					<!-- 邮箱 -->
					<li id="tb_1" class="hovertab" onclick="x:HoverLi(1);">
						<div class="slide-social w3l">
						<a href="#">
							<div class="button">邮箱登录</div>
							<div class="facebook icon"> <i class="facebook"></i> </div>
							<div class="facebook slide">
								<p>邮箱登录</p>
							</div>
							<div class="clear"></div>
							</a>
						</div>
					</li>
					<!-- 手机 -->
					<li id="tb_2" class="normaltab" onclick="i:HoverLi(2);">
						<div class="slide-social w3l">
						<a href="#">
							<div class="button">手机登录</div>
							<div class="twitter icon"> <i class="twitter"></i></div>
							<div class="twitter slide">
								<p>手机登录</p>
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
				<form action="/home/login/sublogin" method="post">
					{{csrf_field()}}
					<input placeholder="E-mail" name="Uemail" type="email" required="" id="Uemail" value="">
					<input placeholder="Password" name="password" type="password" required="" id="password">
					<p>
					<input placeholder="验证码" name="code" type="text" required="" id="code" style="width:100px;float:left;margin-top:20px;">
					<img src="/home/login/code" alt="" style="float:left;margin:20px 0px 0px 10px;" title="点击切换" onclick="rand_code(this)">
					<script type="text/javascript">
						function rand_code(obj){
							//当前路径拼接随机参数，路径更换则会自动刷新
							obj.src=obj.src + '?a='+ Math.random();
						}
					</script>
					</p>
					<div class="clear"></div>
					<div class="rem-w3">
						<span class="check-w3"><input type="checkbox" />记住密码</span>
						<a class="w3-pass" href="/home/forgetlogin/emailphone" target="_blank">忘记密码?</a>
						<div class="clear"></div>
					</div>
					
					<input type="submit" value="直接登录">
				</form>

			</div>
			<!-- 邮箱登录end -->

			<!-- 手机登录 -->
			<div class="sub-main-w3 undis" id="tbc_02">	
				<form action="/home/login/sublogin" method="post">
					{{csrf_field()}}
					<input placeholder="Phone" name="Utel" type="text" required="" id="Utel" value="">
					<input  placeholder="Password" name="telpassword" type="password" required="" id="telpassword">
					<p>
					<input placeholder="验证码" name="code2" type="text" required="" id="code2" style="width:100px;float:left;margin-top:20px;">
					<img src="/home/login/code" alt="" style="float:left;margin:20px 0px 0px 10px;" title="点击切换" onclick="rand_code2(this)">

					<script type="text/javascript">
						function rand_code2(obj){
							//当前路径拼接随机参数，路径更换则会自动刷新
							obj.src=obj.src + '?a='+ Math.random();
						}
					</script>
					</p>
					<div class="clear"></div>
					<div class="rem-w3">
						<span class="check-w3"><input type="checkbox" />记住密码</span>
						<a class="w3-pass" href="/home/forgetlogin/emailphone" target="_blank">忘记密码?</a>
						<div class="clear"></div>
					</div>
					
					<input type="submit" value="直接登录" id="sub">
				</form>

			</div>
			<!-- 手机登录end -->

			<div class="w3-head-continue">
				<h4>还没有账号? <a href="/home/register/create">点击注册</a></h4>		
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
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
	$.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
    });
       //ajax 实现登录时无刷新验证---邮箱
       $('#Uemail').blur(function(){
           var Uemail = $('#Uemail').val();
           $.post('/home/login/ajaxemail',{'Uemail':Uemail},function(msg){
                if(msg != 1){
                    layer.msg('邮箱不存在', {
							        time: 3000 //3s后自动关闭
							      	});
                }
           },'HTML');
       });
       $('#Uemail').focus(function(){
       		$('#Uemail').val('');
       });
       //ajax 实现登录时无刷新验证---手机号
       $('#Utel').blur(function(){
           var Utel = $('#Utel').val();
           $.post('/home/login/ajaxtel',{'Utel':Utel},function(msg){
                if(msg != 1){
                    layer.msg('手机号不存在', {
							        time: 3000 //3s后自动关闭
							      	});
                }
           },'HTML');
       });
       $('#Utel').focus(function(){
       		$('#Utel').val('');
       });


      //ajax实现验证---密码---邮箱
      $('#password').blur(function(){
      	   var Uemail = $('#Uemail').val();
           var password = $('#password').val();
           $.post('/home/login/ajaxpw',{'Uemail':Uemail,'Upassword':password},function(msg){
                if(msg != 1){
                    layer.msg('密码输入错误', {
							        time: 3000 //3s后自动关闭
							      	});
                }
           },'HTML');
       });
      //ajax实现验证---密码---手机
      $('#telpassword').blur(function(){
      	   var Utel = $('#Utel').val();
           var password = $('#telpassword').val();
           $.post('/home/login/ajaxtelpw',{'Utel':Utel,'Upassword2':password},function(msg){
                if(msg != 1){
                    layer.msg('密码输入错误', {
							        time: 3000 //3s后自动关闭
							      	});
                }
           },'HTML');
       });


      //ajax实现判断---验证码---邮箱
      $('#code').blur(function(){
           var code = $('#code').val();
           $.post('/home/login/ajaxcode',{'Code':code},function(msg){
                if(msg != 1){
                    layer.msg('验证码输入错误', {
							        time: 3000 //3s后自动关闭
							      	});
                }
           },'HTML');
       });
      $('#code').focus(function(){
      	$('#codeError').text('');
      });
      //ajax实现判断---验证码---手机
      $('#code2').blur(function(){
           var code = $('#code2').val();
           $.post('/home/login/ajaxcode2',{'Code':code},function(msg){
                if(msg != 1){
                    layer.msg('验证码输入错误', {
							        time: 3000 //3s后自动关闭
							      	});
                }
           },'HTML');
       });
      $('#code2').focus(function(){
      	$('#code2Error').text('');
      });
      //cookie实现记住账号
</script>
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
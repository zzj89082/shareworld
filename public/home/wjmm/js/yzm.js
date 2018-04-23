//忘记密码 文档加载
$(function(){
	//验证码路径更换
	$('#imgmake').click(function(){
		$(this).attr('src',$(this).attr('src')+'?'+Math.random());
	});

	//验证用户名及验证码
	$('input[value=立即验证]').click(function(){
		var username = $('input:eq(0)').val(); //接收用户名
		var yzm = $('input:eq(1)').val();  //接收验证码
		var token = $('input:eq(2)').val();  //接收token
		//验证用户名是否为空
		if(username == '用户名') {
			return layer.msg("用户名不能为空", {icon: 5,anim: 6,time: 1000});
		}
		//验证邮箱是否为空
		if(yzm == '验证码') {
			return layer.msg("验证码不能为空", {icon: 5,anim: 6,time: 1000});
		}
		//发送ajax
		$.post('/home/forgetlogin/yanzheng',{'username':username,'yzm':yzm,'_token':token},function(msg){
			if(msg == 0) {
				layer.msg("验证码或用户名不正确", {icon: 5,anim: 6,time: 1000});
			} else {
				location.href = '/home/forgetlogin/zhfs';
			}
		},'html');

	});
});
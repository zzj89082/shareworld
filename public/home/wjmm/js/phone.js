//文档加载
$(function(){
	//给button绑定事件
	$('button').click(function(){
		var phone = $('input[name=phone]').val();  //手机号
		var token = $('input[name=_token]').val(); //token值
		//判断是否为空
		if(phone == '') {
			return layer.msg("手机号不能为空", {icon: 5,anim: 6,time: 1000});
		}
		//验证手机号是否合格
		var pagephone = /^1[3|4|5|7|8|]{1}\d{9}$/;

		if(!pagephone.test(phone)) {
			return layer.msg("手机号不合法", {icon: 5,anim: 6,time: 1000});
		} else {
			//发送ajax
			$.post('/home/forgetlogin/phone',{'phone':phone,'_token':token},function(msg){
				//判断手机号是否一致
				if(msg == 0) {
					return layer.msg("手机号不存在", {icon: 5,anim: 6,time: 1000});
				} 
				if(msg == 2) {
					return layer.msg("密码不能多次修改", {icon: 5,anim: 6,time: 1000});
				}
				//判断是否发送成功
				if(msg.code == 2) {
					layer.msg('验证码已发到您的手机',{time:1000});
					// setIntervel(function(){},1000);
				} else {
					return layer.msg("发送验证码失败", {icon: 5,anim: 6,time: 1000});
				}
			},'json');
		}
	});

	//验证数据
	$('input[value=提交]').click(function(){
		var phone = $('input[name=phone]').val();  //手机号
		var token = $('input[name=_token]').val(); //token值
		var pass = $('input[name=pass]').val(); //获取密码
		var repass = $('input[name=repass]').val(); //获取确认密码
		var phoneyzm = $('input[name=phoneyzm]').val(); //验证码
		var pagepass = /^\w[0-9a-zA-Z_!?.,@&*]{5,17}$/; //正则验证密码
		//判断是否为空
		if(pass !== '' && phone !== '' && repass !== '' && phoneyzm !== '') {
			//判断密码是否合格
			if(pagepass.test(pass)) {

				//判断密码和确认密码是否一致
				if(repass == pass) {
				//发送ajax
					$.post('/home/forgetlogin/passphone',{'_token':token,'phone':phone,'pass':pass,'phoneyzm':phoneyzm},function(msg){
						if(msg == 0){
							return layer.msg("验证码不一致", {icon: 5,anim: 6,time: 1000});
						} else if(msg == 1) {
							return location.href = '/home/forgetlogin/cg';
						} else {
							return layer.msg("修改密码失败", {icon: 5,anim: 6,time: 1000});
						}
					},'html');
				} else {
					return layer.msg("密码不一致", {icon: 5,anim: 6,time: 1000});
				}
			} else {
				return layer.msg("密码不合格", {icon: 5,anim: 6,time: 1000});
			}
		} else {
			return layer.msg("内容不能为空", {icon: 5,anim: 6,time: 1000});
		}
	});
});
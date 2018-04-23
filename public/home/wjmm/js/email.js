//文档加载
$(function(){
	$('input[value=提交]').click(function(){
		//获取邮箱
		var email = $('input[name=email]').val();
		var token = $('input[name=_token]').val();
		//邮箱正则
		var emailpage = /^[0-9a-zA-Z]+@(qq|163|126|sina|139|lampbrother|baidu)\.(com|cn|net)$/;
		//判断邮箱是否合法
		if(!emailpage.test(email)) {
			return layer.msg("邮箱不合法", {icon: 5,anim: 6,time: 1000});
		} else {
			//发送ajax
			$.post('/home/forgetlogin/email',{'email':email,'_token':token},function(msg){

				if(msg == 0) {
					return layer.msg("邮箱不存在", {icon: 5,anim: 6,time: 1000});
				} else if(msg == 1) {
					location.href = '/home/forgetlogin/cg';
				} else {
					return layer.msg("邮箱发送失败", {icon: 5,anim: 6,time: 1000});	
				}
			},'html');
		}
	});
});
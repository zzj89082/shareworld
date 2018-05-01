$(function(){
	$('input[data=textcomment]').click(function(){
		//获取元素
		var comment = $('textarea[name=text]').val(); //评论内容
		var Eid = $('input[name=releaseeid]').val(); //EID
		var token = $('input[name=_token]').val(); //token值
		//判断是否为空
		if(comment == '' || comment == '请输入你要评论的内容') {
			return layer.msg("内容不能为空", {icon: 5,anim: 6,time: 1000});
		}
		//发送ajax
		$.post('/home/comment',{'_token':token,'Eid':Eid,'comment':comment},function(msg){
			if(msg !== 0) {
				//克隆节点		
				var response = $('.response').first().clone(true);
				$('.response:last').after(response);
				$('.response:last > .media-left > a > .media-object').attr('src',msg.Uimg); //头像
				$('.response:last > .media-body > ul > li:first > a').text(msg.Homebualais); //用户名
				$('.response:last > .media-body > p').text(msg.Dcontent); //发布内容
				$('.response:last > .media-body > ul > li:eq(1)').text(msg.created_at); //发布时间
				$('.response:last > .media-body > ul > li:eq(2) > .huifu').attr('data',msg.Discuss_type); //标识
				$('.response:last > .media-body > ul > li:eq(2) > .huifu').attr('wocao1',msg.Did); //标识
				$('.response:last').css('display','block');  //块级元素
				alert('评论成功');
  
			} else {
				return layer.msg("评论失败", {icon: 5,anim: 6,time: 1000});
			}
		},'json');
	});

	//回复
	var username,Discuss_type,Homebualais,Discuss_type;
	$('.response > .media-body > ul > li > .huifu').click(function(){
		//先让所有的隐藏
		$('.response > .media-body > ul > li > .huifu').parent().parent().next().css('display','none');
		username = $(this).parent().prev().prev().find('a').text(); //获取用户名
		Discuss_type = $(this).attr('data'); //获取标识
		Homebualais = $(this).parent().parent().next().find('input[value=评论]').attr('wocao');
		Homebualais2 = $(this).parent().parent().next().find('input[name=huifu]').attr('wocao');
		Discuss_type2  = $(this).attr('wocao1'); //获取标识2
		//获取父级元素
		Discuss_type_data =  $(this).parent().parent().parent().parent().parent().find('.media-body > ul > li:first > a').text();
		console.log(Discuss_type_data);
		console.log(Homebualais);
		//判断是否是一维
		if(Discuss_type_data == '') {
			$(this).parent().parent().next().find('input[name=huifu]').val('回复@'+username+':'); 
			$(this).parent().parent().next().css('display','block');
		}
		if(Homebualais == undefined) {
			$(this).parent().parent().next().find('input[name=huifu]').val('回复@'+username+':'); 
			$(this).parent().parent().next().css('display','block');
		}
		if(Homebualais == Discuss_type_data ) {
			$(this).parent().parent().next().find('input[name=huifu]').val('回复@'+username+':'); 
			$(this).parent().parent().next().css('display','block');
		}
		
	});

	//提交回复
	$('.response > .media-body > .tijiao > input[value=评论]').click(function(){
		//获取被评论的用户名
		var tijiao_content = $(this).prev().val();
		var token = $('input[name=_token]').val(); //token值
		var Eid = $('input[name=releaseeid]').val(); //EID
		//判断是否为空
		if(tijiao_content == '回复@'+username+':') {
			return layer.msg("内容不能为空", {icon: 5,anim: 6,time: 1000});
		}
		if(tijiao_content == '') {
			return layer.msg("内容不能为空", {icon: 5,anim: 6,time: 1000});
		}
		if(tijiao_content  == '回复@'+username) {
			return layer.msg("内容不合法", {icon: 5,anim: 6,time: 1000});
		}
		if(tijiao_content  == '回复@') {
			return layer.msg("内容不合法", {icon: 5,anim: 6,time: 1000});
		}
		if(username == Homebualais || username == Homebualais2) {
			return layer.msg("不能评论本人", {icon: 5,anim: 6,time: 1000});	
		}
	
		var huifu_this = $(this).parent().parent().parent();  //获取当前父节点
		var dangqian = $(this).parent(); //获取父节点
		//发送ajax
		$.post('/home/comment',{'_token':token,'Discuss_type':Discuss_type,'Discuss_type2':Discuss_type2,'tijiao_content':tijiao_content,'username':username,'Eid':Eid},function(msg){
			if(msg !== 0) {
				dangqian.css('display','none'); //将回复框隐藏
				// window.location.reload();
				//克隆节点
				var huifu_pinglun = huifu_this.clone(true);
				huifu_pinglun.find('.response').remove();
				huifu_pinglun.css('margin-left',50+'px');
				huifu_this.after(huifu_pinglun);//插入节点
				huifu_pinglun.find('.media-left > a > .media-object').attr('src',msg.Uimg); //头像
				huifu_pinglun.find('.media-body > ul > li:first > a').text(msg.Homebualais); //用户				
				huifu_pinglun.find('.media-body > p').text(msg.Homebualais+msg.Dcontent); //发布内容
				huifu_pinglun.find('.media-body > ul > li:eq(1)').text(msg.created_at); //发布时间
				huifu_pinglun.find('.media-body > ul > li:eq(2) > .huifu').attr('wocao1',msg.Discuss_type2); //Did
				alert('评论成功'); 
			} else {
				return layer.msg("评论失败", {icon: 5,anim: 6,time: 1000});
			}
		},'json');
	});
});
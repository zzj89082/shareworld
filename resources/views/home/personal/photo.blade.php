@extends('home/layout/headerPersonal')
@section('content')
<!-- 滑动特效 -->
			<style type="text/css">
				.single-middle ul li{padding:15px 10px;}
				.single-middle ul li:hover{cursor: pointer;}
				.hovertab{background:#ADADAD;}
				.dis{display:block;}
				.undis{display:none;}
				.response a:hover{color:#2E4355;letter-spacing: 0.5px;}
			</style>
		   <!-- 信息导航 -->
			  <div class="single-bottom" >
					<div class="single-middle">
						<ul class="social-share">
							<li id="tb_1" class="normaltab" onclick="x:HoverLi(1);">个人相册</li>
							<li id="tb_2" class="normaltab" onclick="i:HoverLi(2);">微博配图</li>						
						</ul>
						<i class="arrow"> </i>
						<div class="clearfix"> </div>
				   </div>
		      </div>
		    <!-- 信息导航end -->
			<div class="response">
				<!-- 发布 -->
				<div class="media response-info undis" id="tbc_01" style="min-height: 800px;min-width: 1000px;">
					<div class="gallery-section" >
						<input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">
						<input type="hidden" name="Uid" id="Uid" value="{{ $photo['Uid'] }}">
			        	<button type="button" class="layui-btn" id="Photo">
						  <i class="layui-icon">&#xe67c;</i>上传照片
						</button>
				        <div class="categorie-grids cs-style-1 ">
								<div class="grid gallery" style="width:1000px;">
									<figure>
				     				@foreach ($zhaopian as $v)
				     				<form id="form" action="/photo/pdelete/{{$v->Pid}}" method="post">
										<div style="float:left;width:300px;height:170px;margin:20px 15px" ><a href="{{$v->Photo}}"><img class="img" style="display:block;height:100%;width:100%" src="{{$v->Photo}}" /></a>{{ csrf_field() }}<button  class="layui-btn layui-icon layui-btn-xs layui-btn-danger" href="" style="float:right;margin-bottom:10px;">&#xe640;</button></div>
									</form>
									@endforeach

									</figure>
								</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<!-- 发布end -->
				<!-- 热门 -->
				<div class="media response-info undis" id="tbc_02" style="min-height: 800px;min-width: 1000px;">
					<div class="gallery-section" >	
				        <div class="categorie-grids cs-style-1 ">
							<div class="grid gallery" style="width:1000px;">
								<figure>
			     				@foreach ($pic as $v)
			     				<form action="/photo/cdelete/{{$v->Cid}}" method="post">
									<div style="float:left;width:300px;height:170px;margin:20px 15px" ><a href="{{$v->Cpicture}}"><img class="img" style="display:block;height:100%;width:100%" src="{{$v->Cpicture}}" /></a>{{ csrf_field() }}<button  class="layui-btn layui-icon layui-btn-xs layui-btn-danger" href="" style="float:right;margin-bottom:10px;">&#xe640;</button></div>
								</form>
								@endforeach

								</figure>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<!-- 热门end -->
				<script type="text/javascript">
					$(function(){
						$('.img').click(function(){
							
						});

					});
				</script>
				
			</div>
			<!-- 滑动门js -->
			<script type="text/javascript" language="javascript">
				//<!CDATA[
				function g(o){return document.getElementById(o);}
				function HoverLi(n){
				//如果有N个标签,就将i<=N;
				for(var i=1;i<=2;i++){
						g('tb_'+i).className='normaltab';
						g('tbc_0'+i).className='media response-info undis';
					}
						g('tbc_0'+n).className='media response-info dis';
						g('tb_'+n).className='hovertab';
				}
				//如果要做成点击后再转到请将<li>中的onmouseover 改成 onclick;
				//刷新不影响选项卡位置
			    $(".single-middle ul li").click(function(){  
			        var picTabNum = $(this).index();  
			        // console.log("当前图片标题下标是："+picTabNum);  
			        sessionStorage.setItem("picTabNum",picTabNum);  
			    });  
			      $(function(){  
			        var getPicTabNum = sessionStorage.getItem("picTabNum");  
			        $(".single-middle ul li").eq(getPicTabNum).addClass("hovertab").siblings().removeClass("normaltab");
			        $(".response>div").eq(getPicTabNum).removeClass("undis");
			    })  
			</script>

	<script src="/home/js/zoom.js"></script>
	<script>
		layui.use('upload', function(){
		  var upload = layui.upload;
		  var token = $('#_token').val();
		  var Uid = $('#Uid').val();
		  //执行实例
		  
		  var uploadInst = upload.render({
		    elem: '#Photo' //绑定元素
		    ,url: '/photo' //上传接口
			,method:"post"
			,multiple:true
			,data:{'_token':token,'Uid':Uid}
			,field:'photo'
		    ,done: function(res){
		      if(res.code == 0){
		      	layer.msg(res.msg);
		      	$('#form').prepend('<form id="form" action="/photo/pdelete/{{$v->Pid}}" method="post"><div style="float:left;width:300px;height:170px;margin:20px 15px" ><a href="{{$v->Photo}}"><img class="img" style="display:block;height:100%;width:100%" src="'+res.data.src+'" /></a>{{ csrf_field() }}<button  class="layui-btn layui-icon layui-btn-xs layui-btn-danger" href="" style="float:right;margin-bottom:10px;">&#xe640;</button></div></form>');
		      }
		    }
		    ,error: function(){
		      if(res.code == 1){
		      	layer.msg(res.msg);
		      }
		    }
		  });
		});
	</script>
@endsection
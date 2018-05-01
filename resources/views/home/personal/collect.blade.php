@extends('home/layout/headerPersonal')
@section('content')

<!-- 内容区域 -->
<div class="banner-section">
   <h3 class="tittle">{{ $title }} <i class="glyphicon glyphicon-star"></i></h3>
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
		    <div class="single-bottom">
				<div class="single-middle">
					<ul class="social-share">
						<li id="tb_1" class="normaltab" onclick="x:HoverLi(1);">收藏官方</li>
						<li id="tb_2" class="normaltab" onclick="i:HoverLi(2);">收藏用户</li>			
					</ul>
					<i class="arrow"> </i>
					<div class="clearfix"> </div>
			   </div>
	        </div>
		    <!-- 信息导航end -->
			<!-- 信息遍历 -->
			<div class="response">
				<!-- 发布 -->
				<div class="media response-info undis" id="tbc_01">
					<div class="top-news">
						<div class="top-inner">
							@foreach($collect as $k => $v)
							<div class="col-md-12 top-text" style="margin: 15px 0;">
								 <div class="col-md-3 item-pic">
								 <a href="/home/show/{{ $v->Cid }}"><img src="{{ $v->Cpicture }}" class="img-responsive" alt=""></a>
								 </div>
								 <div class="col-md-9 item-details">
								    <h4 class="top"><a href="/home/show/{{ $v->Cid }}">{{ $v->Ctitle }}</a></h4>
									<p>{{mb_substr($v->Ccontent,0,80).'...'}}</p>
									<div><img src="{{$v->content_user->Uimage}}" style="width:30px;height:30px;border-radius: 50%"> {{$v->content_user->Ualais}}</div>
									<div>
								    	<p>{{ $v->created_at }}<a class="span_link" href="/home/show/{{ $v->Cid }}"><span class="glyphicon glyphicon-comment"></span>{{ $v->Ccomment or 0 }}</a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
								    </div>
								 </div>
							 </div>
							@endforeach
							 <div class="clearfix"> </div>
						 </div>
					 </div>
				</div>
				<div class="media response-info undis" id="tbc_02">
					@foreach($releasecollect as $k => $v)
					<div class="media-left response-text-left" style="margin:10px 0px;">
						<a href="/release/releaseshow/{{$v['Eid']}}">
							<img class="media-object" src="{{$v->Uimage}}" alt="" style="width:120px;height:100px;"/>
						</a>

					</div>
					<div class="media-body response-text-right" style="margin:10px 0px;border-bottom:1px dashed #AAE0E0">
						<p><span style="color:#EB7350">{{$v->Ualais}}</span> : <span class="result">{!!mb_substr($v->Earticle,0,66).'..'!!}</span></p>
						<p>
							@if($v->Eimg != null)
							@foreach($v->Eimg as $key => $value)
							<img src="{{$value}}" alt="" style="width:100px;height:50px;" class="Rimg">
							@endforeach
							@endif
							@if($v->Evideo != null)
							<video width="320" height="400" controls="controls" style="background-color:rgba(0,0,0,0.8)">
								  <source src="{{ $v->Evideo }}" type="video/mp4" />
								  <source src="{{ $v->Evideo }}" type="video/ogg" />
								  <source src="{{ $v->Evideo }}" type="video/webm" />
								  <object data="{{ $v->Evideo }}" width="100%" height="100%">
								    	<embed src="{{ $v->Evideo }}" width="100%" height="100%" />
								  </object>
							</video>
							@endif
						</p>
						<div class="td-post-date two" style="margin-bottom:5px;position: relative;">
							<i class="glyphicon glyphicon-time"></i>{{strtok($v['created_at'],' ')}} 
							<a href="/release/releaseshow/{{$v['Eid']}}">
								<i class="glyphicon glyphicon-comment"></i>{{$v['count']}} 
							</a>
						</div>
					</div>
					<div class="clearfix"> </div>
					
					<!-- 分页 -->
					@endforeach
				</div>
				
				<!-- 表情解析 -->
				<script type="text/javascript">
					$('.result').parseEmotion();
				</script>
				<!-- 点击图片放大 -->
				<script>
			        $('.Rimg').click(function(){
				            layer.open({    
						      type: 1,
							  title: false,
							  closeBtn: 0,
							  btn: '关闭',
							  area: ['700px', '450px'],
							  skin: 'layui-layer-nobg', //没有背景色
							  shadeClose: false,
							  content: $(this).css('width','100%').css('height','100%'),
							  success: function(layero){
						          var btn = layero.find('.layui-layer-btn');
						          btn.click(function(){
						          	$('.Rimg').css('width','100px').css('height','50px')
						          })
						        } 
						    });

			        }); 
			    </script>
				</div>
				<script type="text/javascript">
					$('.dianzan').click(function(){
						var a = $(this).find('span').text();

						var sum = parseInt(a) + 1;
						var jian = parseInt(a) - 1;						

						var Eid = $(this).attr('name');//点赞的文章
						var Uid = $(this).attr('value');//点赞的用户
						var alt = $(this).attr('alt');//表示符

						if(alt == 0){
							count = $(this).find('span').text(sum);
							$.get('/follow/dianzan',{'Eid':Eid,'Uid':Uid},function(msg){
								if(msg == 1){
									layer.msg('点赞成功', {
								        	time: 2000, //20s后自动关闭
								     });
									$('.dianzan[name='+Eid+']').attr('alt',1);
								}
							},'HTML');
						}else{
							$(this).find('span').text(jian);
							$.get('/follow/dianzan2',{'Eid':Eid,'Uid':Uid},function(msg){
								if(msg == 1){
									layer.msg('取消成功', {
								        	time: 2000, //20s后自动关闭
								     });
									$('.dianzan[name='+Eid+']').attr('alt',0);
								}
							},'HTML');
						}
					})
				</script>	
				<!-- 表情解析 -->
				<script type="text/javascript">
					$('.result').parseEmotion();
				</script>
				<!-- 点击图片放大 -->
				<script>
			        $('.Rimg').click(function(){
				            layer.open({    
						      type: 1,
							  title: false,
							  closeBtn: 0,
							  btn: '关闭',
							  area: ['700px', '450px'],
							  skin: 'layui-layer-nobg', //没有背景色
							  shadeClose: false,
							  content: $(this).css('width','100%').css('height','100%'),
							  success: function(layero){
						          var btn = layero.find('.layui-layer-btn');
						          btn.click(function(){
						          	$('.Rimg').css('width','100px').css('height','50px')
						          })
						        } 
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
			<!-- 滑动门js --> 	


	<div class="banner-right-text">
	 <h3 class="tittle">{{ $guanggao }}  <i class="glyphicon glyphicon-floppy-disk"></i></h3>
	<!--/general-news-->
	 <div class="general-news">
		<div class="general-inner">
			@foreach ($poster as $v)
			<div class="general-text">
				<a href="{{$v->POurl}}"><img src="{{ $v->POpic }}" class="img-responsive" alt=""></a>
				<h4 class="top"><a href="single.html">{{ $v->POauthor }}</a></h4>
			</div>
			 @endforeach
		 </div>
	</div>	

</div>











     </div>

	<div class="clearfix"> </div>
<!-- 内容区域结束 -->
@endsection
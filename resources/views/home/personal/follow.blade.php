@extends('home/layout/headerPersonal')
@section('content')
		<!--banner-section-->
		<div class="banner-section">
		   
			<!-- 信息遍历 -->
			<div class="response">
				<!-- 发布 -->
				<div class="media response-info undis" id="tbc_01">
					@if(count($Uattention_data)<=0)
					<img src="/uploads/none.jpg" alt="">
					@endif
					@foreach($Uattention_data as $k => $v)
					<div class="media-body" style="margin:10px 0px;border-bottom:1px dashed #AAE0E0">
						<table width="100%">
							<tr>
								<td style="padding-bottom:5px;">
									<img class="media-object" src="{{$v->Uimage}}" alt="暂无头像" title="点击查看" style="width:60px;height:60px;border-radius:50%;border:3px solid #ccc;" onclick="location.href='/user/show/{{$v->Uid}}'"/>
								</td>
								<td style="padding:5px;text-indent:1em">
									<span style="color:#EB7350" style="">{{$v->Ualais}}</span> : <span class="result">{!!mb_substr($v->Uinfo,0,56).'..'!!}</span>
								</td>
								<td>
									<h3 style="float:right">
										<!-- 除了自己都可以关注 -->
										@if($user['Uid'] != $v->Uid)
											@if(strstr($user['Uattention'],(string)$v->Uid))
												<button class="layui-btn layui-btn-warm guanzhu" style="margin-left:0.5em" name="{{$v->Uid}}" value="{{$user['Uid']}}" alt="1">@ 取消关注</button>
											@else
												<button class="layui-btn guanzhu" style="margin-left:0.5em" name="{{$v->Uid}}" value="{{$user['Uid']}}" alt="0">@ 点击关注</button>
											@endif
										@endif
									</h3>
								</td>
							</tr>
						</table>
					</div>
					<div class="clearfix"> </div>
					
					<!-- 分页 -->
					@endforeach
				</div>
			    <!-- 无刷新关注 -->
			    <script type="text/javascript">
					$('.guanzhu').click(function(){
						var uid = $(this).attr('name');//要关注的用户
						var user = $(this).attr('value');//当前登陆的用户
						var alt = $(this).attr('alt');//表示符

						if(alt==0){
					      	$.get('/follow/ajax',{'Uid':uid,'user':user},function(msg){
					      		if(msg == 1){
					      			layer.msg('关注成功', {
							        	time: 2000, //20s后自动关闭
							      	});
							      	$('.guanzhu[name='+uid+']').text('@ 取消关注');
							      	$('.guanzhu[name='+uid+']').attr('alt',1);
							      	$('.guanzhu[name='+uid+']').attr('class','layui-btn layui-btn-warm guanzhu');
					      		}
					      		
					      	},'HTML');
						}else{
							$.get('/follow/ajax2',{'Uid':uid,'user':user},function(msg){
					      		if(msg == 1){
					      			layer.msg('取消成功', {
							        	time: 2000, //20s后自动关闭
							      	});
							      	$('.guanzhu[name='+uid+']').text('@ 点击关注');
							      	$('.guanzhu[name='+uid+']').attr('alt',0);
							      	$('.guanzhu[name='+uid+']').attr('class','layui-btn guanzhu');
					      		}
					      		
					      	},'HTML');
						}
					});
				</script>

				<!-- 发布end -->
				
			</div>	
			<!-- 信息遍历end	 -->
		</div>
			<!--//banner-section-->
			<div class="banner-right-text">
				 <h3 class="tittle">我的微博  <i class="glyphicon glyphicon-user"></i></h3>
				<!--/general-news-->
				<div class="general-news">
					<div class="general-inner">
						<div class="general-text" style="text-align:center">
							<!-- 412*260 -->
							    <span class="image avatar"><img src="{{$user['Uimage']}}" alt="还没有上传头像" style="width:100px;height:90px;border-radius: 100%;"/></span>
								<h3 id="logo"><a href="#">{{$user['Ualais']}}	</a></h3>
								<p>
								<a href="/follow/index">@ 关 注 人 <span style="color:#EEB438">{{$user['UattentionCount']}}</span></a>
								　|　<a href=""><i class="glyphicon glyphicon-envelope"></i> 私 信</a>
								　|　<a href="/follow/bean"><i class="glyphicon glyphicon-thumbs-up"></i> 粉 丝 <span style="color:#EEB438">{{$user['UbeanCount']}}</span></a>
								</p>
						 </div>
						 <!-- 最新资讯 -->
						 <div class="edit-pics">
						 		@foreach($content_data as $k => $v)	
							      <div class="editor-pics">
									<div class="col-md-3 item-pic">
								    	<img src="{{ $v['Cpicture'] }}" class="img-responsive" alt="" style="width:100px;height:90px;">
								    </div>
									<div class="col-md-9 item-details">
										<h5 class="inner two"><a href="/home/show/{{$v['Cid']}}">{{mb_substr($v['Ccontent'],0,28).'..'}}</a></h5>
										 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>{{strtok($v['created_at'],' ')}} <a href="/home/show/{{$v['Cid']}}"><i class="glyphicon glyphicon-comment"></i>{{$v['count']}} </a></div>
									</div>
									<div class="clearfix"></div>
								</div>
								@endforeach
						 </div>
						 <!-- 最新资讯end -->
						 <!-- 最新视频 -->
						 <div class="media">	
							 <h3 class="tittle media">Media <i class="glyphicon glyphicon-facetime-video"></i></h3>
							  <div class="general-text two">
								 <video width="350" height="20%" controls="controls">
									  <source src="{{ $video['Evideo'] }}" type="video/mp4" />
									  <source src="{{ $video['Evideo'] }}" type="video/ogg" />
									  <source src="{{ $video['Evideo'] }}" type="video/webm" />
									  <object data="{{ $video['Evideo'] }}" width="100%" height="100%">
									    	<embed src="{{ $video['Evideo'] }}" width="100%" height="100%" />
									  </object>
								</video>
							  </div>
				         </div>
				         <!-- 最新视频end -->
				         <!-- 最新的商业广告 -->
					    <div class="general-text two">
						    <a href="{{$poster['POurl']}}" target="_blank"><img src="{{$poster['POpic']}}" class="img-responsive" alt=""></a>
							<p>{{$poster['POmiaoshu']}}</p>
					    </div>
					    <!-- 最新的商业广告end -->
					 </div>
				</div>	
				<!--//general-news-->
				<!--/news-->
				<!--/news-->
		 	</div>
			<div class="clearfix"> </div>
			
@endsection
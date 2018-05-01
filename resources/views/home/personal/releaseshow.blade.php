@extends('home/layout/headerPersonal')
@section('content')

<!-- 内容区域 -->
<!-- contact -->
	 <div class="contact">
	 	<!-- 信息详情 -->
		
		@if($content_show->Evideo != null)
			<div class="contact" style="margin:0;padding:0;background:url('/home/images/post_card_4.jpg') center 30%;text-align:center;">
		@endif
		@if($content_show['Eimg'] != null)
			<div class="contact" style="margin:0;padding:0;text-align:center;">
		@endif
		@if($content_show['Eimg'] == null &&$content_show->Evideo == null)
			<div class="contact" style="margin:0;padding:0;text-align:center;">
		@endif
				<p style="background-color:#FAFAFA;border:1px solid #ccc;border-bottom:none;padding:0px 0px 5px 5px;text-align:left;">
					<img src="{{$content_show->Uimage[0]}}" alt="" style="width:50px;height:50px;border-radius:50%;">
					<span style="color:#EB7350;">{{$content_show->Ualais}}</span> : 
					<span class="result" style="line-height:70px;">{!!$content_show->Earticle!!}</span>
					<span style="float:right;padding-top:20px;">
					@if(empty(session('home_login')))
						<a class="span_link" id="collect" style="float:right;margin-right:10px;color:#777;cursor:pointer;"><span class="glyphicon glyphicon-star">收藏</span></a>
					@else
						@if($collect == null)
							<a class="span_link" id="collect" style="float:right;margin-right:10px;color:#777;cursor:pointer;"><span class="glyphicon glyphicon-star">收藏</span></a>
						@else
							<a class="span_link" id="collect" style="float:right;margin-right:10px;color:#777;cursor:pointer;"><span class="glyphicon glyphicon-star" style="color:rgb(255, 165, 0)">收藏</span></a>
						@endif
					@endif
					<input type="hidden" id="eid" name="eid" value="{{$content_show['Eid']}}">
					</span>
				</p>
				<!-- 表情解析 -->
				<script type="text/javascript">
					$('.result').parseEmotion();
				</script>
				<br>
				<p class="phn-bottom">
					@if($content_show['Eimg'] != null)
					@foreach($content_show['Eimg'] as $key => $value)
						<img src="{{$value}}" alt="" style="width:525px;height:325px;margin:0px 0px 5px 0px;" class="Rimg">
					@endforeach
					@endif
					@if($content_show->Evideo != null)
					<video width="280" height="420" controls="controls" style="background-color:rgba(0,0,0,0.8);">
						  <source src="{{ $content_show->Evideo }}" type="video/mp4" />
						  <source src="{{ $content_show->Evideo }}" type="video/ogg" />
						  <source src="{{ $content_show->Evideo }}" type="video/webm" />
						  <object data="{{ $content_show->Evideo }}" width="100%" height="100%">
						    	<embed src="{{ $content_show->Evideo }}" width="100%" height="100%" />
						  </object>
					</video>
					@endif
					@if(empty(session('home_login')))
						<input type="hidden" id="session" name="session" value="0">
					@else
						<input type="hidden" id="session" name="session" value="{{session('home_login')}}">
					@endif
					
				</p>
			
			</div>

		<div class="clearfix"> </div>
		<!-- 信息详情end -->
		<!-- 留言 -->
		<div class="banner-section" style="padding-top:0px;">
		   <!-- 文本框 -->
		     <div class="coment-form">
				<h4>评论</h4>
				<form>
					<textarea onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '请输入你要评论的内容';}" name="text"></textarea>
					<input type="hidden" name="releaseeid" value="{{ $data_find->Eid }}">
					{{ csrf_field() }}
				</form>
				<input type="submit" data="textcomment" value="发送评论"><!--点击事件-->
			</div>	
			 <div class="clearfix"></div>
		   <!-- 文本框结束 -->
			  <div class="single-bottom">
					<div class="single-middle">
						<ul class="social-share">
							<li><span>相关评论</span></li>			
						</ul>
						<a href="#"><i class="arrow"> </i></a>
						<div class="clearfix"> </div>
				   </div>

			  </div>
			<h3 style="margin-bottom:15px; ">评论内容</h3>
			@if(!empty($data_get[0]))
			<!--循环遍历内容评论-->
			@foreach ($data_get as $k=>$v)
			<div class="response" style="margin-bottom: 20px;">
						<!-- 头像部分 -->
						<div class="media-left response-text-left">
							<a href="#">
								<img style="width:80px;height: 80px;" class="media-object" src="{{ $v->Uimage }}" alt=""/>
							</a>
							
						</div>
						<!-- 头像部分结束 -->

						<div class="media-body response-text-right">
							<p>{{ $v->Dcontent }}</p>
							<ul>
								用户名：<li style="margin-left: -25px;margin-right: 10px;"><a href="#">{{ $v->Homebualais }}</a></li>
								<li>{{ $v->created_at }}</li>
								<li><a href="javascript:;" data="{{ $v->Discuss_type }}" wocao1="{{ $v->Did }}" class="huifu">回复</a></li>
							</ul>
							<div class="tijiao" style="margin-top: 5px;display: none;">
								<input style="width: 270px;height: 27px;" wocao="{{ $user->Ualais }}" type="text" name="huifu">
								<input type="submit" value="评论"  style="border:none; width: 40px;height: 27px;background: orange;">
							</div>
						</div>
			



						<!--第一个内容部分结束-->
						<div class="clearfix"> </div>
						@if(isset($v->yi))
						<!--循环遍历评论者评论评论者-->
				@foreach ($v->yi as $key => $value)
					
					<div class="response" style="margin-left: 50px;margin-bottom: 20px;">
						<!-- 头像部分 -->
						<div class="media-left response-text-left">
							<a href="#">
								<img style="width:80px;height: 80px;" class="media-object" src="{{ $value->Uimage }}" alt=""/>
							</a>
							
						</div>
						<!-- 头像部分结束 -->

						<div class="media-body response-text-right">
							<p>{{ $value->Homebualais }}{{ $value->Dcontent }}</p>
							<ul>
								用户名：<li style="margin-left: -25px;margin-right: 10px;"><a href="#">{{ $value->Homebualais }}</a></li>
								<li>{{ $value->created_at }}</li>
								<li><a href="javascript:;" data="{{ $value->Discuss_type }}" wocao1="{{ $value->Did }}" class="huifu">回复</a></li>
							</ul>
							<div class="tijiao" style="margin-top: 5px;display: none;">
								<input style="width: 270px;height: 27px;" type="text" name="huifu">
								<input type="submit" value="评论" wocao="{{ $user->Ualais }}"  style="border:none; width: 40px;height: 27px;background: orange;">
							</div>
						</div>
						<!--第一个内容部分结束-->
						<div class="clearfix"> </div>
					<!-- </div> -->
					<!--整体结束-->
					@if(!empty($value->yi2))
				@foreach ($value->yi2 as $key1 => $value1)
					
					<div class="response" style="margin-bottom: 20px;">
						<!-- 头像部分 -->
						<div class="media-left response-text-left">
							<a href="#">
								<img style="width:80px;height: 80px;" class="media-object" src="{{ $value1->Uimage }}" alt=""/>
							</a>
							
						</div>
						<!-- 头像部分结束 -->

						<div class="media-body response-text-right">
							<p>{{ $value1->Homebualais }}{{ $value1->Dcontent }}</p>
							<ul>
								用户名：<li style="margin-left: -25px;margin-right: 10px;"><a href="#">{{ $value1->Homebualais }}</a></li>
								<li>{{ $value1->created_at }}</li>
								<li><a href="javascript:;" data="{{ $value1->Discuss_type }}" wocao1="{{ $value->Did }}"  class="huifu">回复</a></li>
							</ul>
							<div class="tijiao" style="margin-top: 5px;display: none;">
								<input style="width: 270px;height: 27px;" type="text" name="huifu">
								<input type="submit" value="评论" wocao="{{ $user->Ualais }}" style="border:none; width: 40px;height: 27px;background: orange;">
							</div>
						</div>
						<!--第一个内容部分结束-->
						<div class="clearfix"> </div>
					<!-- </div> -->
					<!--整体结束-->
				</div>
				@endforeach
				@endif
				</div>
				@endforeach
				@endif

				
					<!-- </div> -->
					<!--整体结束-->
				</div>	

					@endforeach
				<!--循环遍历内容评论结束-->


				
				

				@else
				<div class="response" style="margin-bottom: 20px;display: none;">

						<!-- 头像部分 -->
						<div class="media-left response-text-left">
							<a href="#">
								<img style="width:80px;height: 80px;" class="media-object" src="" alt=""/>
							</a>
							
						</div>
						<!-- 头像部分结束 -->

						<div class="media-body response-text-right">
							<p></p>
							<ul>
								用户名：<li style="margin-left: -25px;margin-right: 10px;"><a href="#"></a></li>
								<li></li>
								<li><a class="huifu" href="javascript:;">回复</a></li>
							</ul>
							<div class="tijiao" style="margin-top: 5px;display: none;">
								<input style="width: 270px;height: 27px;" type="text" name="huifu">
								<input type="submit" value="评论" wocao="{{ $user->Ualais }}" style="border:none; width: 40px;height: 27px;background: orange;">
							</div>
						</div>
						<!--第一个内容部分结束-->
						<div class="clearfix"> </div>
					<!-- </div> -->
					<!--整体结束-->
				</div>
				@endif	
				</div>
			<script type="text/javascript" src="/home/js/comment.js"></script>		
		<!-- 留言end -->
		<!-- 广告 -->
		<div class="banner-right-text" style="margin-top:-30px;">
			<!--/general-news-->
			 <div class="general-news">
				<div class="general-inner">
					<div class="media">	
					 <h3 class="tittle media">Poster <i class="glyphicon glyphicon-leaf"></i></h3>
					 <!-- 广告 -->
					 @foreach($poster_data as $k => $v)
					  <div class="general-text two">
						 <a href="{{$v->POurl}}" target="_blank"><img src="{{$v->POpic}}" class="img-responsive" alt="" style="height:260px;"></a>
							<p>{{mb_substr($v->POmiaoshu,0,66).'..'}}</p>
					  </div>
					  @endforeach
					  <!-- 广告end -->
		        	</div>
				 </div>
			</div>	
			<!--//general-news-->
			<!--/news-->
			<!--/news-->
		</div>
		<!-- 广告end -->

	<!-- //contact -->
	</div>

	<script type="text/javascript">
	
	$('#collect').click(function(){
		if($('#session').val() != 0){
			if($("#collect span").css("color") == 'rgb(204, 203, 198)'){
				var eid = $('#eid').val();
				$.ajaxSetup({
			        headers: {
			            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }
				});
				$.post('/collect/releaseadd',{'eid':eid},function(msg){
					if(msg.code == 1){
						layer.msg(msg.data);
					}else{
						layer.msg(msg.err);
					}
				},'json');
				$("#collect span").css("color","rgb(255, 165, 0)")
			}else if($("#collect span").css("color") == 'rgb(255, 165, 0)'){
				var eid = $('#eid').val();
				$.ajaxSetup({
			        headers: {
			            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }
				});
				$.post('/collect/releasedelete',{'eid':eid},function(msg){
					if(msg.code == 1){
						layer.msg(msg.data);
					}else{
						layer.msg(msg.err);
					}
				},'json');
				$("#collect span").css("color","rgb(204, 203, 198)");
			}
		}else{
			$(location).prop('href', '/home/login');
		}
	});

	
</script>
<!-- 内容区域结束 -->
@endsection
	
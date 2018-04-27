@extends('home/layout/header')
@section('content')

<!-- 内容区域 -->
<!-- contact -->
	 <div class="contact">
	 	<!-- 信息详情 -->
		<div class="contact-left">
			<img src="{{$content_show['Cpicture']}}" class="img-responsive" alt="" style="width:500px;height:300px;">

		</div>
		<div class="contact-right">
			<p class="phn" style="font-size:18px;">{{strtok($content_show['Ctitle'],' ')}}</p>
			<p class="phn" style="font-size:18px;">{{strstr($content_show['Ctitle'],' ')}}</p>
			<p class="phn-bottom"><span>{{strtok($content_show['created_at'],' ')}}</span></p>
			<p class="lom" style="width:100%;text-indent:2em;font-size:16px;">{{mb_substr($content_show['Ccontent'],0,200).'..'}}</p>
			@if($collect == null)
				<a class="span_link" id="collect" style="float:right;margin-right:10px;color:#777;cursor:pointer;"><span class="glyphicon glyphicon-star">收藏</span></a>
			@else
				<a class="span_link" id="collect" style="float:right;margin-right:10px;color:#777;cursor:pointer;"><span class="glyphicon glyphicon-star" style="color:rgb(255, 165, 0)">收藏</span></a>
			@endif
			<input type="hidden" id="cid" name="cid" value="{{$content_show['Cid']}}">
		</div>
		<div class="clearfix"> </div>
		<!-- 信息详情end -->
		<!-- 留言 -->
		<div class="banner-section" style="margin-top:-30px;">
		   <!-- 文本框 -->
		     <div class="coment-form">
				<h4>发表评论</h4>
				<form action="/home/comment/{{$content_show['Cid']}}" method="post">
					{{csrf_field()}}
					<textarea onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Comment...';}" required="" name="Dcontent">Your Comment...</textarea>
					<input type="submit" value="发表" >
				</form>
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
				<div class="response">
					@if($comment_data!=null)
					@foreach($comment_data as $k => $v)	
					<div class="media response-info">
						<div class="media-left response-text-left">
							<a href="/member/{{$v['Uid']}}" target="_blank">
								<img class="media-object" src="{{ $v['Uimage'] }}" alt="" style="width:120px;height:120px;"/>
							</a>
							<h5 style="text-align:center;"><a href="#">{{$v['Ualais'] }}</a></h5>
						</div>
						<div class="media-body response-text-right">
							<p>{{mb_substr($v['Dcontent'],0,120).'..'}}</p>
							<ul>
								<li>{{strtok($v['created_at'],' ')}}</li>
								<li><a href="single.html" style="margin-bottom:10px;">回复@他</a></li>
							</ul>
							<!-- 回复 -->
							@if ($v['replay'] == true)
							@foreach($reply_data as $key => $value)
							<div class="media response-info" style="margin-top:10px;">
								<div class="media-left response-text-left">
									<a href="/member/{{$value['Uid']}}" target="_blank">
										<img class="media-object" src="{{ $value['Uimage'] }}" alt="" style="width:100px;height:100px;"/>
									</a>
									<h5 style="text-align:center;"><a href="#">{{$value['Ualais'] }}</a></h5>
								</div>
								<div class="media-body response-text-right" style="font-size:14px;">
									<p style="padding:10px 0px 0px; ">{{mb_substr($value['Dcontent'],0,120).'..'}}</p>
									<ul>
										<li>{{strtok($value['created_at'],' ')}}</li>
									</ul>		
								</div>
								<div class="clearfix" style="border-bottom:1px dashed #DDDDDD;"> </div>
							</div>
							@endforeach
							@endif
							<!-- 回复end -->
						</div>
						<div class="clearfix" style="border-bottom:1px dashed #DDDDDD;"> </div>
					</div>
					@endforeach
					@endif
				</div>	
		</div>
		<!-- 留言end -->
		<!-- 广告 -->
		<div class="banner-right-text">
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
<!-- 内容区域结束 -->

<script type="text/javascript">
	
	$('#collect').click(function(){
		if($("#collect span").css("color") == 'rgb(204, 203, 198)'){
			var cid = $('#cid').val();
			$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
			});
			$.post('/collect/add',{'cid':cid},function(msg){
				if(msg.code == 1){
					layer.msg(msg.data);
				}else{
					layer.msg(msg.err);
				}
			},'json');
			$("#collect span").css("color","rgb(255, 165, 0)")
		}else if($("#collect span").css("color") == 'rgb(255, 165, 0)'){
			var cid = $('#cid').val();
			$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
			});
			$.post('/collect/delete',{'cid':cid},function(msg){
				if(msg.code == 1){
					layer.msg(msg.data);
				}else{
					layer.msg(msg.err);
				}
			},'json');
			$("#collect span").css("color","rgb(204, 203, 198)");
		}
		
	});

	
</script>

@endsection
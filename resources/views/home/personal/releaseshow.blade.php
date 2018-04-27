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
					@if($content_show['Eimg'] == null &&$content_show->Evideo == null)
					<span class="result" style="line-height:70px;">{!!$content_show->Earticle!!}</span>
					@endif
					<span class="result">{!!mb_substr($content_show->Earticle,0,66).'..'!!}</span>
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
					<video width="280" height="420" controls="controls" style="background-color:rgba(0,0,0,0.8)">
						  <source src="{{ $content_show->Evideo }}" type="video/mp4" />
						  <source src="{{ $content_show->Evideo }}" type="video/ogg" />
						  <source src="{{ $content_show->Evideo }}" type="video/webm" />
						  <object data="{{ $content_show->Evideo }}" width="100%" height="100%">
						    	<embed src="{{ $content_show->Evideo }}" width="100%" height="100%" />
						  </object>
					</video>
					@endif
					
				</p>
			
			</div>

		<div class="clearfix"> </div>
		<!-- 信息详情end -->
		<!-- 留言 -->
		<div class="banner-section" style="padding-top:0px;">
		   <!-- 文本框 -->
		     <div class="coment-form">
				<h4>发表评论</h4>
				<form action="/release/comment/{{$content_show['Eid']}}" method="post">
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
<!-- 内容区域结束 -->
@endsection
	
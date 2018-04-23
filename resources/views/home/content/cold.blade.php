@extends('home/layout/header')
@section('content')

<div class="banner-section">
	<h3 class="tittle">{{$title}} <i class="glyphicon glyphicon-flag"></i></h3>
	  <div class="top-news">
		 <div class="top-inner second" style="margin-top: -27px"> 
		 	@foreach($data_cold as $k=>$v)
			<div class="col-md-6 top-text two" style="margin-bottom: 15px">
				 <a href="/home/show/{{ $v->Cid }}"><img style="width: 350px;height: 260px;" src="{{ $v->Cpicture }}" class="img-responsive" alt=""></a>
				 	@if(strlen($v->Ctitle) <= 48)
				 	<h5 class="top"><a href="/home/show/{{ $v->Cid }}">{{$v->Ctitle}}</a></h5>
				 	@else
				    <h5 class="top"><a href="/home/show/{{ $v->Cid }}">{{ mb_substr($v->Ctitle,0,17).'.......' }}</a></h5>
				    @endif
					<p>{{ mb_substr($v->Ccontent,0,30 ).'..................' }}</p>
				    <div>
							<!--用户头像-->
						    <div style="float: left;margin-right: 10px;">
						    	<img src="{{ $v->Uimage }}" style="width: 30px;height: 30px;border-radius: 50%" alt="">
						    </div>
						    <p>
						    	<!--用户名-->
						    	<a href="" style="color: #000;">{{ $v->Ualais }}</a>
						    	
						    	<!--发布时间-->
					    		<span style="margin-left: 10px;">{{ $v->created_at }}</span>
					    		<!--评论-->
					    		<span class="glyphicon glyphicon-comment" style="line-height: 27px;"><span style="font-size: 14px;margin-left: 5px;">{{ $v->count }}</span></span>
						   	</p>
						</div>
			 </div>
			 @endforeach
			 <div class="col-md-12" style="text-align: center;">
				 {!! $data_cold->render() !!}
				 </div>
			 <div class="clearfix"> </div>
		 </div>
        </div>
     </div>
	<div class="banner-right-text">
	 <h3 class="tittle">评论最多  <i class="glyphicon glyphicon-facetime-video"></i></h3>
	<!--/general-news-->
	 <div class="general-news">
		<div class="general-inner">
			<!--最多评论的内容-->
			<div class="general-text">
				<!--图片-->
				 <a href="/home/show/{{ $data_max->Cid }}"><img src="{{ $data_max->Cpicture }}" class="img-responsive" alt=""></a>
				 	<!--标题-->
				    <h5 class="top"><a href="/home/show/{{ $data_max->Cid }}">{{ $data_max->Ctitle }}</a></h5>
					<p>{{ mb_substr($data_max->Ccontent,0,60).'......' }}</p>
				    <div style="padding-top: 12px;">
					<!--用户头像-->
				    <div style="float: left;margin-right: 10px;">
				    	<img src="{{ $data_max->Uimage }}" style="width: 30px;height: 30px;border-radius: 50%" alt="">
				    </div>
				    <p>
				    	<!--用户名-->
				    	<a href="" style="color: #000;">{{ $data_max->Ualais }}</a>
				    	<!--发布时间-->
			    		　<span>{{ $data_max->created_at }}</span>
			    		<!--评论-->
			    		<span class="glyphicon glyphicon-comment" style="line-height: 27px;"><span style="font-size: 14px;margin-left: 5px;">{{ $data_max->max }}</span></span>
				   	</p>
				</div>
			 </div>
			 <!--所有评论者-->
			 <div class="edit-pics">
		       @foreach($data_comment as $k=> $v )
		       <div class="editor-pics">
					<div class="col-md-3 item-pic">
					   <img style="width: 100px;height: 80px;" src="{{ $v->Uimage }}" class="img-responsive" alt="">
					</div>
					<div class="col-md-9 item-details" style="margin-top: 3px;">
						<h5 class="inner two"><span><a href="" style="color: blue">{{ $v->Ualais }}：</a></span><span>{{ $v->Dcontent }}</span></h5>
						<div style="margin-top: 4px;" class="td-post-date two"><i class="glyphicon glyphicon-time"></i>{{ $v->created_at }}</div>
					</div>
					<div class="clearfix"></div>
				</div>
				@endforeach							
			</div>
							<!--所有评论者结束-->
						<div class="media" style="margin-left: 17px;">	
						 <h3 class="tittle media">视频 <i class="glyphicon glyphicon-floppy-disk"></i></h3>
						  <div class="general-text two">
							  <video width="300" height="300" controls="controls">
									  <source src="{{ $data_video->Evideo }}" type="video/mp4" />
									  <source src="{{ $data_video->Evideo }}" type="video/ogg" />
									  <source src="{{ $data_video->Evideo }}" type="video/webm" />
									  <object data="{{ $data_video->Evideo }}" width="100%" height="100%">
									    <embed src="{{ $data_video->Evideo }}" width="100%" height="100%" />
									  </object>
									</video>	
								<p style="margin-top:10px;" class="top">标题：{{ mb_substr($data_video->Earticle,0,16).'......' }}</p>
								<p>用户名：<a href="">{{ $data_video -> Ualais }}</a>　<span>{{ $data_video->created_at }}</span><a href="" style="margin-left: 16px;color: blue">更多</a></p>
						  </div>
			         </div>
		 		</div>
	</div>	
</div>
	<div class="clearfix"> </div>
<!-- 内容区域结束 -->
@endsection
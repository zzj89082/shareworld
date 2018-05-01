@extends('home/layout/header')
@section('content')

<div class="banner-section">
		<h3 class="tittle">{{$title}} <i class="glyphicon glyphicon-flag"></i></h3>
	  <div class="top-news" style="padding-top:0">
		 <div class="top-inner second"> 
		 	@foreach($data_fashion as $k=>$v)
			<div class="col-md-6 top-text zzjhove" style="height:430px;">
				 <a href="/home/show/{{$v->Cid}}"><img src="{{$v->Cpicture}}" class="img-responsive" alt="" style="height:300px;"></a>
				    <h4 class="top"><a href="/home/show/{{$v->Cid}}" title="{{$v->Ctitle}}">{{mb_substr($v->Ctitle,0,16).'..'}}</a></h4>
					<p>{{mb_substr($v->Ccontent,0,66).'..'}}</p>
				    <p>{{strtok($v->created_at,' ')}}
				    	<a class="span_link" href="/home/show/{{$v->Cid}}" style="float:right">
					    	<span class="glyphicon glyphicon-eye-open"></span>{{$v->Ccount}} 
					    </a>
					    <a class="span_link" href="/home/show/{{$v->Cid}}" style="float:right">
					    	<span class="glyphicon glyphicon-comment"></span>{{$data_fashion[$k]['count']}} 
					    </a>
				    </p>

			</div>
			@if( $k%2 == 1 )
		 	<div class="clearfix" style="margin-bottom:20px;"> </div>
			@endif
			 @endforeach
			<div class="clearfix"> </div>
			<div class="text-center">
                  {!! $data_fashion->render() !!}
		    </div>
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
				 <a href="/home/show/{{ $data_max->Cid }}"><img src="{{ $data_max->Cpicture }}" class="img-responsive" alt=""></a>
				    <h4 class="top"><a href="/home/show/{{ $data_max->Cid }}" title="{{$data_max->Ctitle}}">{{mb_substr($data_max->Ctitle,0,16).'...'}}</a></h4>
					<p>{{mb_substr($data_max->Ccontent,0,80).'...'}}</p>
				    <p>{{ $data_max->created_at }}
				    	<a class="span_link" href="/home/show/{{ $data_max->Cid }}"><span class="glyphicon glyphicon-comment"></span>{{ $data_max->Ccomment or 0}} </a><span class="glyphicon glyphicon-eye-open"></span>{{ $data_max->Ccount or 0 }}
				    </p>
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
				  	<a href="/release/releaseshow/{{$data_video->Eid}}">
					 <video width="330" height="400" controls="controls" style="background-color:rgba(0,0,0,0.8)">
						  <source src="{{ $data_video->Evideo }}" type="video/mp4" />
						  <source src="{{ $data_video->Evideo }}" type="video/ogg" />
						  <source src="{{ $data_video->Evideo }}" type="video/webm" />
						  <object data="{{ $data_video->Evideo }}" width="100%" height="100%">
						    <embed src="{{ $data_video->Evideo }}" width="100%" height="100%" />
						  </object>
					</video>
					</a>
				  </div>

	         </div>
 		</div>
	</div>	
</div>
	<div class="clearfix"> </div>
<!-- 内容区域结束 -->
@endsection
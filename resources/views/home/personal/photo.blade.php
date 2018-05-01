@extends('home/layout/headerPersonal')
@section('content')

			 
			<div class="response">
				<!-- 发布 -->
				<div class="media response-info undis" id="tbc_01" style="min-height: 800px;min-width: 1000px;">
					<div class="gallery-section" style="min-height: 800px;min-width: 1000px;" >
						<input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">
						<input type="hidden" name="Uid" id="Uid" value="{{ $photo['Uid'] }}">
			        	<button type="button" class="layui-btn" id="Photo">
						  <i class="layui-icon">&#xe67c;</i>上传照片
						</button>
				        <div class="categorie-grids cs-style-1 ">
								<div class="grid gallery" style="width:1000px;">
									<figure>
									@if(isset($zhaopian))
				     				@foreach ($zhaopian as $v)
				     				<form id="form" action="/photo/pdelete/{{$v->Pid}}" method="post">
										<div style="float:left;width:300px;height:170px;margin:20px 15px" ><a href="{{$v->Photo}}"><img class="img" style="display:block;height:100%;width:100%" src="{{$v->Photo}}" /></a>{{ csrf_field() }}<button  class="layui-btn layui-icon layui-btn-xs layui-btn-danger" href="" style="float:right;margin-bottom:10px;">&#xe640;</button></div>
									</form>
									@endforeach
									@endif
	
									</figure>
								</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<!-- 发布end -->
				
				<script type="text/javascript">
					$(function(){
						$('.img').click(function(){
							
						});

					});
				</script>
				
			</div>
			
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
		      		window.location.reload();
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
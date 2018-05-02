@extends('home/layout/headerPersonal')
@section('content')
		<!--banner-section-->
		<div class="banner-section">
		   <!-- 文本框 -->
		   <div class="coment-form" style="margin-top:0em">
				<h4>留下你的足迹　<i class="glyphicon glyphicon-comment"></i></h4>
				<form action="/release/publish" method="post" class="publish" enctype="multipart/form-data" id="uform">
						{{csrf_field()}}
						<!-- <div id="result">解析后div</div> -->
				        <!-- <input class="submit" type="button" value="解析"> -->
						<textarea  required="" name="Earticle" class="content" id="content" style="color:#1A1A1A" placeholder="永远要相信美好的事情，即将发生！"></textarea>
						<input type="submit" value="发 布 微 博" style="float:right">
					<!-- 表情 -->
					<span style="float:left;letter-spacing:5px;padding-left:10px;margin-top:5px;">
						<a class="face"><i class="glyphicon glyphicon-heart"></i></a>
					</span>
					<!-- 图片视频 -->
					<span style="float:left;letter-spacing:5px;padding-left:10px;margin-top:5px;">
							<input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">
							<a class="picture" id="test1"><i class="glyphicon glyphicon-picture"></i></a>
							<label class="ui_button ui_button_primary" for="xFile"><i class="glyphicon glyphicon-facetime-video"></i></label>
							<input type="file" id="xFile" style="position:absolute;clip:rect(0 0 0 0);" name="Evideo" accept="audio/mp4,video/mp4">
					</span>
					<span style="float:left;padding-left:10px;font-size:12px;color:#ccc;margin-top:5px;">*图片与视频只能上传一种哦</span>
					<!-- 上传视频成功 -->
					<script type="text/javascript">
							$("#xFile").change(function(){
								if($("#xFile").attr("value")!==null){
									layer.msg('选择成功',{
										time:2000,
									});
								}
							});
					</script>
					<!-- 图片预览 -->
					<div style="width:220px;height:50px;margin-top:-55px;overflow:hidden" id="demo2">
					</div>
					<!-- 此隐藏域是为了传参 -->
					<img id="profile" src="" style="display:none;">
				</form>
				<!-- 文本框验证 -->
				<script type="text/javascript">
				    $("#content").blur(function(){  
				         if($(this).val().length < 5){
			         		layer.msg('内容不能为空<br />或者<br />小于5个字符哦~亲',{
									time:2000,
							});
				         }
				    });
				    $("#uform").submit(function(){
				    	if($("#content").val().length < 5){
						  return false;
						} else {
						  return true;
						}
					});
				</script>
				<!-- 图片视频end -->
				<!-- 表情 -->
				<script type="text/javascript">
					$('.face').bind({
						click: function(event){
							if(! $('#sinaEmotion').is(':visible')){
								$(this).sinaEmotion();
								event.stopPropagation();
							}
						}
					});
				</script>
				<!-- 图片上传 -->
				<script>
					// 执行文件上传
					layui.use('upload', function(){
					  var upload = layui.upload;
					  var token = $('#_token').val();
					  //执行实例
					  var uploadInst = upload.render({
					    elem: '#test1' //绑定元素
					    ,url: '/release/upload' //上传接口
					    ,method:'post'
					    ,field:'profile'
					    ,multiple:true //多文件上传
					    ,data:{'_token':token}
					    ,size: '2048'//大小限制KB
					    ,accept:'images'//类型限制
					    ,number:'4'//限制上传数量
					    ,before: function(obj){
					      //预读本地文件示例，不支持ie8
					      obj.preview(function(index, file, result){
					        $('#demo2').prepend('<img src="'+ result +'" alt="'+ file.name +'" style="width:50px;height:50px;margin-left:5px;">');
					      });
					    }
					    ,done: function(res){ 
					      //上传完毕回调
					      if(res.code == 0){
					      	$('#profile').append('<input type="hidden" value="'+ res.data.src +'" name="temp_'+parseInt(10000*Math.random())+'">');
					      }
					    }
					    ,error: function(){
					      //请求异常回调
					    }
					  });
					});
				</script>
			</div>	
			<div class="clearfix"></div>
		   <!-- 文本框结束 -->
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
						<li id="tb_1" class="normaltab" onclick="x:HoverLi(1);">SHARE</li>
						<li id="tb_2" class="normaltab" onclick="i:HoverLi(2);">热门</li>						
						<li id="tb_3" class="normaltab" onclick="a:HoverLi(3);">头条</li>
						<li id="tb_4" class="normaltab" onclick="o:HoverLi(4);">视频</li>												
						<li id="tb_5" class="normaltab" onclick="e:HoverLi(5);">新鲜事</li>												
						<li id="tb_6" class="normaltab" onclick="r:HoverLi(6);">搞笑</li>												
						<li id="tb_7" class="normaltab" onclick="t:HoverLi(7);">时尚</li>												
						<li id="tb_8" class="normaltab" onclick="y:HoverLi(8);">军事</li>												
						<li id="tb_9" class="normaltab" onclick="u:HoverLi(9);">美女</li>												
						<li id="tb_10" class="normaltab" onclick="o:HoverLi(10);">体育</li>												
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
					@foreach($release as $k => $v)
					<div class="media-left response-text-left" style="margin:10px 0px;">
						<a href="javascript:0">
							<img class="media-object" src="{{$v->Uimage}}" alt="" style="width:120px;height:100px;"/>
						</a>
						<br>
						<h3>
							<!-- 除了自己都可以关注 -->
							@if($user['Uid'] != $v->Uid)
									@if($user['Uattention']!=0 && strstr($user['Uattention'],(string)$v->Uid))
										<button class="layui-btn layui-btn-warm guanzhu" style="margin-left:0.5em" name="{{$v->Uid}}" value="{{$user['Uid']}}" alt="1">@ 取消关注</button>
									@else
										<button class="layui-btn guanzhu" style="margin-left:0.5em" name="{{$v->Uid}}" value="{{$user['Uid']}}" alt="0">@ 点击关注</button>
									@endif
							@endif

						</h3>

					</div>
					<div class="media-body response-text-right" style="margin:10px 0px;border-bottom:1px dashed #AAE0E0;">
						<a href="/release/releaseshow/{{$v->Eid}}"><p><span style="color:#EB7350">{{$v->Ualais}}</span> : <span class="result">{!!mb_substr($v->Earticle,0,66).'..'!!}</span></p></a>
						<p style="min-height:60px;">
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

							<span style="margin-left:30px;">
								<button style="background:none;border:none;color:red;cursor: pointer;" class="releaseDel" name="{{$v->Eid}}">删 除</button>
							</span>
							@if(strstr($v['Elike_Uid'],(string)$user['Uid']))
								<button class="layui-btn layui-btn-danger dianzan" style="position:absolute;right:10px;bottom:0px;background-color: #5FB878;" name="{{$v->Eid}}" alt="1" value="{{$user['Uid']}}">
								<i class="glyphicon glyphicon-heart-empty" style="font-size:14px;"></i>
								取 消 <span>{{$v['Elike']}}</span>　
								</button>
							@else
								<button class="layui-btn layui-btn-danger dianzan" style="position:absolute;right:10px;bottom:0px;" name="{{$v->Eid}}" alt="0" value="{{$user['Uid']}}">
									<i class="glyphicon glyphicon-heart-empty" style="font-size:14px;"></i>
									点 赞 <span>{{$v['Elike']}}</span>　
								</button>
							@endif
						</div>
					</div>
					<div class="clearfix"> </div>
					
					<!-- 分页 -->
					@endforeach
					 <div class="text-center">
		                  {!! $release->appends(['mpage' => $remen->currentPage(),
						'tpage'=>$toutiao->currentPage(),
						'spage'=>$shipin -> currentPage(),
						'xpage'=>$xinxianshi -> currentPage(),
						'gpage'=>$gaoxiao -> currentPage(), 
						'hpage' => $shishang->currentPage(),
						'jpage'=>$junshi -> currentPage(),
						'vpage'=>$meinv-> currentPage(),
						'ypage'=>$tiyu-> currentPage()
						])->render() !!}
				     </div>
				</div>
				<!-- 点赞 -->
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
			    <!-- 无刷新关注 -->
			    <script type="text/javascript">
					$('.guanzhu').click(function(){
						var uid = $(this).attr('name');//要关注的用户
						var user = $(this).attr('value');//当前登陆的用户
						var alt = $(this).attr('alt');//表示符

						if(alt == 0){
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
				<!-- 删除 -->
				<script type="text/javascript">	
					$('.releaseDel').click(function(){
						var eid = $(this).attr('name');//当前登陆的用户
						$.get('/release/del',{'Eid':eid},function(msg){
				      		if(msg == 1){
				      			layer.msg('删除成功', {
						        	time: 2000, //20s后自动关闭
						      	});
				      		} else {
				      			layer.msg('删除失败', {
						        	time: 2000, //20s后自动关闭
						      	});
				      		}
				      		
				      	},'HTML');
					});
				</script>

				<!-- 发布end -->

				<!-- 热门 -->
				<div class="media response-info undis" id="tbc_02">
					@foreach($remen as $k => $v)
					<div class="media-left response-text-left" style="margin:10px 0px;">
						<a href="/home/show/{{$v->Cid}}">
							<img class="media-object" src="{{$v->Cpicture}}" alt="" style="width:140px;height:100px;border-radius:5px;"/>
						</a>
					</div>
					<div class="media-body response-text-right" style="margin:10px 0px;border-bottom:1px dashed #ccc">
						<a href="/home/show/{{$v->Cid}}" title="{{$v->Ctitle}}"><h5>{{mb_substr($v->Ctitle,0,30).'..'}}</h5></a>
						<p>{{mb_substr($v->Ccontent,0,60).'..'}}</p>
						<div class="td-post-date two" style="margin-bottom:5px;">
							<i class="glyphicon glyphicon-time"></i>{{strtok($v['created_at'],' ')}} 
							<a href="/home/show/{{$v['Cid']}}">
								<i class="glyphicon glyphicon-comment"></i>{{$v['count']}} 
							</a>
						</div>
					</div>
					<div class="clearfix"> </div>
					<!-- 分页 -->
					@endforeach
					 <div class="text-center">
		                  {!! $remen->appends(['rpage' => $release->currentPage(),
						'tpage'=>$toutiao->currentPage(),
						'spage'=>$shipin -> currentPage(),
						'xpage'=>$xinxianshi -> currentPage(),
						'gpage'=>$gaoxiao -> currentPage(), 
						'hpage' => $shishang->currentPage(),
						'jpage'=>$junshi -> currentPage(),
						'vpage'=>$meinv-> currentPage(),
						'ypage'=>$tiyu-> currentPage()
						])->render() !!}
				     </div>
				</div>
				<!-- 热门end -->
				<!-- 头条 -->
				<div class="media response-info undis" id="tbc_03">
					@foreach($toutiao as $k => $v)
					<div class="media-left response-text-left" style="margin:10px 0px;">
						<a href="/home/show/{{$v->Cid}}">
							<img class="media-object" src="{{$v->Cpicture}}" alt="" style="width:140px;height:100px;border-radius:5px;"/>
						</a>
					</div>
					<div class="media-body response-text-right" style="margin:10px 0px;border-bottom:1px dashed #ccc">
						<a href="/home/show/{{$v->Cid}}" title="{{$v->Ctitle}}"><h5>{{mb_substr($v->Ctitle,0,30).'..'}}</h5></a>
						<p>{{mb_substr($v->Ccontent,0,60).'..'}}</p>
						<div class="td-post-date two" style="margin-bottom:5px;">
							<i class="glyphicon glyphicon-time"></i>{{strtok($v['created_at'],' ')}} 
							<a href="/home/show/{{$v['Cid']}}">
								<i class="glyphicon glyphicon-comment"></i>{{$v['count']}} 
							</a>
						</div>
					</div>
					<div class="clearfix"> </div>
					<!-- 分页 -->
					@endforeach
					 <div class="text-center">
		                  {!! $toutiao->appends(['rpage' => $release->currentPage(),
						'remen'=>$remen->currentPage(),
						'spage'=>$shipin -> currentPage(),
						'xpage'=>$xinxianshi -> currentPage(),
						'gpage'=>$gaoxiao -> currentPage(), 
						'hpage' => $shishang->currentPage(),
						'jpage'=>$junshi -> currentPage(),
						'vpage'=>$meinv-> currentPage(),
						'ypage'=>$tiyu-> currentPage()
						])->render() !!}
				     </div>
				</div>
				<!-- 头条end -->
				<!-- 视频 -->
				<div class="media response-info undis" id="tbc_04">
					@foreach($shipin as $k => $v)
					<div class="media-left response-text-left" style="margin:10px 0px;">
						<a href="/home/show/{{$v->Cid}}">
							<img class="media-object" src="{{$v->Cpicture}}" alt="" style="width:140px;height:100px;border-radius:5px;"/>
						</a>
					</div>
					<div class="media-body response-text-right" style="margin:10px 0px;border-bottom:1px dashed #ccc">
						<a href="/home/show/{{$v->Cid}}" title="{{$v->Ctitle}}"><h5>{{mb_substr($v->Ctitle,0,30).'..'}}</h5></a>
						<p>{{mb_substr($v->Ccontent,0,60).'..'}}</p>
						<div class="td-post-date two" style="margin-bottom:5px;">
							<i class="glyphicon glyphicon-time"></i>{{strtok($v['created_at'],' ')}} 
							<a href="/home/show/{{$v['Cid']}}">
								<i class="glyphicon glyphicon-comment"></i>{{$v['count']}} 
							</a>
						</div>
					</div>
					<div class="clearfix"> </div>
					<!-- 分页 -->
					@endforeach
					 <div class="text-center">
		                  {!! $shipin->appends(['rpage' => $release->currentPage(),
						'remen'=>$remen->currentPage(),
						'tpage'=>$toutiao -> currentPage(),
						'xpage'=>$xinxianshi -> currentPage(),
						'gpage'=>$gaoxiao -> currentPage(), 
						'hpage' => $shishang->currentPage(),
						'jpage'=>$junshi -> currentPage(),
						'vpage'=>$meinv-> currentPage(),
						'ypage'=>$tiyu-> currentPage()
						])->render() !!}
				     </div>
				</div>
				<!-- 视频end -->
				<!-- 新鲜事 -->
				<div class="media response-info undis" id="tbc_05">
					@foreach($xinxianshi as $k => $v)
					<div class="media-left response-text-left" style="margin:10px 0px;">
						<a href="/home/show/{{$v->Cid}}">
							<img class="media-object" src="{{$v->Cpicture}}" alt="" style="width:140px;height:100px;border-radius:5px;"/>
						</a>
					</div>
					<div class="media-body response-text-right" style="margin:10px 0px;border-bottom:1px dashed #ccc">
						<a href="/home/show/{{$v->Cid}}" title="{{$v->Ctitle}}"><h5>{{mb_substr($v->Ctitle,0,30).'..'}}</h5></a>
						<p>{{mb_substr($v->Ccontent,0,60).'..'}}</p>
						<div class="td-post-date two" style="margin-bottom:5px;">
							<i class="glyphicon glyphicon-time"></i>{{strtok($v['created_at'],' ')}} 
							<a href="/home/show/{{$v['Cid']}}">
								<i class="glyphicon glyphicon-comment"></i>{{$v['count']}} 
							</a>
						</div>
					</div>
					<div class="clearfix"> </div>
					<!-- 分页 -->
					@endforeach
					 <div class="text-center">
		                  {!! $xinxianshi->appends(['rpage' => $release->currentPage(),
						'remen'=>$remen->currentPage(),
						'tpage'=>$toutiao -> currentPage(),
						'spage'=>$shipin -> currentPage(),
						'gpage'=>$gaoxiao -> currentPage(), 
						'hpage' => $shishang->currentPage(),
						'jpage'=>$junshi -> currentPage(),
						'vpage'=>$meinv-> currentPage(),
						'ypage'=>$tiyu-> currentPage()
						])->render() !!}
				     </div>
				</div>
				<!-- 新鲜事end -->
				<!-- 搞笑 -->
				<div class="media response-info undis" id="tbc_06">
					@foreach($gaoxiao as $k => $v)
					<div class="media-left response-text-left" style="margin:10px 0px;">
						<a href="/home/show/{{$v->Cid}}">
							<img class="media-object" src="{{$v->Cpicture}}" alt="" style="width:140px;height:100px;border-radius:5px;"/>
						</a>
					</div>
					<div class="media-body response-text-right" style="margin:10px 0px;border-bottom:1px dashed #ccc">
						<a href="/home/show/{{$v->Cid}}" title="{{$v->Ctitle}}"><h5>{{mb_substr($v->Ctitle,0,30).'..'}}</h5></a>
						<p>{{mb_substr($v->Ccontent,0,60).'..'}}</p>
						<div class="td-post-date two" style="margin-bottom:5px;">
							<i class="glyphicon glyphicon-time"></i>{{strtok($v['created_at'],' ')}} 
							<a href="/home/show/{{$v['Cid']}}">
								<i class="glyphicon glyphicon-comment"></i>{{$v['count']}} 
							</a>
						</div>
					</div>
					<div class="clearfix"> </div>
					<!-- 分页 -->
					@endforeach
					 <div class="text-center">
		                 {!! $gaoxiao->appends(['rpage' => $release->currentPage(),
						'remen'=>$remen->currentPage(),
						'tpage'=>$toutiao -> currentPage(),
						'spage'=>$shipin -> currentPage(),
						'xpage'=>$xinxianshi -> currentPage(), 
						'hpage' => $shishang->currentPage(),
						'jpage'=>$junshi -> currentPage(),
						'vpage'=>$meinv-> currentPage(),
						'ypage'=>$tiyu-> currentPage()
						])->render() !!}
				     </div>
				</div>
				<!-- 搞笑end -->
				<!-- 时尚 -->
				<div class="media response-info undis" id="tbc_07">
					@foreach($shishang as $k => $v)
					<div class="media-left response-text-left" style="margin:10px 0px;">
						<a href="/home/show/{{$v->Cid}}">
							<img class="media-object" src="{{$v->Cpicture}}" alt="" style="width:140px;height:100px;border-radius:5px;"/>
						</a>
					</div>
					<div class="media-body response-text-right" style="margin:10px 0px;border-bottom:1px dashed #ccc">
						<a href="/home/show/{{$v->Cid}}" title="{{$v->Ctitle}}"><h5>{{mb_substr($v->Ctitle,0,30).'..'}}</h5></a>
						<p>{{mb_substr($v->Ccontent,0,60).'..'}}</p>
						<div class="td-post-date two" style="margin-bottom:5px;">
							<i class="glyphicon glyphicon-time"></i>{{strtok($v['created_at'],' ')}} 
							<a href="/home/show/{{$v['Cid']}}">
								<i class="glyphicon glyphicon-comment"></i>{{$v['count']}} 
							</a>
						</div>
					</div>
					<div class="clearfix"> </div>
					<!-- 分页 -->
					@endforeach
					 <div class="text-center">
		                  {!! $shishang->appends(['rpage' => $release->currentPage(),
						'remen'=>$remen->currentPage(),
						'tpage'=>$toutiao -> currentPage(),
						'spage'=>$shipin -> currentPage(),
						'xpage'=>$xinxianshi -> currentPage(), 
						'gpage' => $gaoxiao->currentPage(),
						'jpage'=>$junshi -> currentPage(),
						'vpage'=>$meinv-> currentPage(),
						'ypage'=>$tiyu-> currentPage()
						])->render() !!}
				     </div>
				</div>
				<!-- 时尚end -->
				<!-- 军事 -->
				<div class="media response-info undis" id="tbc_08">
					@foreach($junshi as $k => $v)
					<div class="media-left response-text-left" style="margin:10px 0px;">
						<a href="/home/show/{{$v->Cid}}">
							<img class="media-object" src="{{$v->Cpicture}}" alt="" style="width:140px;height:100px;border-radius:5px;"/>
						</a>
					</div>
					<div class="media-body response-text-right" style="margin:10px 0px;border-bottom:1px dashed #ccc">
						<a href="/home/show/{{$v->Cid}}" title="{{$v->Ctitle}}"><h5>{{mb_substr($v->Ctitle,0,30).'..'}}</h5></a>
						<p>{{mb_substr($v->Ccontent,0,60).'..'}}</p>
						<div class="td-post-date two" style="margin-bottom:5px;">
							<i class="glyphicon glyphicon-time"></i>{{strtok($v['created_at'],' ')}} 
							<a href="/home/show/{{$v['Cid']}}">
								<i class="glyphicon glyphicon-comment"></i>{{$v['count']}} 
							</a>
						</div>
					</div>
					<div class="clearfix"> </div>
					<!-- 分页 -->
					@endforeach
					 <div class="text-center">
		                  {!! $junshi->appends(['rpage' => $release->currentPage(),
						'remen'=>$remen->currentPage(),
						'tpage'=>$toutiao -> currentPage(),
						'spage'=>$shipin -> currentPage(),
						'xpage'=>$xinxianshi -> currentPage(), 
						'gpage' => $gaoxiao->currentPage(),
						'hpage'=>$shishang -> currentPage(),
						'vpage'=>$meinv-> currentPage(),
						'ypage'=>$tiyu-> currentPage()
						])->render() !!}
				     </div>
				</div>
				<!-- 军事end -->
				<!-- 美女 -->
				<div class="media response-info undis" id="tbc_09">
					@foreach($meinv as $k => $v)
					<div class="media-left response-text-left" style="margin:10px 0px;">
						<a href="/home/show/{{$v->Cid}}">
							<img class="media-object" src="{{$v->Cpicture}}" alt="" style="width:140px;height:100px;border-radius:5px;"/>
						</a>
					</div>
					<div class="media-body response-text-right" style="margin:10px 0px;border-bottom:1px dashed #ccc">
						<a href="/home/show/{{$v->Cid}}" title="{{$v->Ctitle}}"><h5>{{mb_substr($v->Ctitle,0,30).'..'}}</h5></a>
						<p>{{mb_substr($v->Ccontent,0,60).'..'}}</p>
						<div class="td-post-date two" style="margin-bottom:5px;">
							<i class="glyphicon glyphicon-time"></i>{{strtok($v['created_at'],' ')}} 
							<a href="/home/show/{{$v['Cid']}}">
								<i class="glyphicon glyphicon-comment"></i>{{$v['count']}} 
							</a>
						</div>
					</div>
					<div class="clearfix"> </div>
					<!-- 分页 -->
					@endforeach
					 <div class="text-center">
		                  {!! $meinv->appends(['rpage' => $release->currentPage(),
						'remen'=>$remen->currentPage(),
						'tpage'=>$toutiao -> currentPage(),
						'spage'=>$shipin -> currentPage(),
						'xpage'=>$xinxianshi -> currentPage(), 
						'gpage' => $gaoxiao->currentPage(),
						'hpage'=>$shishang -> currentPage(),
						'jpage'=>$junshi-> currentPage(),
						'ypage'=>$tiyu-> currentPage()
						])->render() !!}
				     </div>
				</div>
				<!-- 美女end -->
				<!-- 体育 -->
				<div class="media response-info undis" id="tbc_010">
					@foreach($tiyu as $k => $v)
					<div class="media-left response-text-left" style="margin:10px 0px;">
						<a href="/home/show/{{$v->Cid}}">
							<img class="media-object" src="{{$v->Cpicture}}" alt="" style="width:140px;height:100px;border-radius:5px;"/>
						</a>
					</div>
					<div class="media-body response-text-right" style="margin:10px 0px;border-bottom:1px dashed #ccc">
						<a href="/home/show/{{$v->Cid}}" title="{{$v->Ctitle}}"><h5>{{mb_substr($v->Ctitle,0,30).'..'}}</h5></a>
						<p>{{mb_substr($v->Ccontent,0,60).'..'}}</p>
						<div class="td-post-date two" style="margin-bottom:5px;">
							<i class="glyphicon glyphicon-time"></i>{{strtok($v['created_at'],' ')}} 
							<a href="/home/show/{{$v['Cid']}}">
								<i class="glyphicon glyphicon-comment"></i>{{$v['count']}} 
							</a>
						</div>
					</div>
					<div class="clearfix"> </div>
					<!-- 分页 -->
					@endforeach
					 <div class="text-center">
		                  {!! $tiyu->appends(['rpage' => $release->currentPage(),
						'remen'=>$remen->currentPage(),
						'tpage'=>$toutiao -> currentPage(),
						'spage'=>$shipin -> currentPage(),
						'xpage'=>$xinxianshi -> currentPage(), 
						'gpage' => $gaoxiao->currentPage(),
						'hpage'=>$shishang -> currentPage(),
						'jpage'=>$junshi-> currentPage(),
						'vpage'=>$meinv-> currentPage()
						])->render() !!}
				     </div>
				</div>
				<!-- 体育end -->
			</div>
			<!-- 滑动门js -->
			<script type="text/javascript" language="javascript">
				//<!CDATA[
				function g(o){return document.getElementById(o);}
				function HoverLi(n){
				//如果有N个标签,就将i<=N;
				for(var i=1;i<=10;i++){
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
			</div>
			<!-- 信息遍历end	 -->
			<!--//banner-->
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
								 <video width="330" height="400" controls="controls" style="background-color:rgba(0,0,0,0.8)">
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
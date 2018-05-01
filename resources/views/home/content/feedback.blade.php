@extends('home/layout/headerPersonal')
@section('content')

<!-- 内容区域 -->
	 <div class="contact">
		<div class="banner" style="margin-top:-30px;">
		   <div class="coment-form">
				<h4>反馈信息</h4>
				<form action="/home/addfankui" method="post">
					{{ csrf_field() }}
					<textarea onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '请输入你要评论的内容';}" name="text"></textarea>
					<input type="submit" data="textcomment" value="发送反馈"><!--点击事件-->
				</form>
			</div>	
			 <div class="clearfix"></div>
		    <div class="response" style="margin-bottom: 20px;text-indent:1em">
		    	<table width="100%" class="table table-striped">
		    		<tr style="background:#F4F4F4;height:30px;">
		    			<th>反馈内容</th>
		    			<th>回复内容</th>
		    			<th>反馈时间</th>
		    		</tr>
		    	@foreach($feedback as $k => $v)
		    		<tr>
		    			<td>{{$v['Fcontent']}}</td>
		    			<td>{{$v['Freplay']}}</td>
		    			<td>{{$v['created_at']}}</td>
		    		</tr>
		    	@endforeach
		    	</table>
		    </div>
		   <!-- 文本框结束 -->
		</div>
	</div>
<!-- 内容区域结束 -->


@endsection
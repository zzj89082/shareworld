@extends('admin/layout/header')
@section('content')

<section id="main-content">
  <section class="wrapper">
  	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="fa fa-table"></i> 内容管理</h3>
			
	        <section class="panel">
              <header class="panel-heading tab-bg-primary ">
                  <ul class="nav nav-tabs">
                      <li class="active">
                          <a data-toggle="tab" href="#remen" class="active">热门</a>
                      </li>
                      @foreach($data as $v)
                      <li class="">
                          <a data-toggle="tab" href="#{{ $v->Turl }}">{{ $v->Ttype }}</a>
                      </li>
                      @endforeach
                      <!-- <li class="">
                          <a data-toggle="tab" href="#top">头条</a>
                      </li>
                      <li class="">
                          <a data-toggle="tab" href="#video">视频</a>
                      </li>
                      <li class="">
                          <a data-toggle="tab" href="#novelty">新鲜事</a>
                      </li>
                      <li class="">
                          <a data-toggle="tab" href="#cold">搞笑</a>
                      </li>
                      <li class="">
                          <a data-toggle="tab" href="#fashion">时尚</a>
                      </li>
                      <li class="">
                          <a data-toggle="tab" href="#military">军事</a>
                      </li>
                      <li class="">
                          <a data-toggle="tab" href="#gril">美女</a>
                      </li>
                      <li class="">
                          <a data-toggle="tab" href="#sport">体育</a>
                      </li>
                      <li class="">
                          <a data-toggle="tab" href="#bagua">八卦</a>
                      </li> -->
                  </ul>
              </header>
              <div class="panel-body">
                  <div class="tab-content">
                      <div id="remen" class="tab-pane active">
						<section class="panel">
			              <header class="panel-heading">
			                  {{$title}}
			              </header>
			              <div class="table-responsive">
			                <table class="table">
			                  <thead>
			                    <tr>
			                      <th>ID</th>
			                      <th>所属类别</th>
			                      <th>文章标题</th>
			                      <th>文章图片</th>
			                      <th>文章内容</th>
			                      <th>操作</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                  	@foreach($data1 as $k => $v)
			                    <tr>
			                      <td style="line-height:50px;">{{$v->Cid}}</td>
			                      <td style="line-height:50px;">{{$v->Ccategory}}</td>
			                      <td style="line-height:50px;">{{mb_substr($v->Ctitle,0,10).'..'}}</td>
			                      <td><img src="{{$v->Cpicture}}" class="Rimg"  style="height:50px"></td>
			                      <td style="line-height:50px;">{{mb_substr($v->Ccontent,0,30).'..'}}</td>

			                      <td style="line-height:50px;">
			                      	<a class="btn btn-info" href="/admin/content/{{$v->Cid}}"  style="border-radius: 8px;"><i class="icon_close_alt2"> 详情</i></a>
			                      	<form action="/admin/content/{{ $v->Cid }}" method="post" style="display:inline;">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button class="btn btn-danger" type="submit" onclick="return confirm('确认要删除吗？')"><i class="icon_close_alt2"> 删除</i></button>
									</form>
			                      </td>
			                    </tr>
								@endforeach
			                  </tbody>
			                </table>
			                <div class="text-center">
				                  {!! $data1->render() !!}
				              </div>
			              </div>
			          </section>
                      </div>
                      <div id="top" class="tab-pane">
						<section class="panel">
			              <header class="panel-heading">
			                  {{$title}}
			              </header>
			              <div class="table-responsive">
			                <table class="table">
			                  <thead>
			                    <tr>
			                      <th>ID</th>
			                      <th>所属类别</th>
			                      <th>文章标题</th>
			                      <th>文章图片</th>
			                      <th>文章内容</th>
			                      <th>操作</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                  	@foreach($data2 as $k => $v)
			                    <tr>
			                      <td style="line-height:50px;">{{$v->Cid}}</td>
			                      <td style="line-height:50px;">{{$v->Ccategory}}</td>
			                      <td style="line-height:50px;">{{mb_substr($v->Ctitle,0,10).'..'}}</td>
			                      <td><img src="{{$v->Cpicture}}" class="Rimg"  style="height:50px"></td>
			                      <td style="line-height:50px;">{{mb_substr($v->Ccontent,0,30).'..'}}</td>
			                      <td style="line-height:50px;">
			                      <a class="btn btn-info" href="/admin/content/{{$v->Cid}}"  style="border-radius: 8px;"><i class="icon_close_alt2"> 详情</i></a>
			                      	<form action="/admin/content/{{ $v->Cid }}" method="post" style="display:inline;">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button class="btn btn-danger" type="submit" onclick="return confirm('确认要删除吗？')"><i class="icon_close_alt2"> 删除</i></button>
									</form>
			                      </td>
			                    </tr>
								@endforeach
			                  </tbody>
			                </table>
			                <div class="text-center">
				                  {!! $data2->render() !!}
				              </div>
			              </div>
			          </section>
                      </div>
                      <div id="video" class="tab-pane">
                      	<section class="panel">
			              <header class="panel-heading">
			                  {{$title}}
			              </header>
			              <div class="table-responsive">
			                <table class="table">
			                  <thead>
			                    <tr>
			                      <th>ID</th>
			                      <th>所属类别</th>
			                      <th>文章标题</th>
			                      <th>文章图片</th>
			                      <th>文章内容</th>
			                      <th>操作</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                  	@foreach($data3 as $k => $v)
			                    <tr>
			                      <td style="line-height:50px;">{{$v->Cid}}</td>
			                      <td style="line-height:50px;">{{$v->Ccategory}}</td>
			                      <td style="line-height:50px;">{{mb_substr($v->Ctitle,0,10).'..'}}</td>
			                      <td><img src="{{$v->Cpicture}}" class="Rimg"  style="height:50px"></td>
			                      <td style="line-height:50px;">{{mb_substr($v->Ccontent,0,30).'..'}}</td>
			                      <td style="line-height:50px;">
			                      <a class="btn btn-info" href="/admin/content/{{$v->Cid}}"  style="border-radius: 8px;"><i class="icon_close_alt2"> 详情</i></a>
			                      	<form action="/admin/content/{{ $v->Cid }}" method="post" style="display:inline;">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button class="btn btn-danger" type="submit" onclick="return confirm('确认要删除吗？')"><i class="icon_close_alt2"> 删除</i></button>
									</form>
			                      </td>
			                    </tr>
								@endforeach
			                  </tbody>
			                </table>
			                <div class="text-center">
				                  {!! $data3->render() !!}
				              </div>
			              </div>
			          </section>
			      </div>
                      <div id="novelty" class="tab-pane">
						<section class="panel">
			              <header class="panel-heading">
			                  {{$title}}
			              </header>
			              <div class="table-responsive">
			                <table class="table">
			                  <thead>
			                    <tr>
			                      <th>ID</th>
			                      <th>所属类别</th>
			                      <th>文章标题</th>
			                      <th>文章图片</th>
			                      <th>文章内容</th>
			                      <th>操作</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                  	@foreach($data4 as $k => $v)
			                    <tr>
			                      <td style="line-height:50px;">{{$v->Cid}}</td>
			                      <td style="line-height:50px;">{{$v->Ccategory}}</td>
			                      <td style="line-height:50px;">{{mb_substr($v->Ctitle,0,10).'..'}}</td>
			                      <td><img src="{{$v->Cpicture}}" class="Rimg"  style="height:50px"></td>
			                      <td style="line-height:50px;">{{mb_substr($v->Ccontent,0,30).'..'}}</td>
			                      <td style="line-height:50px;">
			                      <a class="btn btn-info" href="/admin/content/{{$v->Cid}}"  style="border-radius: 8px;"><i class="icon_close_alt2"> 详情</i></a>
			                      	<form action="/admin/content/{{ $v->Cid }}" method="post" style="display:inline;">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button class="btn btn-danger" type="submit" onclick="return confirm('确认要删除吗？')"><i class="icon_close_alt2"> 删除</i></button>
									</form>
			                      </td>
			                    </tr>
								@endforeach
			                  </tbody>
			                </table>
			                <div class="text-center">
				                  {!! $data4->render() !!}
				              </div>
			              </div>
			          </section>
                      </div>
                      <div id="cold" class="tab-pane">
						<section class="panel">
			              <header class="panel-heading">
			                  {{$title}}
			              </header>
			              <div class="table-responsive">
			                <table class="table">
			                  <thead>
			                    <tr>
			                      <th>ID</th>
			                      <th>所属类别</th>
			                      <th>文章标题</th>
			                      <th>文章图片</th>
			                      <th>文章内容</th>
			                      <th>操作</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                  	@foreach($data5 as $k => $v)
			                    <tr>
			                      <td style="line-height:50px;">{{$v->Cid}}</td>
			                      <td style="line-height:50px;">{{$v->Ccategory}}</td>
			                      <td style="line-height:50px;">{{mb_substr($v->Ctitle,0,10).'..'}}</td>
			                      <td><img src="{{$v->Cpicture}}" class="Rimg"  style="height:50px"></td>
			                      <td style="line-height:50px;">{{mb_substr($v->Ccontent,0,30).'..'}}</td>
			                      <td style="line-height:50px;">
			                      <a class="btn btn-info" href="/admin/content/{{$v->Cid}}"  style="border-radius: 8px;"><i class="icon_close_alt2"> 详情</i></a>
			                      	<form action="/admin/content/{{ $v->Cid }}" method="post" style="display:inline;">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button class="btn btn-danger" type="submit" onclick="return confirm('确认要删除吗？')"><i class="icon_close_alt2"> 删除</i></button>
									</form>
			                      </td>
			                    </tr>
								@endforeach
			                  </tbody>
			                </table>
			                <div class="text-center">
				                  {!! $data5->render() !!}
				              </div>
			              </div>
			          </section>
                      </div>
                      <div id="fashion" class="tab-pane">
						<section class="panel">
			              <header class="panel-heading">
			                  {{$title}}
			              </header>
			              <div class="table-responsive">
			                <table class="table">
			                  <thead>
			                    <tr>
			                      <th>ID</th>
			                      <th>所属类别</th>
			                      <th>文章标题</th>
			                      <th>文章图片</th>
			                      <th>文章内容</th>
			                      <th>操作</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                  	@foreach($data6 as $k => $v)
			                    <tr>
			                      <td style="line-height:50px;">{{$v->Cid}}</td>
			                      <td style="line-height:50px;">{{$v->Ccategory}}</td>
			                      <td style="line-height:50px;">{{mb_substr($v->Ctitle,0,10).'..'}}</td>
			                      <td><img src="{{$v->Cpicture}}" class="Rimg"  style="height:50px"></td>
			                      <td style="line-height:50px;">{{mb_substr($v->Ccontent,0,30).'..'}}</td>
			                      <td style="line-height:50px;">
			                      <a class="btn btn-info" href="/admin/content/{{$v->Cid}}"  style="border-radius: 8px;"><i class="icon_close_alt2"> 详情</i></a>
			                      	<form action="/admin/content/{{ $v->Cid }}" method="post" style="display:inline;">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button class="btn btn-danger" type="submit" onclick="return confirm('确认要删除吗？')"><i class="icon_close_alt2"> 删除</i></button>
									</form>
			                      </td>
			                    </tr>
								@endforeach
			                  </tbody>
			                </table>
			                <div class="text-center">
				                  {!! $data6->render() !!}
				              </div>
			              </div>
			          </section>
                      </div>
                      <div id="military" class="tab-pane">
						<section class="panel">
			              <header class="panel-heading">
			                  {{$title}}
			              </header>
			              <div class="table-responsive">
			                <table class="table">
			                  <thead>
			                    <tr>
			                      <th>ID</th>
			                      <th>所属类别</th>
			                      <th>文章标题</th>
			                      <th>文章图片</th>
			                      <th>文章内容</th>
			                      <th>操作</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                  	@foreach($data7 as $k => $v)
			                    <tr>
			                      <td style="line-height:50px;">{{$v->Cid}}</td>
			                      <td style="line-height:50px;">{{$v->Ccategory}}</td>
			                      <td style="line-height:50px;">{{mb_substr($v->Ctitle,0,10).'..'}}</td>
			                      <td><img src="{{$v->Cpicture}}" class="Rimg"  style="height:50px"></td>
			                      <td style="line-height:50px;">{{mb_substr($v->Ccontent,0,30).'..'}}</td>
			                      <td style="line-height:50px;">
			                      <a class="btn btn-info" href="/admin/content/{{$v->Cid}}"  style="border-radius: 8px;"><i class="icon_close_alt2"> 详情</i></a>
			                      	<form action="/admin/content/{{ $v->Cid }}" method="post" style="display:inline;">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button class="btn btn-danger" type="submit" onclick="return confirm('确认要删除吗？')"><i class="icon_close_alt2"> 删除</i></button>
									</form>
			                      </td>
			                    </tr>
								@endforeach
			                  </tbody>
			                </table>
			                  <div class="text-center">
				                  {!! $data7->render() !!}
				              </div>
			              </div>
			          </section>
                      </div>
                      <div id="gril" class="tab-pane">
						<section class="panel">
			              <header class="panel-heading">
			                  {{$title}}
			              </header>
			              <div class="table-responsive">
			                <table class="table">
			                  <thead>
			                    <tr>
			                      <th>ID</th>
			                      <th>所属类别</th>
			                      <th>文章标题</th>
			                      <th>文章图片</th>
			                      <th>文章内容</th>
			                      <th>操作</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                  	@foreach($data8 as $k => $v)
			                    <tr>
			                      <td style="line-height:50px;">{{$v->Cid}}</td>
			                      <td style="line-height:50px;">{{$v->Ccategory}}</td>
			                      <td style="line-height:50px;">{{mb_substr($v->Ctitle,0,10).'..'}}</td>
			                      <td><img src="{{$v->Cpicture}}" class="Rimg"  style="height:50px"></td>
			                      <td style="line-height:50px;">{{mb_substr($v->Ccontent,0,30).'..'}}</td>
			                      <td style="line-height:50px;">
			                      <a class="btn btn-info" href="/admin/content/{{$v->Cid}}"  style="border-radius: 8px;"><i class="icon_close_alt2"> 详情</i></a>
			                      	<form action="/admin/content/{{ $v->Cid }}" method="post" style="display:inline;">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button class="btn btn-danger" type="submit" onclick="return confirm('确认要删除吗？')"><i class="icon_close_alt2"> 删除</i></button>
									</form>
			                      </td>
			                    </tr>
								@endforeach
			                  </tbody>
			                </table>
			                <div class="text-center">
				                  {!! $data8->render() !!}
				              </div>
			              </div>
			          </section>
                      </div>
                      <div id="sport" class="tab-pane">
						<section class="panel">
			              <header class="panel-heading">
			                  {{$title}}
			              </header>
			              <div class="table-responsive">
			                <table class="table">
			                  <thead>
			                    <tr>
			                      <th>ID</th>
			                      <th>所属类别</th>
			                      <th>文章标题</th>
			                      <th>文章图片</th>
			                      <th>文章内容</th>
			                      <th>操作</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                  	@foreach($data9 as $k => $v)
			                    <tr>
			                      <td style="line-height:50px;">{{$v->Cid}}</td>
			                      <td style="line-height:50px;">{{$v->Ccategory}}</td>
			                      <td style="line-height:50px;">{{mb_substr($v->Ctitle,0,10).'..'}}</td>
			                      <td><img src="{{$v->Cpicture}}" class="Rimg"  style="height:50px"></td>
			                      <td style="line-height:50px;">{{mb_substr($v->Ccontent,0,30).'..'}}</td>
			                      <td style="line-height:50px;">
			                      <a class="btn btn-info" href="/admin/content/{{$v->Cid}}"  style="border-radius: 8px;"><i class="icon_close_alt2"> 详情</i></a>
			                      	<form action="/admin/content/{{ $v->Cid }}" method="post" style="display:inline;">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button class="btn btn-danger" type="submit" onclick="return confirm('确认要删除吗？')"><i class="icon_close_alt2"> 删除</i></button>
									</form>
			                      </td>
			                    </tr>
								@endforeach
			                  </tbody>
			                </table>
			                <div class="text-center">
				                  {!! $data9->render() !!}
				              </div>
			              </div>
			          </section>
                      </div>
                      <div id="bagua" class="tab-pane">
						<section class="panel">
			              <header class="panel-heading">
			                  {{$title}}
			              </header>
			              <div class="table-responsive">
			                <table class="table">
			                  <thead>
			                    <tr>
			                      <th>ID</th>
			                      <th>所属类别</th>
			                      <th>文章标题</th>
			                      <th>文章图片</th>
			                      <th>文章内容</th>
			                      <th>操作</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                  	@foreach($data10 as $k => $v)
			                    <tr>
			                      <td style="line-height:50px;">{{$v->Cid}}</td>
			                      <td style="line-height:50px;">{{$v->Ccategory}}</td>
			                      <td style="line-height:50px;">{{mb_substr($v->Ctitle,0,10).'..'}}</td>
			                      <td><img src="{{$v->Cpicture}}" class="Rimg"  style="height:50px"></td>
			                      <td style="line-height:50px;">{{mb_substr($v->Ccontent,0,30).'..'}}</td>
			                      <td style="line-height:50px;">
			                      <a class="btn btn-info" href="/admin/content/{{$v->Cid}}"  style="border-radius: 8px;"><i class="icon_close_alt2"> 详情</i></a>
			                      	<form action="/admin/content/{{ $v->Cid }}" method="post" style="display:inline;">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button class="btn btn-danger" type="submit" onclick="return confirm('确认要删除吗？')"><i class="icon_close_alt2"> 删除</i></button>
									</form>
			                      </td>
			                    </tr>
								@endforeach
			                  </tbody>
			                </table>
			                <div class="text-center">
				                  {!! $data10->render() !!}
				              </div>
			              </div>
			          </section>
                      </div>
                  </div>
              </div>
          </section>



              
          </div>
	</div>
</section>
</section>
		<script>
        $('.Rimg').click(function(){
          if($(this).css('height') == '50px'){
            $('.Rimg').css('height','50px');
            $(this).css('height','200px');
          }else{
            $(this).css('height','50px');
          }
        });
      </script>
/@endsection
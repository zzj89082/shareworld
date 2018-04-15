@extends('admin/layout/header')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
  <div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="fa fa-table"></i> {{$title}}
                <!--  search form start -->
                <ul class="nav top-menu" style="float:right;">                    
                    <li>
                        <form class="navbar-form" action="/admin/poster" method="get">
							             <span style="font-size:16px;">显示条目</span>
                        	 <select name="page_count" id="" class="btn-group" style="font-size:16px;">
                                <option value="3" @if(isset($search['page_count']) && !empty($search['page_count']) && $search['page_count'] == 3) selected @endif>3</option>
                                <option value="10" @if(isset($search['page_count']) && !empty($search['page_count']) && $search['page_count'] == 10) selected @endif>10</option>
                                <option value="20" @if(isset($search['page_count']) && !empty($search['page_count']) && $search['page_count'] == 20) selected @endif>20</option>
                                <option value="40" @if(isset($search['page_count']) && !empty($search['page_count']) && $search['page_count'] == 40) selected @endif>40</option>
                            </select>
                            <input class="form-control" placeholder="广告商" type="text" name="search" value="{{$search['search'] or ''}}">
                            <input class="form-control" placeholder="价格" type="text" name="search2" value="{{$search['search2'] or ''}}">
                            <input class="form-control" placeholder="类型" type="text" name="search3" value="{{$search['search3'] or ''}}">
							              <input type="submit" value="查找" class="btn btn-primary btn-sm">
                        </form>
                    </li>                    
                </ul>
                <!--  search form end -->                
            </h3>
			<!-- prompt -->
			@include('admin/layout/prompt')
		</div>
	</div>
      <!-- page start-->
      <div class="row">
          <div class="col-lg-12">
              <section class="panel">
                  <table class="table table-striped table-advance table-hover">
                   <tbody>
                      <tr>
                         <th> ID</th>
                         <th><i class="icon_profile"></i> 广告商</th>
                         <th><i class="icon_calendar"></i> 广告图</th>
                         <th><i class="icon_target"></i> 类型</th>
                         <th><i class="icon_mobile"></i> 价格</th>
                         <th><i class="icon_pin_alt"></i> 添加时间</th>
                         <th>　<i class="icon_cogs"></i> 操作</th>
                      </tr>
                      @foreach($data as $k => $v)
                      <tr>
                         <td>{{ $v->POid }}</td>
                         <td>{{ $v->POauthor }}</td>
                         <td><img src="{{ $v->POpic }}" class="Rimg" style="height:50px;"></td>
                         <td>{{ $v->POtype }}</td>
                         <td>{{ $v->POprice }}</td>
                         <td>{{ $v->created_at }}</td>
                         <td>
                            <div class="btn-group">
                                <a class="btn btn-success" href="/admin/poster/{{ $v->POid }}/edit">
                                		<i class="icon_book_alt"></i>
                                </a>
                							<form action="/admin/poster/{{ $v->POid }}" method="post" style="display:inline">  
                								{{ csrf_field() }}
                								{{ method_field('DELETE')}}
                                              <button type="submit" class="btn btn-danger"><i class="icon_close_alt2"></i></button>
  								
                              </form>
                            </div>
                          </td>
                      </tr>
                      @endforeach                         
                   </tbody>
                </table>
                <div class="page" style="text-align:center">
                   {!! $data->appends($search) -> render() !!}
                </div>
              </section>
          </div>
      </div>
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
      <!-- page end-->
  </section>
</section>
<!--main content end-->
@endsection
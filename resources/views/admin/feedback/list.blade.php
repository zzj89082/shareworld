@extends('admin/layout/header')
@section('content') 
  <!--main content start-->
  <section id="main-content">
      <section class="wrapper">
	  <div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa-user-md"></i> {{$title}}</h3>
				@include('admin/layout/prompt')
			</div>
		</div>
          <div class="row">
            <!-- profile-widget -->
            <div class="col-lg-12">
                <div class="profile-widget profile-widget-info">
                      <div class="panel-body">
                        <div class="col-lg-2 col-sm-2">
                          <h4>Jenifer Smith</h4>               
                          <div class="follow-ava">
                              <img src="img/profile-widget-avatar.jpg" alt="">
                          </div>
                          <h6>Administrator</h6>
                        </div>
                        <div class="col-lg-10 col-sm-10 follow-info">
                            <p>Hello I’m Jenifer Smith, a leading expert in interactive and creative design.</p>
                            <p>@jenifersmith</p>
							              <p><i class="fa fa-twitter"> 当前系统时间</i></p>
                            <h6>
                                <span><i class="icon_clock_alt"></i>{{ date('H:i:s',time()) }}</span>
                                <span><i class="icon_calendar"></i>{{ date('Y-m-d',time()) }}</span>
                                <!-- 搜索 -->
                                <span style="float:right">
                                    <form class="navbar-form" action="/admin/feedback" method="get"> 
                                        <input class="form-control" placeholder="发件人" type="text" name="search" value="{{$search['search'] or ''}}">
                                        <input type="submit" value="查找" class="btn btn-primary btn-sm">
                                    </form>    
                                
                                </span>
                            </h6>
                        </div>
						
						
                      </div>
                </div>
            </div>
          </div>
          <!-- page start-->
          <div class="row">
             <div class="col-lg-12">
                <section class="panel">
                      <header class="panel-heading tab-bg-info">
                          <ul class="nav nav-tabs">
                              <li class="active">
                                  <a data-toggle="tab" href="#recent-activity">
                                      <i class="icon-home"></i>
                                      反馈信息
                                  </a>
                              </li>
                          </ul>
                      </header>
                      <div class="panel-body">
                          <div class="tab-content">
                              <div id="recent-activity" class="tab-pane active">
                                  <div class="profile-activity">
                                    <!-- 反馈遍历 -->
                                      @foreach($data as $k => $v)                                         
                                      <div class="act-time">                                      
                                          <div class="activity-body act-in">
                                              <span class="arrow"></span>
                                              <div class="text">
                                                  <!-- 用户头像 -->
                                                  <a href="#" class="activity-img">
                                                    <img class="avatar" src="{{ $v->feedback_users->Uimage }}" alt="">
                                                  </a>
                                                  <!-- 用户名 -->
                                                  <p class="attribution"><a href="#">{{ $v->feedback_users->Ualais }}</a> {{ $v['created_at'] }}</p>
                                                  <!-- 反馈内容 -->
                                                  <p>{{mb_substr($v['Fcontent'],0,64,'utf8').'..'}}</p>
                                                  <!-- 回复内容 -->
                                                  <p style="background:#cccc;margin:5px 0 0;padding:5px;width:90%;">
                                                    回复：{{mb_substr($v['Freplay'],0,54,'utf8').'..'}}
                                                    <span style="float:right">回复时间：{{ $v['updated_at'] or '暂无'}}</span>
                                                  </p>
                                                  <!-- 回复、删除按钮 -->
                                                  <div class="btn-group" style="float:right;margin-top:-75px;margin-right:20px;line-height:50px;">
                                                      <!-- 回复按钮 -->
                                                      <a class="btn btn-success" href="/admin/feedback/{{ $v->Fid }}/edit" style="border-radius:5px"><i class="icon_check_alt2"></i></a>
                                                      <!-- 删除按钮 -->
                                                      <form action="/admin/feedback/{{ $v->Fid }}" method="post">  
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE')}}
                                                                      <button type="submit" class="btn btn-danger"><i class="icon_close_alt2"></i></button>
                                          
                                                      </form>
                                                  </div>

                                              </div>
                                          </div>
                                      </div>
                                      @endforeach 
                                      <div class="page" style="text-align:center">
                                         {!! $data->appends($search) -> render() !!}
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </section>
             </div>
          </div>

          <!-- page end-->
      </section>
  </section>
  <!--main content end-->
@endsection
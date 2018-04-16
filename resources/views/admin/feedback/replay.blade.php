@extends('admin/layout/header')
@section('content') 
  <!--main content start-->
  <section id="main-content">
      <section class="wrapper">
	  <div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa-user-md"></i> {{$title}}</h3>
			</div>
		</div>
          <div class="row">
            <!-- profile-widget -->
            <div class="col-lg-12">
                <div class="profile-widget profile-widget-info">
                      <div class="panel-body">
                        <div class="col-lg-2 col-sm-2">
                          <h4>{{session('Uinfo')['Ualais']}}</h4>               
                          <div class="follow-ava">
                              <img alt="" src="{{session('Uinfo')['Uimage']}}" style="width:75px;height:75px;">
                          </div>
                          <h6>administrator</h6>
                        </div>
                        <div class="col-lg-10 col-sm-10 follow-info">
                            <p>Hello I’m Jenifer Smith, a leading expert in interactive and creative design.</p>
                            <p>{{session('Uinfo')['Uemail']}}</p>
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
          
            <!-- profile -->
            <div id="profile" class="tab-pane">
              <section class="panel">
                <div class="panel-body bio-graph-info">
                    <h1>反馈详情</h1>
                    <div class="row">
                        <div class="bio-row">
                            <p><span>用户头像 </span><img src="{{ $data['Uimage'] }}" alt="" style="width:50px;height:50px;border-radius:10px;"> </p>
                        </div>
                        <div class="bio-row">
                            <p><span>用户昵称 </span>: 　　　{{ $data['Ualais']}}</p>
                        </div>                                              
                        <div class="bio-row">
                            <p><span>反馈时间 </span>: 　　　{{ $data['created_at'] }}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>反馈内容</span><div style="text-indent:20px;">{{ $data['Fcontent'] }}</div></p>
                        </div>
                        <div class="bio-row">
                            <p><span>回复时间 </span>: 　　　{{ $data['updated_at'] }}</p>
                        </div>
                        <!-- 回复内容 -->
                        <form method="post" action="/admin/feedback/{{$data['Fid']}}">
                          {{ csrf_field() }}
                          {{ method_field('PUT') }}
                          <div class="bio-row">
                              <p>
                                <span>回复内容 </span>: 　　　<input name="Freplay" type="text" value="{{mb_substr($data['Freplay'],0,54,'utf8').'..'}}" class="form-control" style="width:380px;display:inline">
                                <input type="submit" value="点击回复" class="btn btn-info" style="margin-top:10px;width:530px;">
                              </p>

                          </div>
                          
                        </form>
                        <!-- 回复内容结束 -->
                        
                    </div>
                </div>
              </section>
                <section>
                    <div class="row">                                              
                    </div>
                </section>
            </div>
            <!-- edit-profile -->
          <!-- page end-->

      </section>
  </section>
  <!--main content end-->
@endsection
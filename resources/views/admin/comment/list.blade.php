@extends('admin/layout/header')
@section('content')
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-user-md"></i> {{$title}}
						<!--  search form start -->
		                <ul class="nav top-menu" style="float:right;">                    
		                    <li>
		                        <form class="navbar-form" action="/admin/comment" method="get">
									  
		                            <input class="form-control" placeholder="用户昵称" type="text" name="search" value="{{$search['search'] or ''}}">
					                <input type="submit" value="查找" class="btn btn-primary btn-sm">
		                        </form>
		                    </li>                    
		                </ul>
		                <!--  search form end -->     
					</h3>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                 <div class="col-lg-12">
                    <section class="panel">
                          
                          <div class="panel-body">
                              <div class="tab-content">
                                  <div id="recent-activity" class="tab-pane active">
                                      <div class="profile-activity">
                                      <!-- 评论遍历 -->
                                      @foreach($data as $k => $v)                                             
                                          <div class="act-time">                                      
                                              <div class="activity-body act-in">
                                                  <span class="arrow"></span>
                                                  <div class="text">
                                                      <a href="/admin/user/{{ $v['Uid'] }}" class="activity-img"><img class="avatar" src="{{ $v->comment_users->Uimage }}" alt=""></a>
                                                      <p class="attribution">
	                                                      	<a href="javascript:;">{{$v -> comment_users -> Ualais}}</a>
	                                                      	{{ $v['created_at']}}　
	                                                      <b style="color:#4B8CF5">评论回复@</b>
	                                                      @if (!empty($v['Bualais']))
	                                                      	<a style="color:#4B8CF5" href="/admin/user?usearch={{$v['Bualais']}}">{{$v['Bualais']}}</a>
	                                                      @endif
	                                                      @if (!empty($v -> comment_content['Ctitle']))
	                                                      <a style="color:#4B8CF5" href="/admin/content/{{ $v['Cid'] }}">{{$v -> comment_content['Ctitle'] or ''}}</a>
	                                                      @endif
	                                                      @if (!empty($v -> comment_release['Earticle']))
	                                                      <a style="color:#4B8CF5" href="/admin/release/{{ $v['Eid'] }}">{{mb_substr($v -> comment_release['Earticle'],0,54,'utf8').'..'}}</a>
	                                                      @endif
                                                  	  </p>
                                                      <p>{{mb_substr($v['Dcontent'],0,54,'utf8').'..'}}</p>
                                                      <!-- 回复、删除按钮 -->
	                                                  <div class="btn-group" style="float:right;margin-top:-38px;margin-right:20px;">
	                                                      <!-- 删除按钮 -->
	                                                      <form action="/admin/comment/{{ $v->Did }}" method="post">  
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
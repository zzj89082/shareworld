@extends('admin/layout/header')
@section('content')

<!--main content start-->
<section id="main-content">
  <section class="wrapper">
  	<div class="row">
    <div class="col-lg-12">
      <h3 class="page-header"><i class="fa fa-table"></i> 回收站</h3>
      <!-- prompt -->
 
    </div>
  </div>


      <section class="panel">
    <header class="panel-heading tab-bg-primary ">
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#home">广告回收</a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#about">轮播回收</a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#fankui">反馈回收</a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#pinglun">评论回收</a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#yonghu">用户回收</a>
            </li>
        </ul>
    </header>
    <div class="panel-body">
        <div class="tab-content">
            <div id="home" class="tab-pane active">
      <!-- 广告回收 -->
            <div class="row">
          <div class="col-lg-12">
              <section class="panel">
                  <header class="panel-heading">
                      {{$title}}
                  </header>
                  
                  <table class="table table-striped table-advance table-hover">
                   <tbody>
                      <tr>
                         <th><i class=""></i> ID</th>
                         <th><i class=""></i> 广告商</th>
                         <th><i class=""></i> 广告图</th>
                         <th><i class=""></i> 类型</th>
                         <th><i class=""></i> 价格</th>
                         <th><i class=""></i> 删除时间</th>
                         <th><i class=""></i> 操作</th>
                      </tr>
                      @foreach($data as $k => $v)
                      <tr>
                         <td>{{ $v->POid }}</td>
                         <td>{{ $v->POauthor }}</td>
                         <td><img class="Rimg" src="{{ $v->POpic }}" style="height:50px;"></td>
                         <td>{{ $v->POtype }}</td>
                         <td>{{ $v->POprice }}</td>
                         <td>{{ $v->deleted_at }}</td>
                         <td>
                          <div class="btn-group">
                              <a class="btn btn-success" href='{{url("/admin/recover/update/$v->POid")}}'><i class="icon_check_alt2"> 恢复</i></a>
                              <a class="btn btn-danger" href='{{url("/admin/recover/delete/$v->POid")}}' onclick="return confirm('确认要删除吗？')" ><i class="icon_close_alt2"> 删除</i></a>
                          </div>
                          </td>
                      </tr> 

                      @endforeach                   
                   </tbody>
                </table>
                <div class="text-center">
                  {!! $data->render() !!}
                </div>
              </section>
          </div>
      </div>
    <!-- 广告回收结束 -->
            </div>
            <div id="about" class="tab-pane">
        <!-- 轮播图回收 -->
          <div class="row">
          <div class="col-lg-12">
              <section class="panel">
                  <header class="panel-heading">
                      {{$title}}
                  </header>
                  
                  <table class="table table-striped table-advance table-hover">
                   <tbody>
                      <tr>
                         <th><i class=""></i> ID</th>
                         <th><i class=""></i> 轮播图</th>
                         <th><i class=""></i> 删除时间</th>
                         <th><i class=""></i> 操作</th>
                      </tr>
                      @foreach($rdata as $k => $v)
                      <tr>
                         <td>{{ $v->Rid }}</td>
                         <td><img class="Rimg" src="{{ $v->Rimg }}" style="height:50px;"></td>
                         <td>{{ $v->deleted_at }}</td>
                         <td>
                          <div class="btn-group">
                              <a class="btn btn-success" href='{{url("/admin/recover/rupdate/$v->Rid")}}'><i class="icon_check_alt2"> 恢复</i></a>
                              <a class="btn btn-danger" onclick="return confirm('确认要删除吗？')" href='{{url("/admin/recover/rdelete/$v->Rid")}}'><i class="icon_close_alt2"> 删除</i></a>
                          </div>
                          </td>
                      </tr>
                      @endforeach                   
                   </tbody>
                </table>
                <div class="text-center">
                  {!! $rdata->render() !!}
                </div>
              </section>
          </div>
      </div>
    <!-- 轮播图回收结束 -->

            </div>
            <div id="fankui" class="tab-pane">
        <!-- 反馈回收 -->
          <div class="row">
          <div class="col-lg-12">
              <section class="panel">
                  <header class="panel-heading">
                      {{$title}}
                  </header>
                  
                  <table class="table table-striped table-advance table-hover">
                   <tbody>
                      <tr>
                         <th><i class=""></i> ID</th>
                         <th><i class=""></i> 反馈内容</th>
                         <th><i class=""></i> 回复内容</th>
                         <th><i class=""></i> 删除时间</th>
                         <th><i class=""></i> 操作</th>
                      </tr>
                      @foreach($fdata as $k => $v)
                      <tr>
                         <td>{{ $v->Fid }}</td>
                         <td>{{mb_substr($v->Fcontent,0,40)}}</td>
                         <td>{{ $v->Freplay }}</td>
                         <td>{{ $v->deleted_at }}</td>
                         <td>
                          <div class="btn-group">
                              <a class="btn btn-success" href='{{url("/admin/recover/fupdate/$v->Fid")}}'><i class="icon_check_alt2"> 恢复</i></a>
                              <a class="btn btn-danger" onclick="return confirm('确认要删除吗？')" href='{{url("/admin/recover/fdelete/$v->Fid")}}'><i class="icon_close_alt2"> 删除</i></a>
                          </div>
                          </td>
                      </tr>
                      @endforeach                   
                   </tbody>
                </table>
                <div class="text-center">
                  {!! $fdata->render() !!}
                </div>
              </section>
          </div>
      </div>
    <!-- 反馈回收结束 -->

            </div>


            <div id="pinglun" class="tab-pane">
        <!-- 评论回收 -->
          <div class="row">
          <div class="col-lg-12">
              <section class="panel">
                          
                          <div class="panel-body">
                              <div class="tab-content">
                                  <div id="recent-activity" class="tab-pane active">
                                      <div class="profile-activity">
                                      <!-- 反馈遍历 -->
                                      @foreach($cdata as $k => $v)                                             
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
                                                          <a style="color:#4B8CF5" href="/admin/user}}">{{$v['Bualais']}}</a>
                                                        @endif
                                                        @if (!empty($v -> comment_content['Ctitle']))
                                                        <a style="color:#4B8CF5" href="/admin/content/{{ $v['Cid'] }}">{{$v -> comment_content['Ctitle'] or ''}}</a>
                                                        @endif
                                                        @if (!empty($v -> comment_release['Earticle']))
                                                        <a style="color:#4B8CF5" href="/admin/release/{{ $v['Eid'] }}">{{mb_substr($v -> comment_release['Earticle'],0,50).'...'}}</a>
                                                        @endif
                                                      </p>
                                                      <p>{{mb_substr($v['Dcontent'],0,54,'utf8').'..'}}</p>
                                                      <!-- 回复、删除按钮 -->
                                                    <div class="btn-group" style="float:right;margin-top:-38px;margin-right:20px;">
                                                        <!-- 删除按钮 -->
                                                      <form action='{{url("/admin/recover/cupdate/$v->Did")}}' method="get" style="display: inline;">
                                                       <button type="submit" class="btn btn-success"><i class="icon_check_alt2"> 恢复</i></button>
                                                       </form>
                                                       <form action='{{url("/admin/recover/cdelete/$v->Did")}}' method="get" style="display: inline;">
                                                       <button type="submit" class="btn btn-danger"><i class="icon_close_alt2"> 删除</i></button>
                                                       </form>
                                                    </div>
                                                  </div>
                                              </div>
                                          </div>
                                       @endforeach
                                       <div class="page" style="text-align:center">
                                         {!! $cdata -> render() !!}
                                       </div>

                                      </div>
                                  </div>
                              </div>
                          </div>
                      </section>
          </div>
      </div>
    <!-- 评论回收结束 -->

            </div>

            <div id="yonghu" class="tab-pane">
        <!-- 用户回收 -->
          <div class="row">
          <div class="col-lg-12">
              <section class="panel">
                    <header class="panel-heading">
                       <span class="text-info">{{$title}}</span>
                    </header>

                    <table class="table table-striped table-advance table-hover">
                        <tbody>
                        <tr class="text-center">
                            <td><i class="glyphicon glyphicon-cloud"></i>ID </td>
                            <td><i class="icon_calendar"></i> 用户名</td>
                            <td><i class="icon_mail_alt"></i> 密码</td>
                            <td><i class="icon_genius"></i> 性别</td>
                            <td><i class="icon_box-selected"></i> 邮箱</td>
                            <td><i class="icon_phone"></i> 电话</td>
                            <td><i class="icon_phone"></i> 出生日期</td>
                           {{-- <td><i class="social_twitter_circle"></i> 签名</td>--}}
                            <td><i class="social_rss"></i> 类别</td>
                            <td><i class="icon_upload"></i> 头像</td>
                            <td><i class="icon_cogs"></i> 操作</td>
                        </tr>
                        @foreach($udata as $k=>$v)
                        <tr class="text-center">
                            <td>{{$v['Uid']}}</td>
                            <td>{{$v['Ualais']}}</td>
                            <td>{{$v['Upassswd']}}</td>
                            <td>
                                @if ($v['Usex'] == 1)
                                    男
                                @elseif ($v['Usex'] == 2)
                                    女
                                @else
                                   其他
                                @endif
                            </td>
                            <td>{{$v['Uemail']}}</td>
                            <td>{{$v['Utel']}}</td>
                            <td>{{$v['date']}}</td>
                        {{--    <td>{{$v['Uinfo']}}</td>--}}
                            <td>

                                @if ($v['Upower'] == 0)
                                   普通
                                @elseif ($v['Upower'] == 1)
                                    <span class ="text-warning">VIP</span>
                                @elseif ($v['Upower'] == 2)
                                   <span class ="text-danger">大V</span>
                                @elseif ($v['Upower'] == 3)
                                    <span class ="text-info">广告</span>
                                @elseif ($v['Upower'] == 4)
                                    <span class ="text-success">企业</span>
                                @elseif ($v['Upower'] == 5)
                                    <span style="color:cyan">管理员</span>
                                @endif
                            </td>

                            <td>可在详情查看</td>
                            <td>
                                <div class="btn-group">
                              <a class="btn btn-success" href='{{url("/admin/recover/uupdate/$v->Uid")}}'><i class="icon_check_alt2"> 恢复</i></a>
                              <a class="btn btn-danger" onclick="return confirm('确认要删除吗？')" href='{{url("/admin/recover/udelete/$v->Uid")}}'><i class="icon_close_alt2"> 删除</i></a>
                          </div>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div id="pages" style="text-align: center">
                        {!! $udata->render() !!}
                        <div></div>
                    </div>
                </section>
          </div>
      </div>
    <!-- 用户回收结束 -->

            </div>
        </div>
    </div>
</section>

      <!-- page end-->
  </section>
</section>
<!--main content end-->

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

@endsection
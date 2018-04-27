<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">

    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link href="/admin/img/favicon.png" type="image/x-icon" rel="chortcut icon"/>
    <link rel="stylesheet" type="text/css" href="/layui/css/layui.css">
    <script type="text/javascript" src="/layui/layui.all.js"></script>
    <script type="text/javascript" src="/layui/jquery-3.2.1.min.js"></script>

    <title>{{ session('data')['config_title'] }}</title>

    <!-- Bootstrap CSS -->    
    <link href="/admin/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="/admin/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="/admin/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="/admin/css/font-awesome.min.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="/admin/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="/admin/assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="/admin/css/owl.carousel.css" type="text/css">
	<link href="/admin/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
	<link rel="stylesheet" href="/admin/css/fullcalendar.css">
	<link href="/admin/css/widgets.css" rel="stylesheet">
    <link href="/admin/css/style.css" rel="stylesheet">
    <link href="/admin/css/style-responsive.css" rel="stylesheet" />
	<link href="/admin/css/xcharts.min.css" rel=" stylesheet">	
	<link href="/admin/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <script type="text/javascript" src="/admin/js/jquery-1.8.3.min.js"></script>

  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
            </div>

            <!--logo start-->
            <a href="/admin/index" class="logo">ShareWorld <span class="lite">Admin</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                
                <!--  search form end -->                
            </div>

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    <!-- task notificatoin start -->
                    <li id="task_notificatoin_bar" class="dropdown">
                         <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="icon-task-l"></i>
                                <span class="badge bg-important">网站配置</span>
                        </a>
                        
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">网站配置</p>
                            </li>
                            <li>
                                <a href="{{ url('admin/config/index') }}">
                                    <span class="label label-primary"><i class="icon_profile"></i></span> 
                                    <span class="small italic pull-right">修改网站配置</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('admin/config/rollimg') }}">
                                    <span class="label label-success"><i class="icon_like"></i></span> 
                                    <span class="small italic pull-right">更换轮播图</span>
                                </a>
                            </li>                            
                            <li>
                                <a href="{{url('admin/index')}}">SHARE WORLD</a>
                            </li>
                        </ul>
                    </li>
                    <!-- task notificatoin end -->
                    <!-- inbox notificatoin start-->
                    <li id="mail_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-l"></i>
                            <span class="badge bg-important">处理反馈</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue" style="letter-spacing:2px;font-size:12px">当前反馈的信息共有{{session('fcount')}}条</p>
                            </li>
                            

                            <!-- 处理反馈start(利用session中的参数查询) -->
                            @foreach (session('fb_data') as $k => $v)
                            <li>
                                <a href="/admin/feedback/{{$v['Fid']}}/edit">
                                    <span class="photo"><img alt="avatar" src="{{$v['Uimage']}}"></span>
                                    <span class="subject">
                                        <span class="from">{{$v['Ualais']}}</span>
                                        <span class="time">{{$v['Fid']}}</span>
                                    </span>
                                    <span style="line-height:20px;">{{mb_substr($v['Fcontent'],0,12,'utf8').'..'}}</span>

                                </a>
                            </li>
                            @endforeach
                            <!-- 处理反馈end -->
                            <li>
                                <a href="/admin/feedback">点击查看所有反馈信息</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox notificatoin end -->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="">
                            <span class="profile-ava">
                                <img alt="" src="{{session('Uinfo')['Uimage']}}" style="width:30px;height:30px;">
                            </span>
                            <span class="username">{{session('Uinfo')['Ualais']}}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="#"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_chat_alt"></i> Chats</a>
                            </li>
                            <li>
                                <a href="login.html"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                            <li>
                                <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
                            </li>
                            <li>
                                <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="/" target="_blank">
                          <i class="icon_house_alt"></i>
                          <span>前台首页</span>
                      </a>
                  </li>
				      <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>内容管理</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="/admin/content/">内容列表</a></li>    
                          <li><a class="" href="/admin/content/create">添加内容</a></li>    
                          <li><a class="" href="/admin/type/">内容分类列表</a></li>                          
                          <li><a class="" href="/admin/type/create">添加内容分类</a></li>
                      </ul>
                  </li>       
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>用户发布管理</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ url('/admin/release') }}">发布列表</a></li>
                          <li><a class="" href="{{ url('/admin/derelease') }}">未通过</a></li>
                          <!-- <li><a class="" href="grids.html">Grids</a></li> -->
                      </ul>
                  </li>
                  <!-- 广告管理start -->
                  <li class="sub-menu">
                      <a class="" href="javascript:;">
                          <i class="icon_genius"></i>
                          <span>广告管理</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="/admin/poster">广告列表</a></li>
                          <li><a class="" href="/admin/poster/create">添加广告</a></li>
                      </ul>
                  </li>
                  <!-- 广告管理end -->
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>用户管理</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="/admin/user">用户列表</a></li>
                          <li><a class="" href="/admin/user/create">用户添加</a></li>
                      </ul>
                  </li>
                             
                  <li class="sub-menu">
                      <a href="/admin/comment" class="">
                          <i class="icon_table"></i>
                          <span>评论管理</span>
                      </a>
                      
                  </li>
                  
                  <li class="sub-menu">
                      <a href="/admin/recover/list" class="">
                          <i class="icon_documents_alt"></i>
                          <span>回收站</span>
                      </a>

                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
       <script type="text/javascript">
        //layUI
        //一般直接写在一个js文件中
        layui.use(['layer', 'form'], function(){
          var layer = layui.layer
          ,form = layui.form;
        });
        </script>

        <!-- 读取模版的提示信息 -->
      @if (count($errors) > 0)
          <div class="mws-form-message error">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
@if(session('success'))
<script>
layer.msg("{{session('success')}}",{time: 1000});
</script>
@endif

@if(session('error'))

<script>
layer.msg("{{ session('error') }}", {icon: 5,anim: 6,time: 1000});
</script>
@endif
<!-- 读取模版的提示信息结束 -->



<!-- main content start -->
@section('content')
@show
<!--main content end-->


</section>
<!-- container section start -->

<!-- javascripts -->
<script src="/admin/js/jquery.js"></script>
<script src="/admin/js/jquery-ui-1.10.4.min.js"></script>
<script src="/admin/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/admin/js/jquery-ui-1.9.2.custom.min.js"></script>
<!-- bootstrap -->
<script src="/admin/js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="/admin/js/jquery.scrollTo.min.js"></script>
<script src="/admin/js/jquery.nicescroll.js" type="text/javascript"></script>
<!-- charts scripts -->
<script src="/admin/assets/jquery-knob/js/jquery.knob.js"></script>
<script src="/admin/js/jquery.sparkline.js" type="text/javascript"></script>
<script src="/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="/admin/js/owl.carousel.js" ></script>
<!-- jQuery full calendar -->
<<script src="/admin/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
<script src="/admin/assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
<!--script for this page only-->
<script src="/admin/js/calendar-custom.js"></script>
<script src="/admin/js/jquery.rateit.min.js"></script>
<!-- custom select -->
<script src="/admin/js/jquery.customSelect.min.js" ></script>
<script src="/admin/assets/chart-master/Chart.js"></script>

<!--custome script for all page-->
<script src="/admin/js/scripts.js"></script>
<!-- custom script for this page-->
<script src="/admin/js/sparkline-chart.js"></script>
<script src="/admin/js/easy-pie-chart.js"></script>
<script src="/admin/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/admin/js/jquery-jvectormap-world-mill-en.js"></script>
<script src="/admin/js/xcharts.min.js"></script>
<script src="/admin/js/jquery.autosize.min.js"></script>
<script src="/admin/js/jquery.placeholder.min.js"></script>
<script src="/admin/js/gdp-data.js"></script>
<script src="/admin/js/morris.min.js"></script>
<script src="/admin/js/sparklines.js"></script>
<script src="/admin/js/charts.js"></script>
<script src="/admin/js/jquery.slimscroll.min.js"></script>
<script>

//knob
$(function() {
$(".knob").knob({
'draw' : function () {
$(this.i).val(this.cv + '%')
}
})
});

//carousel
$(document).ready(function() {
$("#owl-slider").owlCarousel({
 navigation : true,
 slideSpeed : 300,
 paginationSpeed : 400,
 singleItem : true

});
});

//custom select box

$(function(){
$('select.styled').customSelect();
});

/* ---------- Map ---------- */
$(function(){
$('#map').vectorMap({
map: 'world_mill_en',
series: {
regions: [{
values: gdpData,
scale: ['#000', '#000'],
normalizeFunction: 'polynomial'
}]
},
backgroundColor: '#eef3f7',
onLabelShow: function(e, el, code){
el.html(el.html()+' (GDP - '+gdpData[code]+')');
}
});
});



</script>

</body>
</html>
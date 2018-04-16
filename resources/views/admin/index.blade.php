@extends('admin/layout/header')
@section('content')
     
      <section id="main-content">
          <section class="wrapper">
                     
              <!--header头部-->
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> 网站配置</h3>
					</ol>
				</div>
			</div>
			<!--header结束-->
              
			
			<!--统计用户开始-->
            <div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box blue-bg">
						<i class="fa fa-cloud-download"></i>
						<div class="count">100万</div>
						<div class="title">本站用户</div>						
					</div>
				</div>
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box brown-bg">
						<i class="fa fa-shopping-cart"></i>
						<div class="count">10万</div>
						<div class="title">大V用户</div>						
					</div>
				</div>
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box dark-bg">
						<i class="fa fa-thumbs-o-up"></i>
						<div class="count">10万</div>
						<div class="title">企业用户</div>						
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box green-bg">
						<i class="fa fa-cubes"></i>
						<div class="count">10万</div>
						<div class="title">VIP用户</div>						
					</div>
				</div>
			</div>
		

			<!--个人简介开始-->
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
                            <div class="col-lg-4 col-sm-4 follow-info">
                                <p>Hello administrator, a leading expert in interactive and creative design.</p>
                                <p>{{session('Uinfo')['Uemail']}}</p>
								<p><i class="fa fa-user"> 用户名</i></p>
                                <h6>
                                    <span><i class="icon_clock_alt"></i>{{ date('H:s',time()) }}</span>
                                    <span><i class="icon_calendar"></i>{{ date('Y.m.d',time()) }}</span>
                                </h6>
                            </div>
                            <div class="col-lg-2 col-sm-6 follow-info weather-category">
                                      <ul>
                                          <li class="active">
                                              
                                              <i class="fa fa-comments fa-2x"> </i><br>
											  
											  Contrary to popular belief, Lorem Ipsum is not simply
                                          </li>
										   
                                      </ul>
                            </div>
							<div class="col-lg-2 col-sm-6 follow-info weather-category">
                                      <ul>
                                          <li class="active">
                                              
                                              <i class="fa fa-bell fa-2x"> </i><br>
											  
											  Contrary to popular belief, Lorem Ipsum is not simply 
                                          </li>
										   
                                      </ul>
                            </div>
							<div class="col-lg-2 col-sm-6 follow-info weather-category">
                                      <ul>
                                          <li class="active">
                                              
                                              <i class="fa fa-tachometer fa-2x"> </i><br>
											  
											  Contrary to popular belief, Lorem Ipsum is not simply
                                          </li>
										   
                                      </ul>
                            </div>
                          </div>
                    </div>
                </div>
              </div>
			<!--网站介绍结束-->


			<div class="col-sm-12" style="margin-top: 20px;">
              <section class="panel">
                  <header class="panel-heading">网站配置</header>
                  <table class="table">
                      <thead>
                      <tr>
                        <th class="text-center">网站配置名称</th>
                        <th class="text-center">网站当前配置</th>
                        <th class="text-center">修改时间</th>
                      </tr>
                      <tr>
                        <td class="text-center">网站网址</td>
                        <td class="text-center">{{ $data->config_title }}</td>                          
                        <td class="text-center">{{ $data->updated_at }}</td>      
                      </tr>
                       <tr>
                        <td class="text-center">网站网址</td>
                          <td class="text-center">{{ $data->config_www }}</td>
                          <td class="text-center">{{ $data->updated_at }}</td>      
                      </tr>
                       <tr>
                          <th class="text-center">网站环境</th>
                         	<td class="text-center">{{ $data->config_setting }}</td>
                          <td class="text-center">{{ $data->updated_at }}</td>
                      </tr>
                       <tr>
                          <th class="text-center">轮播图ID</th>
                         	<td class="text-center">{{ $data->config_rollimg }}</td>
                          <td class="text-center">{{ $data->updated_at }}</td>
                      </tr>
                      <tr>
                          <th class="text-center">前台网站logo</th>
                         	<td class="text-center"><a href="javascript:;" class="chakan">点击查看图片</a>
                             <img src="{{ $data->config_logo }}" alt="" style="display: none;" width="50">
                          </td> 
                          <td class="text-center">{{ $data->updated_at }}</td>
                      </tr>
                      <tr>
                          <th class="text-center">后台网站logo</th>
                         	<td class="text-center">
                            <a href="javascript:;" class="chakan">点击查看图片</a>
                            <img src="{{ $data->config_adminlogo }}" alt="" style="display: none;" width="50">
                          </td>
                          <td class="text-center">{{ $data->updated_at }}</td>
                      </tr>
                      <tr>
                          <th class="text-center">网站ico</th>
                         	<td class="text-center">
                            <a href="javascript:;" class="chakan">点击查看图片</a>
                            <img src="{{ $data->config_ico }}" style="display: none;" alt="" width="50">
                          </td>
                          <td class="text-center">{{ $data->updated_at }}</td>
                      </tr>
                      </thead>
                  </table>
              </section>
      </div>

<script type="text/javascript">
      $(function(){
        $('.chakan').click(function(){
          $(this).css('display','none');
          $(this).next().css('display','inline');
        });  
      });
    </script>

			<div class="col-lg-12">
              <section class="panel">
                  <header class="panel-heading">
                      轮播图
                  </header>
                  <table class="table table-striped table-advance table-hover">
                   <tbody>
                      <tr>
                         <th><i class=""></i>ID</th>
                         <th><i class=""></i>轮播图</th>
                         <th><i class=""></i>添加时间</th>
                         <th><i class=""></i>操作</th>

                      </tr>
                      @foreach ($rollimg as $k => $v)
                      <tr>
                         <td>{{ $v->Rid }}</td>
                         <td><img class="Rimg" src="{{ $v->Rimg }}" style="height:50px;"></td>
                         <td>{{ $v->created_at }}</td>
                         <td>
                          <div class="btn-group">
                              <a class="btn btn-danger" href="/admin/config/delete/{{ $v->Rid }}"><i class="icon_close_alt2" onclick="return confirm('确认要删除吗？')"></i> 删除</a>
                          </div>
                          </td>
                      </tr>
                      @endforeach                         
                   </tbody>
                </table>
              </section>
            </div>
			<!--统计用户结束-->
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
              

			
			<!--主体部分-->         














		

                    
                   
                <!-- statics end -->
              
            
				

              <!-- project team & activity start -->
        
          
  
@endsection
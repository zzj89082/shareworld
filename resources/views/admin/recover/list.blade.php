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
                         <th><i class=""></i> 添加时间</th>
                         <th><i class=""></i> 操作</th>
                      </tr>
                      @foreach($data as $k => $v)
                      <tr>
                         <td>{{ $v->POid }}</td>
                         <td>{{ $v->POauthor }}</td>
                         <td><img class="Rimg" src="{{ $v->POpic }}" style="height:50px;"></td>
                         <td>{{ $v->POtype }}</td>
                         <td>{{ $v->POprice }}</td>
                         <td>{{ $v->created_at }}</td>
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
                         <th><i class=""></i> 添加时间</th>
                         <th><i class=""></i> 操作</th>
                      </tr>
                      @foreach($rdata as $k => $v)
                      <tr>
                         <td>{{ $v->Rid }}</td>
                         <td><img class="Rimg" src="{{ $v->Rimg }}" style="height:50px;"></td>
                         <td>{{ $v->created_at }}</td>
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
                </div>
              </section>
          </div>
      </div>
    <!-- 轮播图回收结束 -->

          <!-- <script type="text/javascript">
            $('#delete').click(function(){
              return confirm('确认要删除吗？');
            })
          </script> -->




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
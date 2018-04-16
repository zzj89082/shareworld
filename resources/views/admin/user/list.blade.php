@extends('admin/layout/header')
@section('content')


        <!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-table"></i>用户管理</h3>
                <!-- prompt -->
               
                <form action="/admin/user" method="get">
                    分　页：<input type="text" name="show" value="{{ $search['show'] or '' }}"placeholder="可选一页几条">&nbsp;&nbsp;　
                    用　户：<input type="text" name="usearch" value="{{$search['usearch'] or ''}}">&nbsp;&nbsp;
                    邮　箱：<input type="text" name="esearch" value="{{$search['esearch'] or ''}}">&nbsp;&nbsp;&nbsp;&nbsp;
                  {{--  跳转到： <input type="text" name="jump" value="{{$search['jump'] or ''}}"placeholder="页数">--}}
                    <input type="submit" value="搜索"  class=" btn btn-success">
                </form>
            </div>
        </div>
        <!-- page start-->

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
                        @foreach($data as $k=>$v)
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
                                    <a class="btn btn-warning" href="/admin/user/{{$v->Uid}}/edit" style="border-radius: 8px;">修改</a>
                                    <a class="btn btn-info" href="/admin/user/{{$v->Uid}}"  style="border-radius: 8px;">详情</a>
                                    <form action="/admin/user/{{$v->Uid}}" method="post" style="display: inline;">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <input type="submit" class="btn btn-danger"  value="删除" onclick=" return confirm('你确定要删除吗')">
                                    </form>
                                  {{--  <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>--}}
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div id="pages" style="text-align: center">
                        {!! $data->appends($search)->render() !!}
                        <div></div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->


@endsection
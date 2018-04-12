@extends('admin/layout/header')
@section('content')
        <!--main content start-->
<section id="main-content">
<section class="wrapper">
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-files-o"></i> 用户管理</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html"></a></li>
        </ol>
    </div>
</div>
<!-- Form validations -->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                {{ $title }}
            </header>
            <div class="panel-body">
                <div class="form">
                    <form class="form-validate form-horizontal" id="feedback_form" method="post" action="/admin/user/{{$data->Uid}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-2">头　　像<span class="required">*</span></label>
                            <div class="col-lg-10">
                                <div style="width: 50px;height: 50px;"><img src="{{$data->Uimage}}" alt="头像" style="width:100%;height:100%;border-radius: 50%" id="profile"></div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">昵　　称<span class="required">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control " id="cname" name="Ualais" minlength="5" type="text" value="{{$data->Ualais}}" required disabled/>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-2">邮　　箱<span class="required">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control " id="curl" type="text" name="Uemail" value="{{$data->Uemail}}" disabled/>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-2">性　　别<span class="required">*</span></label>
                            <div style="margin-left: 210px;margin-top: 10px;">
                            <input class="form" id="cemail" type="radio" name="Usex" value="1"   @if( $data->Usex== 1) checked @else disabled @endif required style="outline:none;"/>
                            <span style="font-size:16px;">男</span>&nbsp;&nbsp;

                            <input class="form" id="cemail" type="radio" name="Usex" value="2"  @if( $data->Usex== 2) checked @else disabled @endif required style="outline:none;"/>
                            <span style="font-size:16px;">女</span>&nbsp;&nbsp;

                            <input class="form" id="cemail" type="radio" name="Usex" value="0"   @if( $data->Usex== 0) checked @else disabled @endif required style="outline:none;"/>
                            <span style="font-size:16px;">其他</span>&nbsp;&nbsp;
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-2">电　　话<span class="required">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control" id="subject" name="Utel" minlength="5" type="text"  value ="{{$data->Utel}}" disabled  />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-2">出生日期<span class="required">*</span></label>
                            <div class="col-lg-6">
                                <input class="form-control" id="subject" name="date" minlength="5" type="text"  value ="{{$data->date}}" disabled  />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-2">自我介绍<span class="required">*</span></label>
                            <div class="col-lg-10">
                                <textarea class="form-control " id="ccomment" name="Uinfo"  disabled>{{$data -> Uinfo }}</textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-2" style="display:block;">用户类别<span class="required">*</span></label>
                            <div style="margin-left: 210px;margin-top: 10px;">
                            <input class="form" id="cemail" type="radio" name="Upower" value="5"   @if( $data->Upower== 5) checked @else disabled  @endif required style="outline:none:"/>
                            <span style="font-size:16px;">管理员</span>&nbsp;&nbsp;
                            <input class="form" id="cemail" type="radio" name="Upower" value="4"   @if( $data->Upower== 4) checked @else disabled  @endif required style="outline:none:"/>
                            <span style="font-size:16px;">企业</span>&nbsp;&nbsp;
                            <input class="form" id="cemail" type="radio" name="Upower" value="3"   @if( $data->Upower== 3) checked @else disabled @endif required style="outline:none;"/>
                            <span style="font-size:16px;">广告</span>&nbsp;&nbsp;
                            <input class="form" id="cemail" type="radio" name="Upower" value="2"   @if( $data->Upower== 2) checked @else disabled @endif required style="outline:none;"/>
                            <span style="font-size:16px;">大V</span>&nbsp;&nbsp;
                            <input class="form" id="cemail" type="radio" name="Upower" value="1"   @if( $data->Upower== 1) checked @else disabled @endif required style="outline:none;"/>
                            <span style="font-size:16px;">VIP</span>&nbsp;&nbsp;
                            <input class="form" id="cemail" type="radio" name="Upower" value="0"  @if( $data->Upower== 0) checked @else disabled @endif required style="outline:none;"/>
                            <span style="font-size:16px;">普通</span>&nbsp;&nbsp;
                            </div>
                        </div>
                        <script type="text/javascript">
                            $('#profile').click(function(){
                              this.css('width','200px');
                            })
                        </script>
                    </form>
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
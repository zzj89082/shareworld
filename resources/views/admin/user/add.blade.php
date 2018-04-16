@extends('admin/layout/header')
@section('content')

        <!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-files-o"></i> 用户添加</h3>
                
                <!-- prompt -->

            </div>
        </div>
        
        <!-- Form validations -->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <span class="text-info">{{$title}}</span>
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="form-validate form-horizontal" id="feedback_form" method="post" action="/admin/user" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">昵　　称<span class="required">*</span></label>
                                    <div class="col-lg-6">
                                        <input class="form-control" id="cname" name="Ualais" minlength="5" type="text" value="{{ old('Ualais') }}"required />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cemail" class="control-label col-lg-2">密　　码<span class="required">*</span></label>
                                    <div class="col-lg-6">
                                        <input class="form-control " id="cemail" type="password" name="Upassswd" required />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cemail" class="control-label col-lg-2">确认密码 <span class="required">*</span></label>
                                    <div class="col-lg-6">
                                    <input class="form-control " id="cemail" type="password" name="Urpassswd" required />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="curl" class="control-label col-lg-2">邮　　箱<span class="required">*</span></label>
                                    <div class="col-lg-6">
                                    <input class="form-control " id="curl" type="text" name="Uemail" value="{{ old('Uemail') }}" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="curl" class="control-label col-lg-2">性　　别<span class="required">*</span></label>
                                    <div style="margin-left: 210px;margin-top: 10px;">
                                    <input class="form" id="cemail" type="radio" name="Usex" value="1" required style="outline:none;"/>
                                    <span style="font-size:16px;">男</span>&nbsp;&nbsp;
                                    <input class="form" id="cemail" type="radio" name="Usex" value="2" required style="outline:none;"/>
                                    <span style="font-size:16px;">女</span>&nbsp;&nbsp;
                                    <input class="form" id="cemail" type="radio" name="Usex" value="0" required style="outline:none;"/>
                                    <span style="font-size:16px;">其他</span>&nbsp;&nbsp;
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="ccomment" class="control-label col-lg-2">电　　话<span class="required">*</span></label>
                                    <div class="col-lg-6">
                                        <input class="form-control" id="subject" name="Utel" minlength="5" type="text" required  value="{{ old('Utel') }}"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="ccomment" class="control-label col-lg-2">出生日期<span class="required">*</span></label>
                                    <div class="col-lg-6">
                                        <input class="form-control" id="subject" name="date" minlength="5" type="date" required  value="{{ old('date') }}"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="ccomment" class="control-label col-lg-2">自我介绍<span class="required">*</span></label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control " id="ccomment" name="Uinfo" required>{{ old('Uinfo') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="curl" class="control-label col-lg-2">用户类别<span class="required">*</span></label>
                                    <div style="margin-left: 210px;margin-top: 10px;">
                                        <input class="form" id="cemail" type="radio" name="Upower" value="4" required style="outline:none:"/>
                                        <span style="font-size:16px;">企业</span>&nbsp;&nbsp;
                                        <input class="form" id="cemail" type="radio" name="Upower" value="3" required style="outline:none;"/>
                                        <span style="font-size:16px;">广告</span>&nbsp;&nbsp;
                                        <input class="form" id="cemail" type="radio" name="Upower" value="2" required style="outline:none;"/>
                                        <span style="font-size:16px;">大V</span>&nbsp;&nbsp;
                                        <input class="form" id="cemail" type="radio" name="Upower" value="1" required style="outline:none;"/>
                                        <span style="font-size:16px;">VIP</span>&nbsp;&nbsp;
                                        <input class="form" id="cemail" type="radio" name="Upower" value="0" required style="outline:none;"/>
                                        <span style="font-size:16px;">普通</span>&nbsp;&nbsp;
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="ccomment" class="control-label col-lg-2">头　　像<span class="required">*</span></label>
                                    <div class="col-lg-6">
                                        <input class="form-control" id="subject" name="Uimage" minlength="5" type="file" required />
                                    </div>
                                </div>
                               {{-- <div class="form-group ">

                                    <div class="col-lg-10">
                                        <input class="form-control" id="subject" name="" minlength="5" type="hidden" required />
                                    </div>
                                </div>--}}

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="submit">提交</button>
                                        <button class="btn btn-default" type="button">重写</button>
                                    </div>
                                </div>
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
@extends('home/layout/headerPersonal')
@section('content')

    <div class="panel-body">
        <div class="form" style="position: absolute;width:800px;margin-top:60px;">
            <form class="form-validate form-horizontal" id="feedback_form" method="post" action="/personal/edit">
                {{ csrf_field() }}
                <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">昵　　称<span class="required">*</span></label>
                    <div class="col-lg-6">
                        <input class="form-control" id="Ualais" name="Ualais" minlength="" type="text" value="{{$data->Ualais}}" required />
                    </div>
                </div>
                <br>
                <div class="form-group ">
                    <label for="curl" class="control-label col-lg-2">邮　　箱<span class="required">*</span></label>
                    <div class="col-lg-6">
                        <input class="form-control " id="curl" type="text" name="Uemail" value="{{$data->Uemail}}" required/>
                    </div>
                </div>
                <br>
                <div class="form-group ">
                    <label for="curl" class="control-label col-lg-2">性　　别<span class="required">*</span></label>
                    <div style="margin-left: 210px;margin-top: 10px;">
                        <input class="form" id="cemail" type="radio" name="Usex" value="1"   @if( $data->Usex== 1) checked @endif required style="outline:none;"/>
                        <span style="font-size:16px;">男</span>&nbsp;&nbsp;
                        <input class="form" id="cemail" type="radio" name="Usex" value="2"  @if( $data->Usex== 2) checked @endif required style="outline:none;"/>
                        <span style="font-size:16px;">女</span>&nbsp;&nbsp;
                        <input class="form" id="cemail" type="radio" name="Usex" value="0"   @if( $data->Usex== 0) checked @endif required required style="outline:none;"/>
                        <span style="font-size:16px;">其他</span>&nbsp;&nbsp;
                    </div>
                </div>
                <br>
                <script>
                    //由于模块都一次性加载，因此不用执行 layui.use() 来加载对应模块，直接使用即可：
                    ;!function(){
                        var layer = layui.layer
                                ,form = layui.form;
                    }();
                </script>
                <div class="form-group ">
                    <label for="ccomment" class="control-label col-lg-2">电　　话<span class="required">*</span></label>
                    <div class="col-lg-6">
                        <input class="form-control" id="subject" name="Utel" minlength="5" type="text"  value ="{{$data->Utel}}" required />
                    </div>
                </div>
                <br>
                <div class="form-group ">
                    <label for="ccomment" class="control-label col-lg-2">出生日期<span class="required">*</span></label>
                    <div class="col-lg-6">
                        <input class="form-control" id="subject" name="date" minlength="5" type="date"  value ="{{$data->date}}" required />
                    </div>
                </div>
                <br>
                 
                <input id="subject" name="_Uid" minlength="5" type="hidden"  value ="{{$data->Uid}}">
                <div class="form-group ">
                    <label for="ccomment" class="control-label col-lg-2">自我介绍<span class="required">*</span></label>
                    <div class="col-lg-6">
                        <textarea class="form-control " id="ccomment" name="Uinfo"  required>{{$data -> Uinfo }}</textarea>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-6">
                        <button class="btn btn-primary form-control" type="submit">修改</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <div class="banner-right-text">
        <h3 class="tittle">我的头像<i class="glyphicon glyphicon-facetime-video"></i></h3>
        <!--/general-news-->
        <div class="general-news">
            <div class="general-inner">
                <div class="general-text" style="text-align:center">
                    <!-- 412*260 -->
                    <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="_Uid" id="_Uid" value="{{$data->Uid}}">
                    <span class="image avatar">
                        @if(!empty($data->Uimage))
                        <img src="{{$data->Uimage}}" alt="" style="width:100px;height: 100px;border-radius: 50%;" id ="Uimage"/>
                        @else
                            <div style="width:100px;height: 100px;border: 1px solid deepskyblue;margin:auto;line-height: 100px;background: deepskyblue;color:white;border-radius: 50%;"> 什么都没有</div>

                        @endif
                    </span>
                    <br>
                    {{--<h4 id="logo"><a href="#">点击修改</a></h4>--}}
                    <button type="button" class="layui-btn" id="test1">
                        <i class="layui-icon">&#xe67c;</i>点击修改
                    </button>
                    <script>
                        // 执行文件上传
                        //$('#test1').click(function(){
                            layui.use('upload', function(){
                                var upload = layui.upload;
                                var token = $('#_token').val();
                                var Uid = $('#_Uid').val();
                                //console.log(Ualais);
                                //执行实例
                                var uploadInst = upload.render({
                                    elem: '#test1' //绑定元素
                                    ,url: '/personal/upload' //上传接口
                                    ,method:'post'
                                    ,field:'Uimage'
                                    // ,multiple:true //多文件上传
                                    ,data:{'_token':token,'Uid':Uid}
                                    ,done: function(res){
                                        //上传完毕回调
                                        //layer.alert(res);
                                        if(res.code == 0){
                                            $('#Uimage').attr('src',res.data.src);
                                        }
                                    }
                                    ,error: function(msg){
                                        //请求异常回调
                                        //layer.alert(msg);
                                    }
                                });
                            });
                       // });

                    </script>
                    <br>
                    <br>
                    <p>
                        @if(empty($data->Uinfo))
                        这家伙很懒啥也没有留下
                        @else
                        {{$data->Uinfo}}
                        @endif
                    </p>
                    <hr>
                </div>
                <div class="edit-pics">
                    
                <div class="clearfix"></div>
             {{--   <div class="media">
                    <h3 class="tittle media">Media <i class="glyphicon glyphicon-floppy-disk"></i></h3>
                    <div class="general-text two">
                        <a href="#"><img src="images/gen3.jpg" class="img-responsive" alt=""></a>
                        <h5 class="top"><a href="#">Consetetur sadipscing elit</a></h5>
                        <p>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt labore dolore magna aliquyam eratsed diam justo duo dolores rebum.</p>
                        <p>On Jun 27 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
                    </div>
                </div>
                <div class="general-text two">
                    <a href="#"><img src="images/gen2.jpg" class="img-responsive" alt=""></a>
                    <h5 class="top"><a href="#">Consetetur sadipscing elit</a></h5>
                    <p>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt labore dolore magna aliquyam eratsed diam justo duo dolores rebum.</p>
                    <p>On Jun 27 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
                </div>--}}
                <div class="media">
                    <h3 class="tittle media">HOT<i class="glyphicon glyphicon-floppy-disk"></i></h3>
                    @foreach($content1 as $v)
                        <div class="editor-pics">
                            <div class="col-md-3 item-pic">
                                <img src="{{ $v->Cpicture }}" class="img-responsive" style="width:100px;height:70px;">
                            </div>
                            <div class="col-md-9 item-details">
                                <h5 class="inner two"><a href="/home/show/{{$v->Cid}}">{{ $v->Ctitle }}</a></h5>
                                <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>{{ $v->created_at }} <a href="#"><i class="glyphicon glyphicon-comment"></i>{{ $v->Ccomment or 0 }}</a></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!--//general-news-->
        <!--/news-->
        <!--/news-->

    </div>
        </div>
    <div class="clearfix"> </div>

@endsection
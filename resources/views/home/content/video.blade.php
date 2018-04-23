@extends('home.layout.header')
@section('content')
<!-- 内容区域 -->
    <div class="banner-section">
    @foreach($data as $key=>$v)

        <h4 class="tittle" style="margin-left: 330px;">{{$v->Earticle}}　<i class="glyphicon glyphicon-fullscreen"></i></h4>
        <br>
        <span style="margin-left:240px;">作者：<a href="javascript:;" >{{$v->Ualais}}</a> |  时间: {{$v->created_at}}</span>
        <div>
            <video width="320" height="350" controls="controls">
              <source src="{{ $v->Evideo }}" type="video/mp4" />
              <source src="{{ $v->Evideo }}" type="video/ogg" />
              <source src="{{ $v->Evideo }}" type="video/webm" />
              <object data="{{ $v->Evideo }}" width="100%" height="100%">
                    <embed src="{{ $v->Evideo }}" width="100%" height="100%" />
              </object>
            </video>
        </div>
        @endforeach
    </div>
    <div class="banner-right-text">
        <h3 class="tittle"> {{ $redian }} <i class="glyphicon glyphicon-facetime-video"></i></h3>
        <!--/general-news-->
        <div class="general-news">
            <div class="general-inner">
                <div class="general-text">
                    <a href="/home/show/{{$content->Cid}}"><img src="{{ $content->Cpicture }}" class="img-responsive" alt=""></a>
                    <h5 class="top"><a href="single.html">{{ $content->Ctitle }}</a></h5>
                    <p>{{mb_substr($content->Ccontent,0,50).'...'}}</p>
                    <p>{{ $content->created_at }}<a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>{{ $content->Ccomment or 0}} </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
                </div>
                <div class="edit-pics">
                    @foreach($content1 as $v)
                        <div class="editor-pics">
                            <div class="col-md-3 item-pic">
                                <img src="{{ $v->Cpicture }}" class="img-responsive" style="width:100px;height:70px;">
                            </div>
                            <div class="col-md-9 item-details">
                                <h5 class="inner two"><a href="single.html">{{ $v->Ctitle }}</a></h5>
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
    <div class="clearfix"> </div>
@endsection
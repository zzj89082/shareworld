@extends('home.layout.header')
@section('content')
<!-- 内容区域 -->
    <div class="banner-section">
    <h3 class="tittle">{{$title}} <i class="glyphicon glyphicon-flag"></i></h3>
    @foreach($data as $key=>$v)
        <div class="col-md-6 top-text" style="width:365px;text-align:center;padding:0">
            <video width="330" height="400" controls="controls" style="background-color:rgba(0,0,0,0.8)">
              <source src="{{ $v->Evideo }}" type="video/mp4" />
              <source src="{{ $v->Evideo }}" type="video/ogg" />
              <source src="{{ $v->Evideo }}" type="video/webm" />
              <object data="{{ $v->Evideo }}" width="100%" height="100%">
                    <embed src="{{ $v->Evideo }}" width="100%" height="100%" />
              </object>
            </video>
            <p class="tittle" style="background:#6BC4C7;border-radius: 2px;margin:5px;color:#fff;">
                <span>{{$v -> Ualais}}</span> : {{mb_substr($v->Earticle,0,10).'...'}}
            </p>
        </div>
        @if( $key%2 == 1 )
        <div class="clearfix" style="margin-bottom:20px;"> </div>
        @endif
        @endforeach
        <div class="text-center">
              {!! $data->render() !!}
         </div>
    </div>
    <div class="banner-right-text">
        <h3 class="tittle"> {{ $redian }} <i class="glyphicon glyphicon-facetime-video"></i></h3>
        <!--/general-news-->
        <div class="general-news">
            <div class="general-inner">
                <div class="general-text">
                 <a href="/home/show/{{ $content->Cid }}"><img src="{{ $content->Cpicture }}" class="img-responsive" alt=""></a>
                    <h4 class="top"><a href="/home/show/{{ $content->Cid }}" title="{{$content->Ctitle}}">{{mb_substr($content->Ctitle,0,16).'...'}}</a></h4>
                    <p>{{mb_substr($content->Ccontent,0,80).'...'}}</p>
                    <p>{{ $content->created_at }}
                        <a class="span_link" href="/home/show/{{ $content->Cid }}"><span class="glyphicon glyphicon-comment"></span>{{ $content->Ccomment or 0}} </a><span class="glyphicon glyphicon-eye-open"></span>{{ $content->Ccount or 0 }}
                    </p>
                </div>
                <div class="edit-pics">
                @foreach($content1 as $v)
                  <div class="editor-pics">
                     <div class="col-md-3 item-pic">
                       <img src="{{ $v->Cpicture }}" class="img-responsive" style="width:100px;height:60px;">
                       </div>
                        <div class="col-md-9 item-details">
                            <p class="inner two" style="font-size:14px;"><a href="/home/show/{{ $v->Cid }}">{{ $v->Ctitle }}</a></p>
                             <div class="td-post-date two" style="margin-top:5px;">
                                <i class="glyphicon glyphicon-time"></i>{{ $v->created_at }} 
                                <a href="/home/show/{{ $v->Cid }}"><i class="glyphicon glyphicon-comment"></i>{{ $v->Ccomment or 0 }}</a>
                             </div>
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
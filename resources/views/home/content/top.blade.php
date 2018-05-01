@extends('home.layout.header')
@section('content')
    <div class="gallery-section">
        <h3 class="tittle">{{$title}}<i class="glyphicon glyphicon-fullscreen"></i></h3>
        <div class="categorie-grids cs-style-1">
            <div class="top-inner">
                @foreach($data as $k => $v)
                <div class="col-md-12 top-text" style="margin: 5px 0;border-bottom:1px dashed #ccc;text-align:left">
                     <div class="col-md-3 item-pic">
                     <a href="/home/show/{{ $v->Cid }}"><img src="{{ $v->Cpicture }}" class="img-responsive" alt="" style="width:220px;height:120px;"></a>
                     </div>
                     <div class="col-md-9 item-details">
                        <h4 class="top"><a href="/home/show/{{ $v->Cid }}">{{ $v->Ctitle }}</a></h4>
                        <p>{{mb_substr($v->Ccontent,0,80).'...'}}</p>
                        
                        <div>
                            <p>{{ $v->created_at }}<a class="span_link" href="/home/show/{{ $v->Cid }}"><span class="glyphicon glyphicon-comment"></span>{{ $v->Ccomment or 0 }}</a><span class="glyphicon glyphicon-eye-open"></span>{{ $v->Ccount or 0 }}
                            </p>
                        </div>
                     </div>
                 </div>
                @endforeach
                 <div class="clearfix"> </div>
            </div>

            <script src="js/lightbox.js"></script>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection
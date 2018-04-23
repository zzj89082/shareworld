@extends('home.layout.header')
@section('content')
    <div class="gallery-section">
        <h3 class="tittle">{{$title}}<i class="glyphicon glyphicon-fullscreen"></i></h3>
        <div class="categorie-grids cs-style-1">
            <div class="cate-grid grid" style="width:100%;display: block">
                @foreach($data as $key=>$value)
                    <figure>
                    <div class="col-md-6" style="float: left;width:300px;margin-bottom: 20px;">
                    <img src="{{$value->Cpicture}}" alt="插图">
                    </div>
                    <div class="col-md-6" style="float: left">
                        <a class="example-image-link" href="/home/show/{{$value->Cid}}"><span>{{$value->Ctitle}}</span></a>
                        <br><br><br><br><br>
                        <span>{{$value->created_at}}</span>
                    </div>
                    <div class="clearfix"></div>
                    </figure>
                @endforeach
            </div>

            <script src="js/lightbox.js"></script>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection
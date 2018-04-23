@extends('home.layout.header')
@section('content')
    <div class="gallery-section">
        <h3 class="tittle">新闻<i class="glyphicon glyphicon-fullscreen"></i></h3>
        <br><br>
        <h3 class="tittle" style="text-align: center;">{{$data->Ctitle}}</h3>
        <span>作者：<a href="javascript:;">{{$data->content_user->Ualais}}</a> |  时间: {{$data->created_at}} |  阅读量：<a id =""></a></span>
        <br><br>
        <div>
            <img src="{{$data->Cpicture}}">
        </div>
        <p>{{$data->Ccontent}}</p>
        <script type="text/javascript">
            var sum = 0;

        </script>
    </div>
@endsection
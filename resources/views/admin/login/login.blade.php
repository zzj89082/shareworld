<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link href="/admin/img/favicon.png" type="image/x-icon" rel="chortcut icon"/>
    <link rel="stylesheet" type="text/css" href="/layui/css/layui.css">
    <script type="text/javascript" src="/layui/layui.all.js"></script>
    <script type="text/javascript" src="/layui/jquery-3.2.1.min.js"></script>

    <title>{{Config::get('view.adminTitle')}}</title>

    <!-- Bootstrap CSS -->
    <link href="/admin/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="/admin/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="/admin/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="/admin/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="/admin/css/style.css" rel="stylesheet">
    <link href="/admin/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <script>
        //由于模块都一次性加载，因此不用执行 layui.use() 来加载对应模块，直接使用即可：
        ;!function(){
            var layer = layui.layer
                    ,form = layui.form;
        }();
    </script>
<body class="login-img3-body">

<div class="container">

    <form class="login-form" action="/admin/carry" method="post" id ='mytest'>
        {{csrf_field()}}
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_profile"></i></span>
                <input  id ="username" type="text" class="form-control" placeholder="用户名" name = "Ualais" value="{{ old('Ualais') }}" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input  id ="upass" type="password" class="form-control" placeholder="密码" name="Upassswd" value="">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input  id ="code" type="password" class="form-control" style="width: 140px;"  placeholder="验证码" name="code" value="">
                <img src="/admin/code" title="点击切换" onclick="rand_code(this)" style="height: 42px;border-radius: 10px;float:right;">
            </div>
            {{--<div class="input-group">--}}

            {{--<div style="margin-left: 204px;margin-top: -45px;">--}}
            {{--<input type="text" name="code"style="width:100px;" placeholder="验证码">--}}
            {{--</div>--}}
            @if(session('error'))
                <span>
                    <script type="text/javascript">
                        //layer.msg('{{session("error")}}');
                        layer.msg('{{session("error")}}', {icon: 5});
                    </script>
		        </span>
                   {{-- <!-- <span style="color:red;font-size:12px;padding-left:20px;">{{session('error')}}</span> -->--}}
                @endif
            {{--</div>--}}
            <script type="text/javascript">
                function rand_code(obj){
                    // console.log(obj.src)
                    obj.src = obj.src+'?a='+Math.random();
                }
            </script>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            <!-- <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button> -->
        </div>
    </form>
    <script>
       // alert($);
       //ajax 实现登录时无刷新验证用户名
       $('#username').blur(function(){
           //layer.alert(123);
           var Ualais = $('#username').val();
           //console.log(Ualais);
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.post('/admin/ajax',{'username':Ualais},function(msg){
                if(msg != 2){
                    layer.alert('账号名输入错误',{icon: 5});
                }
           },'HTML');
       });
       //ajax 实现登录时无刷新验密码
       $('#upass').blur(function(){
           var Ualais = $('#username').val();
           var Upassswd = $('#upass').val();
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.post('/admin/ajax2',{'username':Ualais,'upassword':Upassswd},function(msg){
               if(msg != 2){
                   layer.alert('密码输入错误');
               }
           },'HTML');
       });

        //cookie实现记住密码
    </script>



</div>


</body>
</html>

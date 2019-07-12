<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('/admin/bootstrap/css/bootstrap.min.css')}}">
    <!-- <link rel="stylesheet" type="text/css" href="../public/css/base.css">  -->
    <link rel="stylesheet" type="text/css" href="{{asset('/admin/css/b_login.css')}}">
    <title>后台登录页面</title>
</head>
<body>

    @section('body')
    {{--注册内容主体--}}
    @show

    <div class="rightpic">
        <div id="container">
            <!-- <img src="picture/1.jpg" alt="" width="500px" height="330px"> -->
        </div>
    </div>
</div>

<script src="{{asset('admin//public/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('/admin/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/admin/public/js/delaunay.js')}}"></script>
<script src="{{asset('/admin/public/js/TweenMax.js')}}"></script>
<script src="{{asset('/admin/js/effect.js')}}"></script>

<script src="{{asset('/admin/js/b_login.js')}}"></script>
</body>
</html>
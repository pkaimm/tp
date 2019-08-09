<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>链接</title>
</head>
<body>

    @csrf
    @foreach($data as $k=>$v)
       链接：<a href="{{url('/admin/ksaxq')}}?id={{$v->id}}">访问连接</a><br>
    @endforeach

</body>
</html>
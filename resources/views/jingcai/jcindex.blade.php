<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>竞猜列表</title>
</head>
<body>
    <h3 align="center">竞猜列表</h3>
    <table border="1" align="center">
        <tr>
            <td>id</td>
            <td>国家</td>
            <td>操作</td>
        </tr>
        @foreach($data as $k=>$v)
            <tr>
                <td>{{$v->id}}</td>
                <td>{{$v->name}}vs{{$v->cname}}</td>
                <td>
                    @if($v->add_time > time())
                        <a href="{{url('/jingcai/jc')}}?id={{$v->id}}">竞猜</a>
                    @elseif($v->add_time < time())
                        <a href="{{url('/jingcai/jcjg')}}?id={{$v->id}}">查看结果</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
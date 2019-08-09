<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>调研列表</title>
</head>
<body>
<form action="">
    <table border="1">
        @foreach($data as $k=>$v)
        <tr>
            <td>{{$v->biaoti}}</td>
            <td>
                <a href="{{url('/admin/ksalianjie')}}">启用</a>
                <a href="{{url('/admin/ksadelete')}}?id={{$v->id}}">删除</a>
            </td>
        </tr>
        @endforeach
            <tr>
                <td colspan="3">{{ $data->links() }}</td>
            </tr>
    </table>
</form>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新闻列表</title>
</head>
<body>
<form action="" >
    <table border="1">
        <tr>
            <td>id</td>
            <td>新闻标题</td>
            <td>新闻图片</td>
            <td>新闻作者</td>
            <td>添加时间</td>
            <td>操作</td>
        </tr>
        @foreach($data as $k=>$v)
        <tr>
            <td>{{$v->id}}</td>
            <td>{{$v->biaoti}}</td>
            <td><img  src='{{asset("$v->pic")}}' height="50" width="50" ></td>
            <td>{{$v->zuoze}}</td>
            <td>{{date('Y-m-d h:i:s'),$v->add_time}}</td>
            <td>
                <a href="{{url('/ks/delete')}}?id={{$v->id}}">删除</a>
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="7">{{ $data->links() }}</td>
        </tr>
    </table>
</form>
</body>
</html>
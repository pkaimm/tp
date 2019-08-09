<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>模板列表</title>
</head>
<body>
<form action="">
    <table border="1">
        <tr>
            <td>模板id</td>
            <td>模板标题</td>
            <td>模板内容</td>
            <td>操作</td>
        </tr>
        @foreach($re as $k=>$v)
            @foreach($v as $val)
        <tr>
            <td>{{$val['template_id']}}</td>
            <td>{{$val['title']}}</td>
            <td>{{$val['content']}}</td>
            <td>
                <a href="{{url('/jieko/delete')}}?id={{$val['template_id']}}">删除</a>
                <a href="{{url('/jieko/pushtemplate')}}?id={{$val['template_id']}}">推送消息</a>
            </td>
        </tr>
         @endforeach
        @endforeach
    </table>
</form>
</body>
</html>
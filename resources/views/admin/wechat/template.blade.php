<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
            <table border="1">
                <tr>
                    <th>模板id</th>
                    <th>标题</th>
                    <th>内容</th>
                    <th>操作</th>
                </tr>
                @foreach($data as $v)
                    @foreach($v as $val)
                        <tr>
                            <td>{{$val['template_id']}}</td>
                            <td>{{$val['title']}}</td>
                            <td>{{$val['content']}}</td>
                            <td>
                                <a href="{{url('wechat/del_template')}}?id={{$val['template_id']}}">删除</a>
                                <a href="{{url('wechat/send_template')}}?id={{$val['template_id']}}">发送消息</a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </table>
</body>
</html>


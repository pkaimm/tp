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
        <table>
            <tr>
                <th>地址</th>
                <th>操作</th>
            </tr>
            @foreach($data as $v)
                @foreach($v as $val)
                    <tr>
                        <td>{{$val->url}}</td>
                        <td><a href="{{url('')}}">删除</a></td>
                    </tr>
                @endforeach
            @endforeach
        </table>

</body>
</html>

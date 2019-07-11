<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>列表</title>
</head>
<body>
    <a href="/student/create"><h3>用户添加</h3></a>
    <form action="{{url('student/index')}}" method="get">
        @csrf
        <input type="text" name="ss" value="{{$ss}}">
        <input type="submit" value="搜索">
    </form>
    <table border="1">
                <tr>
                    <td>姓名</td>
                    <td>性别</td>
                    <td>年龄</td>
                    <td>时间</td>
                    <td>操作</td>
                </tr>
            @foreach($info as $k=>$v)
                <tr>
                    <td>{{$v->name}}</td>
                    <td>{{$v->age}}</td>
                    <td>{{$v->ext}}</td>
                    <td>{{date('Y-m-d h:i:s',$v->create_time)}}</td>
                    <td>
                        <a href="/student/delete?id={{$v->id}}">删除</a>
                        <a href="/student/eirt?id={{$v->id}}">修改</a>
                    </td>
                </tr>
         @endforeach
                <tr>
                    <td colspan="5">{{$info->appends(['ss'=>$ss])->links()}}</td>
                </tr>

    </table>

</body>
</html>
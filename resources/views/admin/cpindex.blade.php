<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>列表</title>
</head>
<body>
<form action="{{url('/admin/cpindex')}}" method="get">
    @csrf
    <input type="text" name="cfd" value="{{$cfd}}">
    <input type="text" name="ddd" value="{{$ddd}}">
    <input type="submit" value="搜索">
    <table border="1">
        <tr>
            <td>id</td>
            <td>车次</td>
            <td>出发地</td>
            <td>到达地</td>
            <td>价钱</td>
            <td>出发时间</td>
            <td>到达时间</td>
            <td>张数</td>
            <td>预定</td>
        </tr>
        @foreach($data as $k=>$v)
        <tr>
            <td>{{$v->id}}</td>
            <td>{{$v->chechi}}</td>
            <td>{{$v->cfd}}</td>
            <td>{{$v->ddd}}</td>
            <td>{{$v->price}}</td>
            <td>{{date('Y-m-d h:i:s',$v->create_time)}}</td>
            <td>{{date('Y-m-d h:i:s',$v->daoda_time)}}</td>
            <td>
                @if($v->zhangshu >100)
                    有
                @elseif($v->zhangshu ==0)
                    无
                @else
                    {{$v->zhangshu}}
                @endif
            </td>
            <td>
                @if($v->zhangshu ==0)
                    <a>预定</a>
                @else
                    <a href="#">预定</a>
                @endif
            </td>

        </tr>
            @endforeach
        {{--<tr>--}}
            {{--<td colspan="9">{{ $data->appends(['cfd' => $cfd,'ddd' => $ddd])->links() }}</td>--}}
        {{--</tr>--}}
    </table>
</form>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>生成试卷列表</title>
</head>
<body>
<form action="{{url('/admin/sjrk')}}" method="post">
    @csrf
    <table>
        <tr>
            <td><h3>laravel框架第一次测试</h3></td>
        </tr>

        @foreach($data as $k=>$v)
        <tr>
            <td><input type="checkbox"  name="biaoti" value="{{$v->id}}">{{$v->biaoti}}</td>
        </tr>
         @endforeach
        {{--@foreach($data as $k=>$v)--}}
         {{--<tr>--}}
             {{--<td><input type="checkbox" name="biaoti" value="{{$v->id}}">{{$v->biaoti}}</td>--}}
         {{--</tr>--}}
       {{--@endforeach--}}

         <tr>
             <td><input type="submit" value="生成试卷"></td>
         </tr>
    </table>
</form>
</body>
</html>
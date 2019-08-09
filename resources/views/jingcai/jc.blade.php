<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>我要竞猜</title>
</head>
<body>
<form action="{{url('/jingcai/jcjieguo')}}?id={{$data->id}}" method="post">
    @csrf
    <table border="1" align="center">
        <h3 align="center">我要竞猜</h3>
        <tr>
            <td>{{$data->name}}vs{{$data->cname}}</td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="type" value="胜">胜
                <input type="radio" name="type" value="平">平
                <input type="radio" name="type" value="负">负
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="添加"></td>
        </tr>
    </table>
</form>
</body>
</html>
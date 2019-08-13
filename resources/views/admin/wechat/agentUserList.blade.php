<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>二维码列表</title>
</head>
<body>
<table border="1" align="center">
    <tr>
        <th>编号</th>
        <th>推广码</th>
        <th>专属二维码</th>
        <th>操作</th>
    </tr>
    @foreach($user as $val)
        <tr>
            <td>{{$val->id}}</td>
            <td>{{$val->id}}</td>
            <td><img src="{{$val->qrcode_url}}" alt="" width="100px" height="100px"></td>
            <td><a href="{{url('wechat/getTimeQrCode')}}?uid={{$val->id}}">生成二维码</a></td>
        </tr>
    @endforeach()

</table>
</body>
</html>
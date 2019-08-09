<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>车库首页</title>
</head>
<body>
<form action="">
    <table>
        <h3>物业管理</h3>
        <tr>
            <td><a href="{{url('/cheku/ckcreate')}}">添加车位信息</a></td>
        </tr>
        <tr>
            <td><a href="{{url('/cheku/ckguanli')}}">数据统计</a></td>
        </tr>
        <tr>
            <td><a href="{{url('/cheku/ckmenwei')}}">添加门卫</a></td>
        </tr>
    </table>
</form>
</body>
</html>
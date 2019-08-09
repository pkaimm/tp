<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录</title>
</head>
<body>
<form action="{{url('/admin/ksdl')}}" method="post">
    @csrf
    <table>
        <tr>
            <td>用户名：<input type="text" name="name"></td>
        </tr>
        <tr>
            <td>密码 ：<input type="text" name="pwd"></td>
        </tr>
        <tr>
            <td><input type="submit" value="登录"></td>
        </tr>
    </table>
</form>
</body>
</html>